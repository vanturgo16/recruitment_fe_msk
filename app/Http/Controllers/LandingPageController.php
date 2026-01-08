<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

// Traits
use App\Traits\AuditLogsTrait;
use App\Traits\ProfilTrait;

// Model
use App\Models\User;
use App\Models\Joblist;
use App\Models\MainProfile;
use App\Models\EducationInfo;
use App\Models\GeneralInfo;
use App\Models\WorkExpInfo;
use App\Models\JobApplies;
use App\Models\MstDropdowns;
use App\Models\MstRules;

// Mail
use App\Mail\RejectEducation;

class LandingPageController extends Controller
{
    use AuditLogsTrait;
    use ProfilTrait;

    public function index(Request $request)
    {
        $domainWeb = optional(MstRules::where('rule_name', 'Domain FE')->first())->rule_value;
        $emailHR = optional(MstRules::where('rule_name', 'Email HR')->first())->rule_value;
        $rules = [
            'domainWeb' => $domainWeb,
            'emailHR' => $emailHR,
        ];

        $search = $request->get('search');
        $jobLists = Joblist::select('joblists.*', 'mst_positions.position_name', 'mst_departments.dept_name', 'employees.email')
            ->leftjoin('mst_positions', 'joblists.id_position', 'mst_positions.id')
            ->leftjoin('mst_departments', 'mst_positions.id_dept', 'mst_departments.id')
            ->leftjoin('employees', 'joblists.position_req_user', 'employees.id')
            ->where(function($query) use ($search) {
                $query->where('mst_positions.position_name', 'like', "%{$search}%")
                    ->orWhere('mst_departments.dept_name', 'like', "%{$search}%")
                    ->orWhere('joblists.jobdesc', 'like', "%{$search}%");
            })
            ->where('joblists.is_active', 1)
            ->orderBy('joblists.created_at');
        $jobBanner = $jobLists->limit(2)->get();

        $jobLists = $jobLists->paginate(3);

        if ($request->ajax()) {
            return view('jobList.index', compact('jobLists', 'search'))->render();
        }
        
        return view('landingPage.index', compact('rules', 'jobBanner', 'jobLists', 'search'));
    }

    public function detailJob($id)
    {
        $id = decrypt($id);
        $data = Joblist::select('joblists.*', 'mst_positions.position_name', 'mst_departments.dept_name')
            ->leftjoin('mst_positions', 'joblists.id_position', 'mst_positions.id')
            ->leftjoin('mst_departments', 'mst_positions.id_dept', 'mst_departments.id')
            ->where('joblists.id', $id)
            ->first();
        return view('jobList.detail', compact('data'));
    }

    public function applyJob($id)
    {
        // Check if user is logged in
        if (!auth()->check()) {
            return redirect()->route('login')->with('info', 'Harap Login dahulu.');
        }

        $idCandidate = auth()->user()->id_candidate;
        // Check if user profile is complete
        if (!$this->checkProfile($idCandidate)) {
            return redirect()->route('profile')->with('info', 'Silakan lengkapi profil Anda terlebih dahulu.');
        }

        // Check if user has in progress application
        if ($this->checkApplicationIP($idCandidate)) {
            return back()->with('info', 'Masih Ada Lamaran Anda Dalam Proses.');
        }
        
        $id = decrypt($id);
        $data = Joblist::select('joblists.*', 'mst_positions.position_name', 'mst_departments.dept_name')
            ->leftjoin('mst_positions', 'joblists.id_position', 'mst_positions.id')
            ->leftjoin('mst_departments', 'mst_positions.id_dept', 'mst_departments.id')
            ->where('joblists.id', $id)
            ->first();

        // Validate Min Education
        $minLevel = MstDropdowns::where('category', 'Education')->where('name_value', $data->min_education)->value('code_format');
        $eduCandidate = EducationInfo::where('id_candidate', $idCandidate)->pluck('edu_grade');
        $levelEduCandidate = MstDropdowns::where('category', 'Education')->whereIn('name_value', $eduCandidate)->pluck('code_format')->toArray();
        $maxLevelEduCandidate = max($levelEduCandidate);
        if($maxLevelEduCandidate < $minLevel){
            $nameApplied = auth()->user()->name;

            $development = MstRules::where('rule_name', 'Development')->first()->rule_value;
            $emailDev = MstRules::where('rule_name', 'Email Development')->pluck('rule_value')->toArray();
            $toEmail = ($development == 1) ? $emailDev : auth()->user()->email;
            $maxEduCandidate = optional(MstDropdowns::where('category', 'Education')->whereIn('name_value', $eduCandidate)->orderBy('code_format', 'desc')->first())->name_value;
            // Send Email
            $mailContent = new RejectEducation($data, $maxEduCandidate, $nameApplied);
            Mail::to($toEmail)->send($mailContent);
            // return redirect()->back()->with(['fail' => 'Maaf, anda tidak memenuhi kualifikasi pendidikan minimal untuk melamar lowongan ini.']);
            return redirect()->back()->with([
                'fail' => 'Mohon maaf, lamaran Anda tidak dapat diproses saat ini.'
            ]);
        }

        return view('landingPage.screening', compact('data'));
    }
}

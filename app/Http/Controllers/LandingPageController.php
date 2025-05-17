<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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

class LandingPageController extends Controller
{
    use AuditLogsTrait;
    use ProfilTrait;

    public function index(Request $request)
    {
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
            ->orderBy('joblists.created_at');
        $jobBanner = $jobLists->limit(2)->get();
        // $jobBanner = collect();

        $jobLists = $jobLists->paginate(3);

        if ($request->ajax()) {
            return view('jobList.index', compact('jobLists', 'search'))->render();
        }
        
        return view('landingPage.index', compact('jobBanner', 'jobLists', 'search'));
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

        return view('landingPage.screening', compact('data'));
    }
}

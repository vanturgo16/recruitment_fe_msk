<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

// Traits
use App\Traits\AuditLogsTrait;

// Model
use App\Models\JobApplies;
use App\Models\Joblist;
use App\Models\InterviewSchedules;
use App\Models\MCUSchedules;
use App\Models\TestSchedules;
use App\Models\OfferingSchedules;
use App\Models\SignSchedules;

class JobApplyController extends Controller
{
    use AuditLogsTrait;

    public function index(Request $request)
    {
        $idCandidate = auth()->user()->id_candidate;
        $datas = JobApplies::select('job_applies.*', 'mst_positions.position_name', 'mst_departments.dept_name')
            ->leftJoin('joblists', 'job_applies.id_joblist', 'joblists.id')
            ->leftJoin('mst_positions', 'joblists.id_position', 'mst_positions.id')
            ->leftJoin('mst_departments', 'mst_positions.id_dept', 'mst_departments.id')
            ->where('job_applies.id_candidate', $idCandidate)
            ->get();

        return view('dashboard.jobApply.index', compact('datas'));
    }

    public function storeScreening(Request $request)
    {
        $request->validate([
            'id_job' => 'required',
            'screening_content'  => 'required',
        ]);
        $idCandidate = auth()->user()->id_candidate;

        // Add Validation Same Candidate With Applied Joblist
        if(JobApplies::where('id_candidate', $idCandidate)->where('id_joblist', $request->id_job)->exists()){
            return redirect()->back()->with(['fail' => 'Maaf, anda tidak bisa melamar lowongan ini kembali.']);
        }

        DB::beginTransaction();
        try {
            // Lock the job row for update to prevent race condition
            $jobList = Joblist::where('id', $request->id_job)->lockForUpdate()->first();

            $data = JobApplies::create([
                'id_candidate' => $idCandidate,
                'id_joblist' => $request->id_job,
                'screening_content' => $request->screening_content,
                'progress_status' => 'REVIEW ADM',
                'status' => 0,
            ]);

            Joblist::where('id', $request->id_job)->update([
                'number_of_applicant' => $jobList->number_of_applicant + 1
            ]);

            $this->auditLogs('Mengirim Lamaran ID : '. $data->id);
            DB::commit();
            return redirect()->route('jobApply')->with('success', 'Lamaran berhasil dikirim, cek berkala status lamaran anda disini.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['fail' => 'Lamaran gagal dikirim, silahkan coba lagi.']);
        }
    }

    public function detail($id)
    {
        $id = decrypt($id);
        $data = JobApplies::select('job_applies.*', 'mst_positions.position_name', 'mst_departments.dept_name')
            ->leftJoin('joblists', 'job_applies.id_joblist', 'joblists.id')
            ->leftJoin('mst_positions', 'joblists.id_position', 'mst_positions.id')
            ->leftJoin('mst_departments', 'mst_positions.id_dept', 'mst_departments.id')
            ->where('job_applies.id', $id)
            ->first();
        
        $schedInterview = InterviewSchedules::where('id_jobapply', $id)->first();
        $schedTest = TestSchedules::where('id_jobapply', $id)->first();
        $schedOffering = OfferingSchedules::where('id_jobapply', $id)->first();
        $schedMCU = MCUSchedules::where('id_jobapply', $id)->first();
        $schedSign = SignSchedules::where('id_jobapply', $id)->first();

        $this->auditLogs('Melihat detail lamaran ID : '. $id);
        return view('dashboard.jobApply.detail', compact('data', 'schedInterview', 'schedTest', 'schedOffering', 'schedMCU', 'schedSign'));
    }
}

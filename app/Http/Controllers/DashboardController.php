<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// Traits
use App\Traits\AuditLogsTrait;

// Model
use App\Models\Candidate;
use App\Models\MainProfile;
use App\Models\EducationInfo;
use App\Models\GeneralInfo;
use App\Models\WorkExpInfo;
use App\Models\JobApplies;

class DashboardController extends Controller
{
    use AuditLogsTrait;

    public function home(Request $request)
    {
        $idCandidate = auth()->user()->id_candidate;
        $profileComplete = MainProfile::where('id_candidate', $idCandidate)->exists()
            && EducationInfo::where('id_candidate', $idCandidate)->exists()
            && GeneralInfo::where('id_candidate', $idCandidate)->exists()
            && WorkExpInfo::where('id_candidate', $idCandidate)->exists();
        $jobApplies = JobApplies::where('id_candidate', $idCandidate)->count();

        return view('landingPage.dashboard.home', compact('profileComplete', 'jobApplies'));
    }
    public function profile(Request $request)
    {
        $idCandidate = auth()->user()->id_candidate;
        $candidate = Candidate::where('id', $idCandidate)->first();
        $mainProfile = MainProfile::where('id_candidate', $idCandidate)->first();
        $generalInfo = GeneralInfo::where('id_candidate', $idCandidate)->first();
        $eduInfo = EducationInfo::where('id_candidate', $idCandidate)->get();
        $workExpInfo = WorkExpInfo::where('id_candidate', $idCandidate)->get();

        return view('landingPage.dashboard.profile', compact('candidate', 'mainProfile', 'generalInfo', 'eduInfo', 'workExpInfo'));
    }
    public function jobApply(Request $request)
    {
        return view('landingPage.dashboard.job_apply');
    }
}

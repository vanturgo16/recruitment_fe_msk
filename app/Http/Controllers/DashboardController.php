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
use App\Models\MstDropdowns;

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

        return view('dashboard.index', compact('profileComplete', 'jobApplies'));
    }
}

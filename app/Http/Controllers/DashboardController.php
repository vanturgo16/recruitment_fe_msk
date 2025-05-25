<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// Traits
use App\Traits\AuditLogsTrait;
use App\Traits\ProfilTrait;

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
    use ProfilTrait;

    public function home(Request $request)
    {
        $idCandidate = auth()->user()->id_candidate;
        $profileComplete = $this->checkProfile($idCandidate);
        $jobAppliesIP = $this->checkApplicationIP($idCandidate);
        $jobApplies = JobApplies::where('id_candidate', $idCandidate)->count();
        $lastJobApplies = JobApplies::where('id_candidate', $idCandidate)->where('status', 0)->orderBy('created_at', 'desc')->first();

        return view('dashboard.index', compact('profileComplete', 'jobAppliesIP', 'jobApplies', 'lastJobApplies'));
    }
}

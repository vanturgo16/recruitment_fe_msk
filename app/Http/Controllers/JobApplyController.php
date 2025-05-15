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

class JobApplyController extends Controller
{
    use AuditLogsTrait;

    public function index(Request $request)
    {
        return view('dashboard.jobApply.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// Traits
use App\Traits\AuditLogsTrait;

// Model
use App\Models\User;
use App\Models\Joblist;

class LandingPageController extends Controller
{
    use AuditLogsTrait;

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
        $jobLists = $jobLists->paginate(3);

        if ($request->ajax()) {
            return view('landingPage.partials.joblist', compact('jobLists', 'search'))->render();
        }
        
        return view('landingPage.index', compact('jobBanner', 'jobLists', 'search'));
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// Traits
use App\Traits\AuditLogsTrait;

// Model
use App\Models\User;

class LandingPageController extends Controller
{
    use AuditLogsTrait;

    public function index(Request $request)
    {
        return view('landingPage.index');
    }
}

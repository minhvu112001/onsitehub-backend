<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Application;

class AdminStatsController extends Controller
{
    public function index()
    {
        return response()->json([
            'users' => User::count(),
            'employers' => Employer::count(),
            'jobs' => Job::count(),
            'applications' => Application::count()
        ]);
    }
}

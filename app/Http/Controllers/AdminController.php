<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Job;

class AdminController extends Controller
{
    public function users()
    {
        return User::with('profile')->get();
    }

    public function jobs()
    {
        return Job::with('employer')->get();
    }
}

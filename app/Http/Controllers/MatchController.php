<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $profile = $user->profile;

        if (!$profile || $user->role !== 'candidate') {
            return response()->json(['message' => 'Unauthorized or incomplete profile'], 403);
        }

        $matched = Job::where('location', $profile->location)
            ->whereJsonContains('skills', $profile->skills ?? [])
            ->get();

        return response()->json($matched);
    }
}

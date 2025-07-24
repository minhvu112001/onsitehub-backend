<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        return response()->json($request->user()->profile);
    }

    public function update(Request $request)
    {
        $user = $request->user();
        $profile = $user->profile ?? new Profile(['user_id' => $user->id]);

        $profile->bio = $request->bio;
        $profile->location = $request->location;
        $profile->skills = $request->skills;
        $profile->experience = $request->experience;

        $profile->save();

        return response()->json(['profile' => $profile]);
    }
}

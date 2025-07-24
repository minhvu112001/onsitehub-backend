<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        return Job::with('employer')->latest()->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'skills' => 'required|array',
        ]);

        $job = Job::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'skills' => $request->skills,
            'employer_id' => $request->user()->id,
        ]);

        return response()->json($job, 201);
    }

    public function show(Job $job)
    {
        return $job;
    }

    public function update(Request $request, Job $job)
    {
        $this->authorize('update', $job);

        $job->update($request->only(['title', 'description', 'location', 'skills']));
        return response()->json($job);
    }

    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);
        $job->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Department;

class JobController extends Controller
{
    public function index()
    {
        $jobPosts = Job::with(['department', 'user'])->get(); // Include user in the query
        return view('jobs.index', compact('jobPosts'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('jobs.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'department_id' => 'required|exists:departments,id',
            'application_deadline' => 'required|date',
            'skills' => 'nullable|string', // Allow skills to be optional
            'job_type' => 'required|string|max:255', // Add validation for job type if needed
            'education' => 'required|string|max:255', // Add validation for education
            'experience' => 'required|string|max:255', // Add validation for experience
        ]);
    
        // Automatically assign the authenticated user
        $request->merge(['user_id' => auth()->id()]);
    
        // Process the skills input to store as an array
        if ($request->filled('skills')) {
            $request->merge(['skills' => explode(',', $request->input('skills'))]);
        }
    
        Job::create($request->all());
    
        return redirect()->route('jobs.index')->with('success', 'Job post created successfully.');
    }

    public function show(JobPost $jobPost)
    {
        return view('jobs.show', compact('jobPost'));
    }

    public function edit(JobPost $jobPost)
    {
        $departments = Department::all();
        return view('jobs.edit', compact('jobPost', 'departments'));
    }

    public function update(Request $request, JobPost $jobPost)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'department_id' => 'required|exists:departments,id',
            'location' => 'nullable|string|max:255',
            'application_deadline' => 'required|date',
        ]);

        $jobPost->update($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job post updated successfully.');
    }

    public function destroy(JobPost $jobPost)
    {
        $jobPost->delete();

        return redirect()->route('jobs.index')->with('success', 'Job post deleted successfully.');
    }
}

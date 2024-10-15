<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use App\Models\Experience;
use App\Models\Education;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function index()
    {
        // Check if the authenticated user is an admin
        if (Auth::user()->role == "admin") { // Assuming you have an is_admin attribute in your User model
            // If the user is an admin, retrieve all applications
            $applications = Application::with('job')->get();
        } else {
            // If the user is not an admin, retrieve only their applications
            $applications = Application::with('job')->where('user_id', Auth::id())->get();
        }
    
        return view('applications.index', compact('applications'));
    }
    

    public function create($job_id)
    {
        $job = Job::findOrFail($job_id); // Fetch the job using the job_id
        return view('applications.create', compact('job'));
    }

 
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'job_id' => 'required', // Ensure the job_id exists in job_posts
            'educational_transcript' => 'nullable|file|mimes:pdf,doc,docx',
            'id_proof' => 'nullable|file|mimes:pdf,doc,docx',
            'resume' => 'required|file|mimes:pdf,doc,docx',
            'experiences' => 'array',
            'educations' => 'array',
        ]);
    
        \Log::info('Incoming job ID: ' . $request->input('job_id'));
    
        try {
            // Create a new application instance
            $application = new Application();
            $application->job_id = $request->input('job_id');
            $application->user_id = Auth::id(); // Assuming the user is logged in
    
            // Handle file uploads directly from the request
            if ($request->hasFile('educational_transcript')) {
                $application->educational_transcript = $request->file('educational_transcript')->storeAs(
                    'uploads/transcripts', 
                    $request->file('educational_transcript')->getClientOriginalName()
                );
            }
    
            if ($request->hasFile('id_proof')) {
                $application->id_proof = $request->file('id_proof')->storeAs(
                    'uploads/id_proofs', 
                    $request->file('id_proof')->getClientOriginalName()
                );
            }
    
            if ($request->hasFile('resume')) {
                $application->resume = $request->file('resume')->storeAs(
                    'uploads/resumes', 
                    $request->file('resume')->getClientOriginalName()
                );
            } else {
                return redirect()->back()->withErrors(['resume' => 'Resume is required.']);
            }
    
            // Save the application record first
            $application->save();
    
            // Store experiences (make sure experiences have the correct structure)
            if (isset($request->experiences)) {
                foreach ($request->experiences as $experience) {
                    $application->experiences()->create($experience);
                }
            }
    
            // Store educations (make sure educations have the correct structure)
            if (isset($request->educations)) {
                foreach ($request->educations as $education) {
                    $application->educations()->create($education);
                }
            }
    
            return redirect()->route('applications.index')->with('success', 'Application submitted successfully.');
        } catch (\Exception $e) {
            \Log::error('Error submitting application: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'There was an error submitting your application. Please try again later.']);
        }
    }
    
    


    public function show(Application $application)
    {
        return view('applications.show', compact('application'));
    }

    public function edit(Application $application)
    {
        return view('applications.edit', compact('application'));
    }

    public function update(Request $request, Application $application)
    {
        // Update logic here...
    }

    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->route('applications.index')->with('success', 'Application deleted successfully.');
    }
}

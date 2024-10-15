<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Check the role of the authenticated user
        if (Auth::check()) {
            $user = Auth::user();

            // Return the appropriate view based on user role
            if ($user->role === 'admin') {
                return view('admin.dashboard'); // Admin dashboard view
            } elseif ($user->role === 'applicant') {
                return view('applicant.dashboard'); // Applicant dashboard view
            }
        }

        // Default to the home view if no user is authenticated
        return view('auth.login');
    }
}

@extends('layouts.app')

@section('content')
<div class="container-scroller">
@include('layouts.sidebar')

<div class="container-fluid page-body-wrapper">
    @include('layouts.navbar')
    <div class="main-panel">
    <div class="content-wrapper">
        <h1>Application Details</h1>

        <!-- Applicant and Job Information (Same Row) -->
        <div class="row mb-4">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Applicant Information</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $application->user->name }}</p>
                        <p><strong>Email:</strong> {{ $application->user->email }}</p>
                        <p><strong>Phone:</strong> {{ $application->user->phone ?? 'Not provided' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Job Information</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Job Title:</strong> {{ $application->job->title }}</p>
                        <p><strong>Job Description:</strong> {!! $application->job->description !!}</p>
                        <p><strong>Job Type:</strong> {{ $application->job->job_type }}</p>
                        <p><strong>Posted on:</strong> {{ $application->job->created_at->format('F j, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Timelines -->
        <div class="row">
            <!-- Experience Timeline -->
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Experience Timeline</h3>
                    </div>
                    <div class="card-body">
                        <ul class="timeline">
                            @foreach($application->experiences as $experience)
                            <li class="timeline-item">
                                <span class="timeline-date">{{ \Carbon\Carbon::parse($experience->start_date)->format('F Y') }} - {{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('F Y') : 'Present' }}</span>
                                <div class="timeline-content">
                                    <h4>{{ $experience->job_title }} at {{ $experience->company }}</h4>
                                    <p>{{ $experience->description }}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Education Timeline -->
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Education Timeline</h3>
                    </div>
                    <div class="card-body">
                        <ul class="timeline">
                            @foreach($application->educations as $education)
                            <li class="timeline-item">
                                <span class="timeline-date">{{ \Carbon\Carbon::parse($education->graduation_date)->format('F Y') }}</span>
                                <div class="timeline-content">
                                    <h4>{{ $education->degree }} from {{ $education->institution }}</h4>
                                    <p>{{ $education->description }}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Attachments Section -->
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Attachments</h3>
                    </div>
                    <div class="card-body">
                        <ul>
                            @if($application->resume)
                            <li><strong>Resume:</strong> <a href="{{ asset('storage/' . $application->resume) }}" target="_blank">Download Resume</a></li>
                            @endif
                            @if($application->educational_transcript)
                            <li><strong>Educational Transcript:</strong> <a href="{{ asset('storage/' . $application->transcript) }}" target="_blank">Download Transcript</a></li>
                            @endif
                            @if($application->id)
                            <li><strong>ID:</strong> <a href="{{ asset('storage/' . $application->id) }}" target="_blank">Download ID</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</div>
</div>
@endsection

<!-- CSS for the timeline design -->
<style>
    .timeline {
        list-style: none;
        padding: 0;
        position: relative;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 20px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #007bff;
    }

    .timeline-item {
        margin-bottom: 20px;
        position: relative;
        padding-left: 40px;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: 12px;
        background: #007bff;
        border-radius: 50%;
        height: 16px;
        width: 16px;
        top: 5px;
    }

    .timeline-date {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .timeline-content {
        background-color: #18191a;
        padding: 10px;
        border-radius: 5px;
    }

    .timeline-content h4 {
        margin-top: 0;
    }

    .card-header h3 {
        margin-bottom: 0;
    }

    .row.mb-4 .card {
        background-color: #18191a;
        border: 1px solid #ddd;
    }

    .main-panel {
        background-color: #18191a;
    }
</style>

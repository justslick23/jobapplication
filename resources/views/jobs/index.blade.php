@extends('layouts.app')

@section('content')
<div class="container-scroller">
    @include('layouts.sidebar')

    <div class="container-fluid page-body-wrapper">
        @include('layouts.navbar')

        <div class="main-panel">
            <div class="content-wrapper">
                <h2>Job Posts</h2>
                @if(Auth::user()->role == "admin")
                    <a href="{{ route('jobs.create') }}" class="btn btn-primary">Create New Job Post</a>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Application Deadline</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobPosts as $jobPost)
                            <tr>
                                <td>{{ $jobPost->title }}</td>
                                <td>{{ $jobPost->department->name }}</td>
                                <td>
                                    @if($jobPost->status === 'open')
                                        <span class="badge badge-success">Open</span>
                                    @elseif($jobPost->status === 'closed')
                                        <span class="badge badge-danger">Closed</span>
                                    @else
                                        <span class="badge badge-secondary">Unknown</span>
                                    @endif
                                </td>
                                <td>{{ $jobPost->application_deadline->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('jobs.show', $jobPost) }}" class="btn btn-info">View</a>
                                    @if(Auth::user()->role == "admin")
                                        <a href="{{ route('jobs.edit', $jobPost) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('jobs.destroy', $jobPost) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    @elseif(Auth::user()->role == "applicant" && $jobPost->status === 'open')
                                        <a href="{{ route('applications.create', ['job_id' => $jobPost->id]) }}" class="btn btn-success">Apply</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

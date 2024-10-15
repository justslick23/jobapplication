@extends('layouts.app')

@section('content')
<div class="container-scroller">
    @include('layouts.sidebar')

    <div class="container-fluid page-body-wrapper">
        @include('layouts.navbar')

        <div class="main-panel">
            <div class="content-wrapper">
                <h2>Departments</h2>
              
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <a href="{{ route('departments.create') }}" class="btn btn-primary">Create New Department</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <td>{{ $department->name }}</td>
                                <td>
                                    <a href="{{ route('departments.show', $department) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('departments.edit', $department) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('departments.destroy', $department) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
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

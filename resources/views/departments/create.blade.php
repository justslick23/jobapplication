@extends('layouts.app')

@section('content')
<div class="container-scroller">
    @include('layouts.sidebar')

    <div class="container-fluid page-body-wrapper">
        @include('layouts.navbar')

        <div class="main-panel">
            <div class="content-wrapper">
                <h2>Create New Department</h2>
                <form action="{{ route('departments.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Department Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Create Department</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

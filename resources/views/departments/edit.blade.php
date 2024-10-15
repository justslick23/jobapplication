@extends('layouts.app')

@section('content')
<div class="container-scroller">
    @include('layouts.sidebar')

    <div class="container-fluid page-body-wrapper">
        @include('layouts.navbar')

        <div class="main-panel">
            <div class="content-wrapper">
                <h2>Edit Department</h2>
                <form action="{{ route('departments.update', $department) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Department Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $department->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control">{{ $department->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Department</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

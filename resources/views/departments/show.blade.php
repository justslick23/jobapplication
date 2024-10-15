@extends('layouts.app')

@section('content')
<div class="container-scroller">
    @include('layouts.sidebar')

    <div class="container-fluid page-body-wrapper">
        @include('layouts.navbar')

        <div class="main-panel">
            <div class="content-wrapper">
                <h2>{{ $department->name }}</h2>
                <a href="{{ route('departments.index') }}" class="btn btn-secondary">Back to Departments</a>
            </div>
        </div>
    </div>
</div>
@endsection

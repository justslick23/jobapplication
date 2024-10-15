@extends('layouts.app') <!-- Extend your main layout -->

@section('title', 'Admin Register') <!-- Set the title for this page -->

@section('content') <!-- Content section for the admin registration page -->
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                <div class="card col-lg-4 mx-auto">
                    <div class="card-body px-5 py-5">
                        <h3 class="card-title text-start mb-3">Register Admin User</h3>
                        <form method="POST" action="{{ route('admin.register') }}"> <!-- Update action as necessary -->
                            @csrf <!-- Include CSRF token for security -->
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control p_input" name="username" id="username" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control p_input" name="email" id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control p_input" name="password" id="password" required>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control p_input" name="password_confirmation" id="password_confirmation" required>
                            </div>
                            <div class="text-center d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button> <!-- Register button -->
                            </div>
                            <p class="sign-up text-center">Already have an Account?<a href="{{ route('login') }}"> Sign In</a></p> <!-- Link to login -->
                        </form>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
@endsection <!-- End of content section -->

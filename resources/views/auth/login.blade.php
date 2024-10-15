@extends('layouts.app') <!-- Extend your main layout -->

@section('title', 'Login') <!-- Set the title for this page -->

@section('content') <!-- Content section for the login page -->
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                <div class="card col-lg-4 mx-auto">
                    <div class="card-body px-5 py-5">
                        <h3 class="card-title text-start mb-3">Login</h3>
                        <form method="POST" action="{{ route('login') }}"> <!-- Update the action as necessary -->
                            @csrf <!-- Include CSRF token for security -->
                            <div class="form-group">
                                <label for="username">Username or email *</label>
                                <input type="text" class="form-control p_input" name="username" id="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password *</label>
                                <input type="password" class="form-control p_input" name="password" id="password" required>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="remember"> Remember me
                                    </label>
                                </div>
                                <a href="#" class="forgot-pass">Forgot password</a>
                            </div>
                            <div class="text-center d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-facebook me-2 col">
                                    <i class="mdi mdi-facebook"></i> Facebook
                                </button>
                                <button class="btn btn-google col">
                                    <i class="mdi mdi-google-plus"></i> Google plus
                                </button>
                            </div>
                            <p class="sign-up">Don't have an Account?<a href="{{ route('register') }}"> Sign Up</a></p>
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

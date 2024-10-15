@extends('layouts.app') <!-- Extend your main layout -->

@section('title', 'Register') <!-- Set the title for this page -->

@section('content') <!-- Content section for the registration page -->
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                <div class="card col-lg-6 mx-auto">
                    <div class="card-body px-5 py-5">
                        <h3 class="card-title text-start mb-3">Register</h3>
                        
                        @if ($errors->any()) <!-- Check if there are any validation errors -->
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error) <!-- Loop through the errors and display them -->
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}"> <!-- Update action as necessary -->
                            @csrf <!-- Include CSRF token for security -->

                            <div class="row"> <!-- Row for input fields -->
                                <div class="form-group col-md-6"> <!-- First Name -->
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control p_input" name="first_name" id="first_name" required>
                                </div>
                                <div class="form-group col-md-6"> <!-- Last Name -->
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control p_input" name="last_name" id="last_name" required>
                                </div>
                            </div>

                            <div class="row"> <!-- Row for username and email -->
                                <div class="form-group col-md-6"> <!-- Username -->
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control p_input" name="username" id="username" required>
                                </div>
                                <div class="form-group col-md-6"> <!-- Email -->
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control p_input" name="email" id="email" required>
                                </div>
                            </div>

                            <div class="row"> <!-- Row for password and confirm password -->
                                <div class="form-group col-md-6"> <!-- Password -->
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control p_input" name="password" id="password" required>
                                </div>
                                <div class="form-group col-md-6"> <!-- Confirm Password -->
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control p_input" name="password_confirmation" id="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>User Type</label>
                                <select name="user_type" class="form-control" required>
                                    <option value="applicant">Applicant</option>
                                    <option value="admin">Admin</option>
                                </select>
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
                                <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button> <!-- Changed button text to Register -->
                            </div>

                            <p class="sign-up text-center">Already have an Account?<a href="{{ route('login') }}"> Sign In</a></p> <!-- Updated link to login route -->
                            <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
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

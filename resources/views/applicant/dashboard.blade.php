@extends('layouts.app')

@section('content')
<div class="container-scroller">
    @include('layouts.sidebar')

    <div class="container-fluid page-body-wrapper">
        @include('layouts.navbar')

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-6 grid-margin">
                        <div class="card card-rounded">
                            <div class="card-body">
                                <h4 class="card-title">My Applications</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Job Title</th>
                                                <th>Status</th>
                                                <th>Date Applied</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Software Developer</td>
                                                <td><label class="badge badge-warning">Pending</label></td>
                                                <td>2024-10-10</td>
                                            </tr>
                                            <tr>
                                                <td>UI/UX Designer</td>
                                                <td><label class="badge badge-success">Interviewed</label></td>
                                                <td>2024-10-12</td>
                                            </tr>
                                            <tr>
                                                <td>Quality Assurance</td>
                                                <td><label class="badge badge-danger">Rejected</label></td>
                                                <td>2024-10-13</td>
                                            </tr>
                                            <tr>
                                                <td>Data Scientist</td>
                                                <td><label class="badge badge-info">Offer Sent</label></td>
                                                <td>2024-10-14</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 grid-margin">
                        <div class="card card-rounded">
                            <div class="card-body">
                                <h4 class="card-title">Upcoming Job Openings</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Job Title</th>
                                                <th>Department</th>
                                                <th>Application Deadline</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Frontend Developer</td>
                                                <td>Development</td>
                                                <td>2024-11-01</td>
                                            </tr>
                                            <tr>
                                                <td>Backend Developer</td>
                                                <td>IT</td>
                                                <td>2024-11-05</td>
                                            </tr>
                                            <tr>
                                                <td>Project Manager</td>
                                                <td>Management</td>
                                                <td>2024-11-10</td>
                                            </tr>
                                            <tr>
                                                <td>Data Analyst</td>
                                                <td>Analytics</td>
                                                <td>2024-11-15</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Info Section -->
                <div class="row">
                    <div class="col-lg-12 grid-margin">
                        <div class="card card-rounded">
                            <div class="card-body">
                                <h4 class="card-title">Important Notifications</h4>
                                <p>You have <strong>3</strong> new applications this month.</p>
                                <p>Check your application status regularly!</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- content-wrapper ends -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
                    <span class="text-muted float-none float-sm-end d-block mt-1 mt-sm-0 text-center">
                        Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
                    </span>
                </div>
            </footer>
            <!-- partial -->
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
// You can add any JavaScript related to the applicant dashboard here
</script>
@endsection

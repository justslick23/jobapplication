@extends('layouts.app')

@section('content')

<div class="container-scroller">
    @include('layouts.sidebar')

    <div class="container-fluid page-body-wrapper">
        @include('layouts.navbar')

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-3 col-md-6 grid-margin stretch-card">
                        <div class="card card-rounded bg-gradient-primary text-white">
                            <div class="card-body">
                                <h4 class="card-title">Total Applications</h4>
                                <h2 class="font-weight-bold">250</h2>
                                <p>New Applications This Month</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 grid-margin stretch-card">
                        <div class="card card-rounded bg-gradient-info text-white">
                            <div class="card-body">
                                <h4 class="card-title">Interview Scheduled</h4>
                                <h2 class="font-weight-bold">80</h2>
                                <p>Interviews This Week</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 grid-margin stretch-card">
                        <div class="card card-rounded bg-gradient-success text-white">
                            <div class="card-body">
                                <h4 class="card-title">Offers Sent</h4>
                                <h2 class="font-weight-bold">50</h2>
                                <p>Offers Sent This Month</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 grid-margin stretch-card">
                        <div class="card card-rounded bg-gradient-danger text-white">
                            <div class="card-body">
                                <h4 class="card-title">Rejected Applications</h4>
                                <h2 class="font-weight-bold">30</h2>
                                <p>Rejections This Month</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 grid-margin">
                        <div class="card card-rounded">
                            <div class="card-body">
                                <h4 class="card-title">Recent Applications</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Position</th>
                                                <th>Status</th>
                                                <th>Date Applied</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>John Doe</td>
                                                <td>john.doe@example.com</td>
                                                <td>Software Developer</td>
                                                <td><label class="badge badge-warning">Pending</label></td>
                                                <td>2024-10-10</td>
                                            </tr>
                                            <tr>
                                                <td>Jane Smith</td>
                                                <td>jane.smith@example.com</td>
                                                <td>UI/UX Designer</td>
                                                <td><label class="badge badge-success">Interviewed</label></td>
                                                <td>2024-10-12</td>
                                            </tr>
                                            <tr>
                                                <td>Emily Johnson</td>
                                                <td>emily.johnson@example.com</td>
                                                <td>Quality Assurance</td>
                                                <td><label class="badge badge-danger">Rejected</label></td>
                                                <td>2024-10-13</td>
                                            </tr>
                                            <tr>
                                                <td>Michael Brown</td>
                                                <td>michael.brown@example.com</td>
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
                </div>

                <!-- New Charts Section -->
                <div class="row">
                    <div class="col-lg-6 grid-margin">
                        <div class="card card-rounded">
                            <div class="card-body">
                                <h4 class="card-title">Applications by Status</h4>
                                <canvas id="applicationsStatusChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 grid-margin">
                        <div class="card card-rounded">
                            <div class="card-body">
                                <h4 class="card-title">Monthly Applications Trend</h4>
                                <canvas id="monthlyApplicationsChart"></canvas>
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

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Applications by Status Chart
    const ctx1 = document.getElementById('applicationsStatusChart').getContext('2d');
    const applicationsStatusChart = new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: ['Pending', 'Interviewed', 'Rejected', 'Offer Sent'],
            datasets: [{
                label: 'Applications by Status',
                data: [100, 80, 30, 40], // Dummy data
                backgroundColor: ['#ffbb33', '#00b5d8', '#ff4c52', '#5cb85c'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Applications by Status'
                }
            }
        }
    });

    // Monthly Applications Trend Chart
    const ctx2 = document.getElementById('monthlyApplicationsChart').getContext('2d');
    const monthlyApplicationsChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            datasets: [{
                label: 'Applications',
                data: [30, 50, 70, 90, 60, 100, 120, 80, 150, 250], // Dummy data
                fill: false,
                borderColor: '#5cb85c',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Monthly Applications Trend'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection

@endsection

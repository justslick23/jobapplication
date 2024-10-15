<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{ url('/') }}">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="logo" />
        </a>
        <a class="sidebar-brand brand-logo-mini" href="{{ url('/') }}">
            <img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" />
        </a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle" src="{{ asset('assets/images/faces/face15.jpg') }}" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h5>
                        <span>{{ auth()->user()->role }}</span> <!-- Display user role -->
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-cog text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>

        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>

        {{-- Admin Links --}}
        @if(auth()->user()->role === 'admin')
            <li class="nav-item menu-items">
                <a class="nav-link" href="/">
                    <span class="menu-icon">
                        <i class="mdi mdi-speedometer"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('jobs.index') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-file-document"></i>
                    </span>
                    <span class="menu-title">Jobs</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('applications.index') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-file-document"></i>
                    </span>
                    <span class="menu-title">Job Applications</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="#">
                    <span class="menu-icon">
                        <i class="mdi mdi-account"></i>
                    </span>
                    <span class="menu-title">Manage Candidates</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="#">
                    <span class="menu-icon">
                        <i class="mdi mdi-calendar-check"></i>
                    </span>
                    <span class="menu-title">Interviews Scheduled</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="#">
                    <span class="menu-icon">
                        <i class="mdi mdi-email-check"></i>
                    </span>
                    <span class="menu-title">Offers Sent</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="#">
                    <span class="menu-icon">
                        <i class="mdi mdi-alert-circle"></i>
                    </span>
                    <span class="menu-title">Rejected Applications</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('departments.index') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-domain"></i>
                    </span>
                    <span class="menu-title">Departments</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="#">
                    <span class="menu-icon">
                        <i class="mdi mdi-cog"></i>
                    </span>
                    <span class="menu-title">Settings</span>
                </a>
            </li>
        @endif

        {{-- Applicant Links --}}
        @if(auth()->user()->role === 'applicant')
            <li class="nav-item menu-items">
                <a class="nav-link" href="/">
                    <span class="menu-icon">
                        <i class="mdi mdi-speedometer"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('jobs.index') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-file-document"></i>
                    </span>
                    <span class="menu-title">Jobs</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('applications.index') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-file-document"></i>
                    </span>
                    <span class="menu-title">My Applications</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="#">
                    <span class="menu-icon">
                        <i class="mdi mdi-calendar-check"></i>
                    </span>
                    <span class="menu-title">Upcoming Interviews</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="#">
                    <span class="menu-icon">
                        <i class="mdi mdi-alert-circle"></i>
                    </span>
                    <span class="menu-title">Application Status</span>
                </a>
            </li>
        @endif

    </ul>
</nav>

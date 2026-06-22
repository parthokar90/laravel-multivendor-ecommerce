<div class="headerbar">
    <div class="headerbar-left d-flex align-items-center">
        <a href="{{ url('/admin/dashboard') }}" class="logo">
            <img alt="Logo" src="{{ asset('admin/assets/images/logo.png') }}" />
            <span>Dashboard</span>
        </a>
    </div>

    <nav class="navbar-custom">
        <ul class="list-inline menu-left mb-0 float-left d-flex align-items-center">
            <li class="float-left">
                <button class="button-menu-mobile open-left">
                    <i class="fas fa-bars"></i>
                </button>
            </li>
            <li class="float-left ml-3 d-none d-md-inline-block">
                <a href="{{ url('/') }}" target="_blank" class="btn btn-sm text-white border border-light rounded-pill" style="border-color: rgba(255,255,255,0.3) !important; font-size: 12px; padding: 4px 12px;">
                    <i class="fas fa-globe mr-1"></i> View Website
                </a>
            </li>
        </ul>

        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="far fa-envelope"></i>
                    <span class="notif-bullet"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                    <div class="dropdown-item noti-title">
                        <h5><small><span class="label label-danger pull-xs-right">3</span>Mailbox</small></h5>
                    </div>
                    <a href="#" class="dropdown-item notify-item">
                        <p class="notify-details ml-0">
                            <b>System Notification</b>
                            <span>Check your new store requests</span>
                            <small class="text-muted">Just now</small>
                        </p>
                    </a>
                    <a href="#" class="dropdown-item notify-item notify-all">View All Messages</a>
                </div>
            </li>

            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('admin/assets/images/avatars/admin.png') }}" alt="Profile image" class="avatar-rounded">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                    <div class="dropdown-item noti-title">
                        <h5 class="text-overflow mb-0">
                            <small class="font-weight-bold">
                                Hello, {{ Auth::guard('admin')->user()->first_name ?? Auth::user()->first_name ?? 'Admin' }}
                            </small>
                        </h5>
                    </div>

                    <a href="#" class="dropdown-item notify-item">
                        <i class="fas fa-user text-muted mr-2"></i> <span>Profile</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();"
                        class="dropdown-item notify-item text-danger">
                        <i class="fas fa-power-off mr-2"></i> <span>Logout</span>
                    </a>

                    <form id="admin-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
</div>
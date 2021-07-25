<div class="headerbar">
    <!-- LOGO -->
    <div class="headerbar-left">
        <a href="index.html" class="logo">
            <img alt="Logo" src="{{asset('admin/assets/images/logo.png')}}" />
            <span>Dashboard</span>
        </a>
    </div>

    <nav class="navbar-custom">
        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                    <i class="far fa-envelope"></i>
                    <span class="notif-bullet"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5>
                            <small>
                                <span class="label label-danger pull-xs-right">12</span>Mailbox</small>
                        </h5>
                    </div>
                    <!-- item-->
                    <a href="mail-all.html" class="dropdown-item notify-item">
                        <p class="notify-details ml-0">
                            <b>John Doe</b>
                            <span>New message received</span>
                            <small class="text-muted">3 minutes ago</small>
                        </p>
                    </a>
                    <!-- item-->
                    <a href="mail-all.html" class="dropdown-item notify-item">
                        <p class="notify-details ml-0">
                            <b>Michael Smith</b>
                            <span>New message received</span>
                            <small class="text-muted">18 minutes ago</small>
                        </p>
                    </a>
                    <!-- item-->
                    <a href="mail-all.html" class="dropdown-item notify-item">
                        <p class="notify-details ml-0">
                            <b>John Lenons</b>
                            <span>New message received</span>
                            <small class="text-muted">Yesterday, 18:27</small>
                        </p>
                    </a>
                    <!-- All-->
                    <a href="mail-all.html" class="dropdown-item notify-item notify-all">
                        View All Messages
                    </a>
                </div>
            </li>
            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                    <i class="far fa-bell"></i>
                    <span class="notif-bullet"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5>
                            <small>
                                <span class="label label-danger pull-xs-right">5</span>Allerts</small>
                        </h5>
                    </div>
                    <!-- item-->
                    <a href="#" class="dropdown-item notify-item">
                        <div class="notify-icon bg-faded">
                            <img src="{{asset('admin/assets/images/avatars/avatar2.png')}}" alt="img" class="rounded-circle img-fluid">
                        </div>
                        <p class="notify-details">
                            <b>John Doe</b>
                            <span>User registration</span>
                            <small class="text-muted">3 minutes ago</small>
                        </p>
                    </a>
                    <!-- item-->
                    <a href="#" class="dropdown-item notify-item">
                        <div class="notify-icon bg-faded">
                            <img src="{{asset('admin/assets/images/avatars/avatar3.png')}}" alt="img" class="rounded-circle img-fluid">
                        </div>
                        <p class="notify-details">
                            <b>Michael Cox</b>
                            <span>Task 2 completed</span>
                            <small class="text-muted">12 minutes ago</small>
                        </p>
                    </a>
                    <!-- item-->
                    <a href="#" class="dropdown-item notify-item">
                        <div class="notify-icon bg-faded">
                            <img src="{{asset('admin/assets/images/avatars/avatar4.png')}}" alt="img" class="rounded-circle img-fluid">
                        </div>
                        <p class="notify-details">
                            <b>Michelle Dolores</b>
                            <span>New job completed</span>
                            <small class="text-muted">35 minutes ago</small>
                        </p>
                    </a>
                    <!-- All-->
                    <a href="#" class="dropdown-item notify-item notify-all">
                        View All Allerts
                    </a>

                </div>
            </li>
            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                    <i class="fas fa-cog"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-sm">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5>
                            <small>Settings</small>
                        </h5>
                    </div>
                    <!-- item-->
                    <a href="#" class="dropdown-item notify-item">
                        <p class="notify-details ml-0">
                            <i class="fas fa-cog"></i>
                            <b>Settings 1</b>
                        </p>
                    </a>
                    <!-- item-->
                    <a href="#" class="dropdown-item notify-item">
                        <p class="notify-details ml-0">
                            <i class="fas fa-cog"></i>
                            <b>Settings 2</b>
                        </p>
                    </a>
                    <!-- item-->
                    <a href="#" class="dropdown-item notify-item">
                        <p class="notify-details ml-0">
                            <i class="fas fa-cog"></i>
                            <b>Settings 3</b>
                        </p>
                    </a>
                </div>
            </li>
            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                    <img src="{{asset('admin/assets/images/avatars/admin.png')}}" alt="Profile image" class="avatar-rounded">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="text-overflow">
                            <small>Hello, {{auth()->user()->first_name}} {{auth()->user()->last_name}}</small>
                        </h5>
                    </div>
                    <!-- item-->
                    <a href="profile.html" class="dropdown-item notify-item">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>

                    <!-- item-->
                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                        <i class="fas fa-power-off"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left">
                    <i class="fas fa-bars"></i>
                </button>
            </li>
        </ul>
    </nav>
</div>
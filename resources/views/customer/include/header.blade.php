<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">

        <!-- LEFT SIDE (empty after removing logo) -->
        <div class="navbar-header" style="width:0;"></div>

        <div class="navbar-collapse collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto d-flex align-items-center">

                <!-- SEARCH -->
                <li>
                    <form class="app-search d-none d-md-block me-3">
                        <input type="text" placeholder="Search..." class="form-control">
                    </form>
                </li>

                <!-- USER -->
                <li class="nav-item dropdown">

                    <a class="profile-pic d-flex align-items-center text-white" href="#" data-bs-toggle="dropdown">
                        <i class="fa fa-user-circle fa-2x me-2"></i>
                        <span class="font-medium" style="color:white;">
                            {{ auth('web')->user()->first_name ?? '' }} {{ auth('web')->user()->last_name ?? '' }}
                        </span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fa fa-user me-2"></i> Profile
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <!-- LOGOUT -->
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fa fa-sign-out me-2"></i> Logout
                                </button>
                            </form>
                        </li>

                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>
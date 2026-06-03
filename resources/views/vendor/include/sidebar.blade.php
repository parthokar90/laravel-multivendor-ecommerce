<aside class="left-sidebar" data-sidebarbg="skin5">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">

                <!-- Dashboard -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="{{ route('vendor.dashboard') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <!-- Shop -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="#">
                        <i class="mdi mdi-store"></i>
                        <span class="hide-menu">My Shop</span>
                    </a>
                </li>

                <!-- Products -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="#">
                        <i class="mdi mdi-package-variant"></i>
                        <span class="hide-menu">Products</span>
                    </a>
                </li>

                <!-- Orders -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="#">
                        <i class="mdi mdi-cart"></i>
                        <span class="hide-menu">Orders</span>
                    </a>
                </li>

                <!-- Earnings -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="#">
                        <i class="mdi mdi-cash-multiple"></i>
                        <span class="hide-menu">Earnings</span>
                    </a>
                </li>

                <!-- Customers -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="#">
                        <i class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">Customers</span>
                    </a>
                </li>

                <!-- Reports -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="#">
                        <i class="mdi mdi-chart-line"></i>
                        <span class="hide-menu">Reports</span>
                    </a>
                </li>

                <!-- Settings -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="#">
                        <i class="mdi mdi-cog"></i>
                        <span class="hide-menu">Settings</span>
                    </a>
                </li>

                <!-- Logout -->
                <li class="sidebar-item p-3">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="btn btn-danger w-100 text-white d-flex align-items-center justify-content-center">

                        <i class="fa fa-power-off me-2"></i> Logout
                    </a>
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>

            </ul>
        </nav>
    </div>
</aside>
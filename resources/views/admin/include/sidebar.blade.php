@php $url=Route::currentRouteName(); @endphp
<div class="left main-sidebar">
    <div class="sidebar-inner leftscroll">
        <div id="sidebar-menu">
            <ul>
                <li class="submenu">
                    <a class="@if($url==='admin.dashboard') active @endif" href="{{route('admin.dashboard')}}">
                        <i class="fas fa-bars"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="submenu">
                    <a id="tables" class="@if($url==='customers.index' || $url==='customers.create' || $url==='customers.edit') active @endif" href="#">
                        <i class="fas fa-user"></i>
                        <span> Customer </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{route('customers.index')}}">List</a>
                        </li>
                        <li>
                            <a href="{{route('customers.create')}}">Add New</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a id="tables" class="@if($url==='vendors.index' || $url==='vendors.create' || $url==='vendors.edit') active @endif" href="#">
                        <i class="fas fa-user"></i>
                        <span>Vendor</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li class="@if($url==='vendors.index') active @endif">
                            <a href="{{route('vendors.index')}}">List</a>
                        </li>
                        <li class="@if($url==='vendors.create') active @endif">
                            <a href="{{route('vendors.create')}}">Add New</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a id="tables" class="@if($url==='products.index' || $url==='products.create' || $url==='products.edit' || $url==='categories.index' || $url==='categories.create' || $url==='categories.edit' || $url==='brands.index' || $url==='brands.create' || $url==='brands.edit' || $url==='attributes.index' || $url==='attributes.create' || $url==='attributes.edit') active @endif" href="#">
                        <i class="fab fa-product-hunt"></i>
                        <span> Product </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li class="@if($url==='products.index') active @endif">
                            <a href="{{route('products.index')}}">List</a>
                        </li>
                        <li class="@if($url==='products.create') active @endif">
                            <a href="{{route('products.create')}}">Add New</a>
                        </li>
                        <li class="@if($url==='categories.index') active @endif">
                            <a href="{{route('categories.index')}}">Category</a>
                        </li>
                        <li class="@if($url==='brands.index') active @endif">
                            <a href="{{route('brands.index')}}">Brand</a>
                        </li>
                        <li class="@if($url==='attributes.index') active @endif">
                            <a href="{{route('attributes.index')}}">Attribute</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a id="orders-menu" href="#">
                        <i class="fab fa-first-order-alt"></i>
                        <span>Order</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('orders.index') }}">List</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a id="tables" href="#">
                        <i class="fas fa-money-bill-alt"></i>
                        <span>Customer Payment</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="tables-basic.html">List</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a class="@if($url==='countries.index') active @endif" id="tables" href="#">
                        <i class="fas fa-flag"></i>
                        <span>Country</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a class="@if($url==='countries.index') active @endif" href="{{route('countries.index')}}">List</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a id="tables" href="#">
                        <i class="fas fa-user"></i>
                        <span>Customer Query</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="tables-basic.html">List</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a id="tables" href="#">
                        <i class="fas fa-copyright"></i>
                        <span>Coupon</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="tables-basic.html">List</a>
                        </li>
                        <li>
                            <a href="tables-datatable.html">Add New</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a id="tables" href="#">
                        <i class="fas fa-truck"></i>
                        <span>Delivery Charge</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="tables-basic.html">List</a>
                        </li>
                        <li>
                            <a href="tables-datatable.html">Add New</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a id="tables" href="#">
                        <i class="fas fa-thermometer-three-quarters"></i>
                        <span>System Status</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="tables-basic.html">List</a>
                        </li>
                        <li>
                            <a href="tables-datatable.html">Add New</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a id="tables" href="#">
                        <i class="fas fa-blog"></i>
                        <span>System Log</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="tables-basic.html">List</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a id="tables" href="#">
                        <i class="fas fa-user-tag"></i>
                        <span>Role</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="tables-basic.html">List</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a id="tables" href="#">
                        <i class="fas fa-user"></i>
                        <span>Assign Permission</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="tables-basic.html">List</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a id="tables" href="#">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="tables-basic.html">Update Settings</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                <li class="submenu">
                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off"></i>
                        <span> Logout </span>
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </li>


            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
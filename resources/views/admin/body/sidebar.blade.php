<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admin/dashboard') }}" class="brand-link">
        {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8"> --}}
        <span class="brand-text font-weight-light" style="margin-left: 20px">Admin Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('admin/dist/img/avatar5.png') }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Charts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/flot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Flot</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/inline.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/uplot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>uPlot</p>
                            </a>
                        </li>
                    </ul>
                </li>


                {{-- user section start here --}}

                <li class="nav-item {{ request()->is('admin/user*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview"
                        style="{{ request()->is('admin/user*') ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
                        <li class="nav-item">
                            <a href="{{ route('admin.manage.user') }}"
                                class="nav-link  {{ request()->is('admin/user/manage') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- user section end here --}}

                {{-- blog section start here --}}
                <li class="nav-item {{ request()->is('admin/blog*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('admin/blog*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>
                            Blog
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview"
                        style="{{ request()->is('admin/blog*') ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
                        <li class="nav-item">
                            <a href="{{ route('admin.add.blog') }}"
                                class="nav-link  {{ request()->is('admin/blog/add') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Blog</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview"
                        style="{{ request()->is('admin/blog*') ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
                        <li class="nav-item">
                            <a href="{{ route('admin.manage.blog') }}"
                                class="nav-link  {{ request()->is('admin/blog/manage') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Blog</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- blog section end here --}}


                {{-- portfolio section start here --}}

                <li class="nav-item {{ request()->is('admin/projects*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('admin/projects*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Projects
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview"
                        style="{{ request()->is('admin/projects*') ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
                        <li class="nav-item">
                            <a href="{{ route('admin.add.projects') }}"
                                class="nav-link  {{ request()->is('admin/projects/add') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Projects</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview"
                        style="{{ request()->is('admin/projects*') ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
                        <li class="nav-item">
                            <a href="{{ route('admin.manage.projects') }}"
                                class="nav-link  {{ request()->is('admin/projects/manage') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Projects</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- portfolio section end here --}}

                <li class="nav-item {{ request()->is('admin/employees*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('admin/employees*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users employee-icon"></i>
                        <p>
                            Employees
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview"
                        style="{{ request()->is('admin/employees*') ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
                        <li class="nav-item">
                            <a href="{{ route('admin.add.employees') }}"
                                class="nav-link  {{ request()->is('admin/employees/add') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Employees</p>
                            </a>
                        </li>
                    </ul>

                    {{-- <ul class="nav nav-treeview"
                        style="{{ request()->is('admin/projects*') ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
                        <li class="nav-item">
                            <a href="{{ route('admin.manage.projects') }}"
                                class="nav-link  {{ request()->is('admin/projects/manage') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Projects</p>
                            </a>
                        </li>
                    </ul> --}}
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

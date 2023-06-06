<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('Admin/dist/img/AdminLogo.jpg') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Bengal Software</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background-color:#114c6f;">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{-- <img src="{{ asset('Profile/Images/'.Auth::guard('web')->user()->image) }}" class="img-circle elevation-2" alt="User Image"> --}}
            </div>
            <div class="info">
                {{-- <a href="/updateprofile" class="d-block">{{  Auth::guard('web')->user()->name }}</a> --}}
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
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
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Manage Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('profile.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('profile.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Roles  -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Roles
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('role.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('role.dashboard')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-balance-scale"></i>
                        <p>
                            Finance
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-balance-scale"></i>
                                <p>
                                    Debit
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <!-- Add your Debit dropdown menu items here -->
                                <li class="nav-item">
                                    <a href="{{route('debit.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Debit Index</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('debit.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Debit Add</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('debit.category')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Debit Category</p>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-balance-scale"></i>
                                <p>
                                    Credit
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <!-- Add your Credit dropdown menu items here -->

                                <li class="nav-item">
                                    <a href="{{route('credit.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Credit Index</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('credit.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Credit Add</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('credit.category')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Credit Category</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('settings.general')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('settings.system')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>System Settings</p>
                            </a>
                        </li>
                    </ul>
                </li>


                
                

                
                
                
            </ul>
        </nav>
    </div>
</aside>
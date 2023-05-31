<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('Admin/dist/img/AdminLogo.jpg') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Bengal Software</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
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
                            {{-- <a href="{{route('admin.create')}}" class="nav-link"> --}}
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="{{route('admin.index')}}" class="nav-link"> --}}
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
                            {{-- <a href="{{ route('role.create') }}" class="nav-link"> --}}
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="{{ route('role.dashboard') }}" class="nav-link"> --}}
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
                            Finance & Accounting
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- <a href="{{route('proposal')}}" class="nav-link"> --}}
                                <i class="far fa-circle nav-icon"></i>
                                <p>Proposal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="{{route('estimate')}}" class="nav-link"> --}}
                                <i class="far fa-circle nav-icon"></i>
                                <p>Estimates</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="{{route('invoice')}}" class="nav-link"> --}}
                                <i class="far fa-circle nav-icon"></i>
                                <p>Invioces</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="{{route('admin.pages.Finance.Payment.index')}}" class="nav-link"> --}}
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Credit notes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Expenses</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>

                
                

                
                
                
            </ul>
        </nav>
    </div>
</aside>

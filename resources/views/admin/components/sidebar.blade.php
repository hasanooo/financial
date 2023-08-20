
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link" style="text-decoration: none;">
        <img src="{{ asset('Admin/dist/img/AdminLogo.jpg') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">Bengal Software</span>
        <i class="fas fa-xmark text-primary"></i>
    </a>

    


    <!-- Sidebar -->
    <div class="sidebar" style="background-color:#011b2b;">
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
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Manage Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('profile.create')}}" class="nav-link">
                                <i class="fas fa-user-plus nav-icon"></i>
                                <p>Add Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('profile.list')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
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
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Roles Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('role.dashboard')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Roles List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                            Contact
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('formsupplier')}}" class="nav-link">
                                <i class="fas fa-address-card nav-icon"></i>
                                <p>Supplier</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('customer.index')}}" class="nav-link">
                                <i class="fas fa-circle-user nav-icon"></i>
                                <p>Customers</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-users"></i>
                        <p>
                            CRM
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('customer.index')}}" class="nav-link">
                                <i class="fas fa-book nav-icon"></i>
                                <p>Customers Index</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customer.select') }}" class="nav-link">
                                <i class="fas fa-envelope nav-icon"></i>
                                <p>Send Mail</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('customer.index')}}" class="nav-link">
                                <i class="fas fa-money-bill-wave nav-icon"></i>
                                <p>Leads</p>
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
                                <i class="nav-icon fas fa-wallet"></i>
                                <p>
                                    Debit
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <!-- Add your Debit dropdown menu items here -->
                                <li class="nav-item">
                                    <a href="{{route('debit.index')}}" class="nav-link">
                                        <i class="fas fa-list nav-icon"></i>
                                        <p>Debit Index</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('debit.create')}}" class="nav-link">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Debit Add</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('debit.category')}}" class="nav-link">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>Debit Category</p>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-credit-card"></i>
                                <p>
                                    Credit
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <!-- Add your Credit dropdown menu items here -->

                                <li class="nav-item">
                                    <a href="{{route('credit.index')}}" class="nav-link">
                                        <i class="fas fa-list nav-icon"></i>
                                        <p>Credit Index</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('credit.create')}}" class="nav-link">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Credit Add</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('credit.category')}}" class="nav-link">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>Credit Category</p>
                                    </a>
                                </li>
                            </ul>

                                <li class="nav-item">
                                    <a href="{{route('cashbook.index')}}" class="nav-link">
                                        <i class="fas fa-sack-dollar nav-icon"></i>
                                        <p>Cash Book</p>
                                    </a>
                                </li>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Balance Sheet
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('assets.index')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Assets</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('liability.index')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Liabilities</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('share.index')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Shareholders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('balance.sheet')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Report</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>

              

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-p"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('prodauct.index')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Product Index</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('product.create')}}" class="nav-link">
                                <i class="far fa-plus nav-icon"></i>
                                <p>Product Add</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('product.category')}}" class="nav-link">
                                <i class="far fa-list-alt nav-icon"></i>
                                <p>Product Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('taxhome')}}" class="nav-link">
                                <i class="far fa-dollar nav-icon"></i>
                                <p>Tax</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Aqusition Product
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('purchase.index')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Aqusition List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('purchase.add')}}" class="nav-link">
                                <i class="far fa-plus nav-icon"></i>
                                <p>Add Aqusition</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fas fa-exchange nav-icon"></i>
                                <p>Purchase Return</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Sale
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('sale.list')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p> sale Index</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('sale.form')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p> sale Add</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>

                

                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>
                            Expenditure
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-wallet"></i>
                                <p>
                                    CAPEX
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <!-- Add your Debit dropdown menu items here -->
                                <li class="nav-item">
                                    <a href="{{route('capex.approved')}}" class="nav-link">
                                        <i class="fas fa-list nav-icon"></i>
                                        <p>Approved List</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href=" {{route('capex.pending')}}" class="nav-link">
                                        <i class="fas fa-list nav-icon"></i>
                                        <p>Pending List</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('capex.addview')}}" class="nav-link">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Add CAPEX</p>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-credit-card"></i>
                                <p>
                                    OPEX
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <!-- Add your Credit dropdown menu items here -->

                                <li class="nav-item">
                                    <a href="{{ route('opex.approved_index') }}" class="nav-link">
                                        <i class="fas fa-list nav-icon"></i>
                                        <p>Approved List</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('opex.pending_index') }}" class="nav-link">
                                        <i class="fas fa-list nav-icon"></i>
                                        <p>Pending List</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Add OPEX</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-print"></i>
                        <p>
                            Reports
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('prodauct.purchase.reports')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Purchase Reoprts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('emi.index')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>EMI Sale Reoprts</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Expenditure Reoprts</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- LC --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-e"></i>
                        <p>
                            LC
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('emi.sale.index')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>New LC</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('emi.index')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>LC List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('collect.index') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>LC collection</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-e"></i>
                        <p>
                            EMI
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('emi.sale.index')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>New EMI sale</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('emi.index')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>EMI sale list</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('collect.index') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>EMI collection</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-gear"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('settings.general')}}" class="nav-link">
                                <i class="fas fa-user-gear nav-icon"></i>
                                <p>General Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('settings.system')}}" class="nav-link">
                                <i class="fas fa-cogs nav-icon"></i>
                                
                                <p>System Settings</p>
                            </a>
                        </li>
                    </ul>
                </li>


                
                

                
                
                
            </ul>
        </nav>
    </div>
</aside>
 <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link {{ set_active('dashboard') }}" href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>
                           
                           @can('categories.index')
                            <li class="nav-item">
                                <a class="nav-link {{ set_active(['admin.category.index', 'admin.category.create', 'admin.category.edit']) }}" href="{{ route('admin.category.index') }}" ><i class="fas fa-fw fa-chart-pie"></i>Kategori</a>
                            </li>
                           @endcan

                           @can('products.index')
                           <li class="nav-item ">
                               <a class="nav-link {{ set_active(['admin.products.index', 'admin.products.create','admin.products.edit']) }}" href="{{ route('admin.products.index') }}" ><i class="fab fa-fw fa-wpforms"></i>Produk</a>
                           </li>  
                           @endcan
                           
                           @can('customers.index')
                           <li class="nav-item">
                               <a class="nav-link {{ set_active(['admin.customers.index', 'admin.customers.create', 'admin.customers.edit']) }}" href="{{ route('admin.customers.index') }}" ><i class="fas fa-fw fa-users"></i>Customer</a>
                           </li>
                               
                           @endcan
                           
                           @can('sales.index')
                           <li class="nav-item">
                               <a class="nav-link {{ set_active(['admin.sales.index', 'admin.sales.create', 'admin.sales.edit']) }}" href="{{ route('admin.sales.index') }}" ><i class="fas fa-fw fa-cart-plus"></i> Penjualan </a>
                           </li>  
                           @endcan

                            @can('suppliers.index')
                            <li class="nav-item">
                                <a class="nav-link {{ set_active(['admin.supplier.index', 'admin.supplier.create', 'admin.supplier.edit']) }}" href="{{ route('admin.supplier.index') }}" ><i class="fas fa-fw fa-inbox"></i>Supplier </a>
                            </li> 
                           @endcan

                            @can('productsIn.index')
                            <li class="nav-item">
                                <a class="nav-link {{ set_active(['admin.product_in.index','admin.product_in.create','admin.product_in.edit']) }}" href="{{ route('admin.product_in.index') }}" ><i class="fas fa-fw fa-truck-moving"></i>Produk Masuk</a>
                            </li>
                               
                           @endcan

                            @can('productsOut.index')
                            <li class="nav-item">
                                <a class="nav-link {{ set_active(['admin.product_out.index', 'admin.product_out.create', 'admin.product_out.edit']) }}" href="{{ route('admin.product_out.index') }}" ><i class="fas fa-fw fa-truck-moving" style="transform: rotateY(180deg);"></i>Produk Keluar</a>
                            </li>
                           @endcan
                            
                             <li class="nav-item">
                                 @if (auth()->user()->can('roles.index')||auth()->user()->can('permissions.index')||auth()->user()->can('users.index'))
                                 <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-cog "></i>Users Management</a>
                                 @endif
                                
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link {{ set_active(['admin.roles.index', 'admin.roles.create','admin.roles.edit']) }}" href="{{ route('admin.roles.index') }}">Roles</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ set_active('admin.permission.index') }}" href="{{ route('permission') }}">Permission</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ set_active(['admin.users.index', 'admin.users.create','admin.users.edit']) }}" href="{{ route('admin.users.index') }}">User</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
        </div>
 </div>

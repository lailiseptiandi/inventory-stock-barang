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
                                <a class="nav-link active" href="#"><i class="fas fa-fw fa-tachometer-alt"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>
                           
                           @can('categories.index')
                            <li class="nav-item">
                                <a class="nav-link" href="#" ><i class="fas fa-fw fa-chart-pie"></i>Kategori</a>
                            </li>
                           @endcan

                           @can('products.index')
                           <li class="nav-item ">
                               <a class="nav-link" href="#" ><i class="fab fa-fw fa-wpforms"></i>Produk</a>
                           </li>  
                           @endcan
                           
                           @can('customers.index')
                           <li class="nav-item">
                               <a class="nav-link" href="#" ><i class="fas fa-fw fa-users"></i>Customer</a>
                           </li>
                               
                           @endcan
                           
                           @can('sales.index')
                           <li class="nav-item">
                               <a class="nav-link" href="#" ><i class="fas fa-fw fa-cart-plus"></i> Penjualan </a>
                           </li>  
                           @endcan

                            @can('suppliers.index')
                            <li class="nav-item">
                                <a class="nav-link" href="#" ><i class="fas fa-fw fa-inbox"></i>Supplier </a>
                            </li> 
                           @endcan

                            @can('procuctsIn.index')
                            <li class="nav-item">
                                <a class="nav-link" href="#" ><i class="fas fa-fw fa-truck-moving"></i>Produk Masuk</a>
                            </li>
                               
                           @endcan

                            @can('productsOut.index')
                            <li class="nav-item">
                                <a class="nav-link" href="#" ><i class="fas fa-fw fa-truck-moving" style="transform: rotateY(180deg);"></i>Produk Keluar</a>
                            </li>
                           @endcan
                            
                             <li class="nav-item">
                                 @if (auth()->user()->can('roles.index')||auth()->user()->can('permissions.index')||auth()->user()->can('users.index'))
                                 <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-cog "></i>Users Management</a>
                                 @endif
                                
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/typography.html">Roles</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/accordions.html">Permission</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/tabs.html">User</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
        </div>
 </div>

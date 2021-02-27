@extends('layouts.admin')

@section('title')
    <title>Admin Dashboard</title>
@endsection

@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h3 class="mb-2">Dashboard Admin </h3>
                <p class="pageheader-text"></p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- pagehader  -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- metric -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">User</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1 text-primary">{{ App\Models\User::count() }} </h1>
                    </div>
                </div>
                <div id="sparkline-1"></div>
            </div>
        </div>
        <!-- /. metric -->
        <!-- metric -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Kategori</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1 text-primary">{{ App\Models\Category::count() }} </h1>
                    </div>
                </div>
                <div id="sparkline-2"></div>
            </div>
        </div>
        <!-- /. metric -->
        <!-- metric -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Produk</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1 text-primary">{{ App\Models\Product::count() }}</h1>
                    </div>
                </div>
                <div id="sparkline-3">
                </div>
            </div>
        </div>
        <!-- /. metric -->
        <!-- metric -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Customer</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1 text-primary">{{ App\Models\Customer::count() }}</h1>
                    </div>
                </div>
                <div id="sparkline-4"></div>
            </div>
        </div>
        <!-- /. metric -->
    </div>
    <div class="row">
        <!-- metric -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Sales</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1 text-primary">{{ App\Models\Sales::count() }}</h1>
                    </div>

                </div>
                <div id="sparkline-1"></div>
            </div>
        </div>
        <!-- /. metric -->
        <!-- metric -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Supplier</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1 text-primary">{{ App\Models\Supllier::count() }} </h1>
                    </div>
                </div>
                <div id="sparkline-2"></div>
            </div>
        </div>
        <!-- /. metric -->
        <!-- metric -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Produk Masuk</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1 text-primary">{{ App\Models\ProductIn::count() }}</h1>
                    </div>
                </div>
                <div id="sparkline-3">
                </div>
            </div>
        </div>
        <!-- /. metric -->
        <!-- metric -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Produk Keluar</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1 text-primary">{{ App\Models\ProductOut::count() }}</h1>
                    </div>
                </div>
                <div id="sparkline-4"></div>
            </div>
        </div>
        <!-- /. metric -->
    </div>
    <!-- ============================================================== -->

</div>
@endsection
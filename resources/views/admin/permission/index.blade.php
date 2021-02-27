@extends('layouts.admin')

@section('title')
    <title>Permission</title>
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
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Permission</a></li>
                            </ol>
                        </nav>
                    </div>
            </div>
        </div>
    </div>
   <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Data Sales</h5>
                    <div class="card-header">
                        <form action="{{ route('permission') }}" method="get">
                            <input class="form-control" type="text" name="q" placeholder="Search.." style="width: 200px; float:right">
                            <button type="submit" class="btn btn-primary btn-sm text-center" style="float: right;">CARI</button>
                        </form>
                    </div>
                        
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>PERMISSION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($permissions as $no => $permission)
                                <tr>
                                    <td>{{ ++$no +($permissions->currentPage()-1) * $permissions->perPage()  }}</td>
                                    <td>{{ $permission->name }}</td>
                                </tr>
                                @empty
                                    <td colspan="30" class="text-center">Tidak ada data</td> 
                                @endforelse
                            </tbody>
                        </table>
                        {{ $permissions->links('pagination::bootstrap-4') }}
                    </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('title')
    <title>Produk</title>
@endsection

@section('content')
 <div class="container-fluid  dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Dashboard Admin</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Product</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Data Produk</h5>
                            <div class="card-header">
                                <form action="{{ route('admin.products.index') }}" method="get">
                                    @can('products.create')
                                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm" style="width: 110px; float: left; border-radius:4px;">Tambah Data</a>
                                    @endcan
                                    <a href="#" class="btn btn-success btn-sm ml-2" style="width: 110px; float: left; border-radius:4px;">Export Excel</a>
                                    <a href="{{ route('pdf.generate') }}" class="btn btn-danger btn-sm ml-2" style="width: 110px; float: left; border-radius:4px;">Export PDF</a>
                                    <button type="submit" class="btn btn-primary btn-sm text-center" style="float: right;">CARI</button>
                                    <input class="form-control" type="text" name="q" placeholder="Search.." style="width: 200px; float:right">
                                </form>
                            </div>
                             
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Foto</th>
                                            <th>Qty</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td><img src="{{ Storage::url('products/'. $product->image) }}" width="100px"></td>
                                            <td>{{ $product->qty }}</td>
                                            <td>
                                                @can('products.edit')
                                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm mr-1"> <i class="fas fa-edit"></i> Edit</a>
                                                @endcan

                                                <a href="#" class="btn btn-info btn-sm rounded-lg mr-1"><i class="fas fa-eye"></i> Show</a>
                                                @can('products.delete')
                                                <button onclick="Delete(this.id)" class="btn btn-danger btn-sm rounded-lg" id="{{ $product->id }}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                                @endcan
                                            </td>
                                        </tr>
                                        @empty
                                            <td colspan="30" class="text-center">Tidak ada data</td> 
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                         </div>
                     </div>
               </div>
        </div>
 </div>

@endsection

@push('after-script')

<script>
    function Delete(id)
    {
        var id = id;
        var token = $("meta[name='csrf-token']").attr("content");


        swal({
            title: "Apakah Kamu Yakin ?",
            text: "Ingin Menghapus Data Ini!",
            icon : "warning",
            buttons: [
                'Tidak',
                'Ya',
            ],

            dangerMode: true,
        }).then(function(isConfirm){
            if(isConfirm){
                // ajax delete
                jQuery.ajax({
                    url: "{{ route('admin.products.index') }}/" +id,
                    data: {
                        "id": id,
                        "_token": token
                    },
                    type: "DELETE",
                    success: function(response)
                    {
                        if(response.status == "success"){
                            swal({
                                title: "BERHASIL",
                                text: "DATA BERHASIL DIHAPUS!",
                                icon: "success",
                                timer: 1000,
                                showConfirmButton: false,
                                showCancelButton: false,
                                buttons: false,
                            }).then(function(){
                                location.reload();
                            });
                        }else{
                            swal({
                                title: "GAGAL",
                                text: "DATA GAGAL DIHAPUS!",
                                icon: "error",
                                timer: 1000,
                                showConfirmButton: false,
                                showCancelButton: false,
                                buttons: false,
                            }).then(function(){
                                location.reload();
                            });
                        }
                    }
                });
            }else{
                swal({
                    title: "Tidak Jadi Dihapus",
                    icon: "warning"
                });
            }
        });
    }
</script>
    
@endpush
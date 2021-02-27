@extends('layouts.admin')

@section('title')
    <title>Customer</title>
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
                                        <li class="breadcrumb-item active" aria-current="page">Customer</li>
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
                            <h5 class="card-header">Data Customer</h5>
                            <div class="card-header">
                                <form action="{{ route('admin.customers.index') }}" method="get">
                                    @can('customers.create')
                                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-sm" style="width: 110px; float: left; border-radius:4px;">Tambah Data</a>
                                    @endcan
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
                                            <th>Email</th>
                                            <th>Telepon</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($customers as $customer)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->telepon }}</td>
                                            <td>{{ $customer->address }}</td>
                                            <td>
                                                @can('customers.edit')
                                                    <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn btn-primary btn-sm mr-1"> <i class="fas fa-edit"></i> Edit</a>
                                                @endcan

                                                <a href="#" class="btn btn-info btn-sm rounded-lg mr-1"><i class="fas fa-eye"></i> Show</a>
                                                @can('customers.delete')
                                                <button onclick="Delete(this.id)" class="btn btn-danger btn-sm rounded-lg" id="{{ $customer->id }}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
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

 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="{{ route('admin.customers.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nama Customer</label>
            <input type="text" name="name" class="form-control">
        </div>
         <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
         <div class="form-group">
            <label for="">No. Hp</label>
            <input type="text" name="telepon" class="form-control">
        </div>
         <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="address" id="" cols="30" rows="4" class="form-control"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
    </form>
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
                    url: "{{ route('admin.customers.index') }}/" +id,
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
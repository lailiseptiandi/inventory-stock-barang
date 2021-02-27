@extends('layouts.admin')

@section('title')
    <title>User</title>
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
                                        <li class="breadcrumb-item active" aria-current="page">User</li>
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
                            <h5 class="card-header">Data User</h5>
                            <div class="card-header">
                                <form action="{{ route('admin.users.index') }}" method="get">
                                    @can('users.create')
                                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm" style="width: 110px; float: left; border-radius:4px;">Tambah Data</a>
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
                                            <th scope="col" style="width: 6%;">No</th>
                                            <th scope="col" style="width: 15%;">Nama User</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Role</th>
                                            <th scope="col" style="width: 15%; text-align:center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $no => $user)
                                        <tr>
                                            <td>{{ ++$no +($users->currentPage()-1) * $users->perPage() }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @foreach ($user->getRoleNames() as $role)
                                                    <button class="btn btn-success btn-sm btn-rounded">{{ $role }}</button>
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                @can('users.edit')
                                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm mr-1 mb-2"> <i class="fas fa-edit"></i> Edit</a>
                                                @endcan

                                                @can('users.delete')
                                                <button onclick="Delete(this.id)" class="btn btn-danger btn-sm rounded-lg" id="{{ $user->id }}"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                                @endcan
                                            </td>
                                        </tr>
                                        @empty
                                            <td colspan="30" class="text-center">Tidak ada data</td> 
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $users->links("vendor.pagination.bootstrap-4") }}
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
                    url: "{{ route('admin.users.index') }}/" +id,
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
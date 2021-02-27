@extends('layouts.admin')

@section('title')
    <title>Tambah User</title>
@endsection

@section('content')
    <div class="container-fluid dashboard-content">
         <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="basicform">
                            <h3 class="section-title">User</h3>
                        </div>
                        <div class="card">
                            <h5 class="card-header">Tambah User</h5>
                            <div class="card-body">
                                <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Nama</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" >
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                     <div class="form-group">
                                        <label for="" class="col-form-label">Email</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="" class="col-form-label">Password</label>
                                                <input type="password" name="password" class="form-control @error('email') is-invalid @enderror">
                                                @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="" class="col-form-label">Konfirmasi Password</label>
                                                <input type="password" name="password_confirmation" class="form-control @error('email') is-invalid @enderror">
                                                @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="font-weight-bold">Role</label>
                                    @foreach ($roles as $role)
                                             <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="roles[]" value="{{ old('name', $role->name) }}" id="check-{{ $role->id }}">
                                            <label class="form-check-label" for="check-{{ $role->id }}">
                                                {{ $role->name }}
                                        </label>
                                    </div>
                                        @endforeach
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-paper-plane"></i> KIRIM</button>
                                    <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo"></i> Reset</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
    </div>
@endsection
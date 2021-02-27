@extends('layouts.admin')

@section('title')
    <title>Edit Role</title>
@endsection

@section('content')
    <div class="container-fluid dashboard-content">
         <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="basicform">
                            <h3 class="section-title">Role</h3>
                        </div>
                        <div class="card">
                            <h5 class="card-header">Edit Role</h5>
                            <div class="card-body">
                                <form action="{{ route('admin.roles.update', $role->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Nama Role</label>
                                        <input type="text" name="name" value="{{ old('name', $role->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Nama Role">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                    <label class="font-weight-bold">Permission</label>
                                    @foreach ($permissions as $permission)
                                             <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ old('name', $permission->name) }}" id="check-{{ $permission->id }}"  @if ($role->permissions->contains($permission))
                                                checked
                                            @endif>
                                            <label class="form-check-label" for="check-{{ $permission->id }}">
                                                {{ $permission->name }}
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
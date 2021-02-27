@extends('layouts.admin')

@section('title')
    <title>Edit Kategori</title>
@endsection

@section('content')
    <div class="container-fluid dashboard-content">
         <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="basicform">
                            <h3 class="section-title">Kategori</h3>
                        </div>
                        <div class="card">
                            <h5 class="card-header">Edit Kategori</h5>
                            <div class="card-body">
                                <form action="{{ route('admin.category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Nama Kategori</label>
                                        <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
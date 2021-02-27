@extends('layouts.admin')

@section('title')
    <title>Edit Produk</title>
@endsection

@section('content')
    <div class="container-fluid dashboard-content">
         <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="basicform">
                            <h3 class="section-title">Produk</h3>
                        </div>
                        <div class="card">
                            <h5 class="card-header">Edit Produk</h5>
                            <div class="card-body">
                                <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Nama Produk</label>
                                        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kategori</label>
                                        <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Harga</label>
                                        <input name="price" type="number" value="{{ old('price', $product->price) }}" class="form-control @error('price') is-invalid @enderror">
                                        @error('price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Foto</label>
                                        <input name="image" type="file" class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Qty</label>
                                        <input name="qty" type="number" value="{{ old('qty', $product->qty) }}" class="form-control @error('qty') is-invalid @enderror">
                                        @error('qty')
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
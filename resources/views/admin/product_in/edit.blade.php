@extends('layouts.admin')

@section('title')
    <title>Edit Data</title>
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
                                <form action="{{ route('admin.product_in.update', $productIn->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="">Produk</label>
                                        <select name="product_id" class="form-control">
                                        @foreach ($produk as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                     <div class="form-group">
                                        <label for="">Supplier</label>
                                        <select name="supplier_id" class="form-control">
                                        @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Qty</label>
                                        <input name="qty" type="number" class="form-control @error('qty') is-invalid @enderror">
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
<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductOut;
use Illuminate\Http\Request;

class ProductOutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:productsOut.index||productsOut.edit||productsOut.create||productsOut.delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductOut::latest()->when(request()->q, function ($products) {
            $products = $products->where('name', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('admin.product_out.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productsIn = Product::latest()->get();
        $customers = Customer::latest()->get();

        return view('admin.product_out.create', compact('productsIn', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'customer_id' => 'required',
            'qty' => 'required',
        ]);

        $produk = new ProductOut();
        $produk->product_id = $request->product_id;
        $produk->customer_id = $request->customer_id;
        $produk->qty = $request->qty;
        $produk->save();

        if ($produk) {
            # code...
            return redirect()->route('admin.product_out.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('admin.product_out.index')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductOut $productOut)
    {
        $produk = Product::latest()->get();
        $customers = Customer::latest()->get();
        return view('admin.product_out.edit', compact('productOut', 'produk', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'customer_id' => 'required',
            'qty' => 'required',
        ]);
        $produk = ProductOut::findOrFail($id);
        $produk->product_id = $request->product_id;
        $produk->customer_id = $request->customer_id;
        $produk->qty = $request->qty;
        $produk->save();

        if ($produk) {
            # code...
            return redirect()->route('admin.product_out.index')->with(['success' => 'Data Berhasil DiUpdate']);
        } else {
            return redirect()->route('admin.product_out.index')->with(['error' => 'Data Gagal Diupdate']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productIn = ProductOut::findOrFail($id);
        $productIn->delete();

        if ($productIn) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}

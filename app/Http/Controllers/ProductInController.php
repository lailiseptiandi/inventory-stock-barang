<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supllier;
use App\Models\ProductIn;
use Illuminate\Http\Request;

class ProductInController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:productsIn.index||productsIn.edit||productsIn.create||productsIn.delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productIn = ProductIn::latest()->when(request()->q, function ($productIn) {
            $productIn = $productIn->where('name', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('admin.product_in.index', compact('productIn'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productsIn = Product::latest()->get();
        $suppliers = Supllier::latest()->get();

        return view('admin.product_in.create', compact('productsIn', 'suppliers'));
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
            'supplier_id' => 'required',
            'qty' => 'required',
        ]);

        $produk = new ProductIn();
        $produk->product_id = $request->product_id;
        $produk->supplier_id = $request->supplier_id;
        $produk->qty = $request->qty;
        $produk->save();

        if ($produk) {
            # code...
            return redirect()->route('admin.product_in.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('admin.product_in.index')->with(['error' => 'Data Gagal Disimpan']);
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
    public function edit(ProductIn $productIn)
    {
        // $produk = ProductIn::findOrFail($id);
        $produk = Product::latest()->get();
        $suppliers = Supllier::latest()->get();
        return view('admin.product_in.edit', compact('productIn','produk', 'suppliers'));
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
            'supplier_id' => 'required',
            'qty' => 'required',
        ]);
        $produk = ProductIn::findOrFail($id);
        $produk->product_id = $request->product_id;
        $produk->supplier_id = $request->supplier_id;
        $produk->qty = $request->qty;
        $produk->save();

        if ($produk) {
            # code...
            return redirect()->route('admin.product_in.index')->with(['success' => 'Data Berhasil DiUpdate']);
        } else {
            return redirect()->route('admin.product_in.index')->with(['error' => 'Data Gagal Diupdate']);
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
        $productIn = ProductIn::findOrFail($id);
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

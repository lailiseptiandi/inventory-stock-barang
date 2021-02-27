<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:products.index|products.create|products.edit|products.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = Product::latest()->when(request()->q, function ($products) {
            $products = $products->where('name', 'like', '%' . request()->q . '%');
        })->paginate(10);


        return view('admin.product.index', compact('products'));
    }

    public function createPdfProduct()
    {
        // $products = Product::all();


        // // tampilkan data
        // view()->share('admin.product.index', $products);

        $pdf = PDF::loadView('admin.product.index')->setPaper('A4', 'potrait');


        // download pdf
        return $pdf->stream();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.product.create', compact('categories'));
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
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'required|image',
            'price' => 'required',
            'qty' => 'required'
        ]);
        // upload image
        $image = $request->file('image');
        $image->storeAs('public/products/', $image->hashName());

        // create data
        $products = Product::create([
            'image' => $image->hashName(),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'qty' => $request->input('qty'),
        ]);

        if ($products) {
            return redirect()->route('admin.products.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('admin.products.index')->with(['error' => 'Data Gagal Disimpan!']);
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
    public function edit(Product $product)
    {
        // $product = Product::findOrFail($id);
        $categories = Category::latest()->get();

        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            // 'image' => 'image',
            'price' => 'required',
            'qty' => 'required',
        ]);
        // upload image
        if (empty($request->file('image'))) {
            $product = Product::findOrFail($product->id);
            $product->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'category_id' => $request->input('category_id'),
                'qty' => $request->input('qty'),
            ]);
        } else {
            // remove
            Storage::disk('local')->delete('public/products/' . $product->image);

            // upload new image
            $image = $request->file('image');
            $image->storeAs('public/products/', $image->hashName());

            // create data
            $product = Product::findOrFail($product->id);
            $product->update([
                'image' => $image->hashName(),
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'category_id' => $request->input('category_id'),
                'qty' => $request->input('qty'),
            ]);
        }

        if ($product) {
            return redirect()->route('admin.products.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            return redirect()->route('admin.products.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $product = Product::findOrFail($id);

        Storage::disk('local')->delete('public/products/' . $product->image);
        $product->delete();

        if ($product) {
            return response()->json([
                'status' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supllier;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:suppliers.index|suppliers.create|suppliers.edit|suppliers.delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supllier = Supllier::latest()->when(request()->q, function ($supllier) {
            $supllier = $supllier->where('name', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('admin.supllier.index', compact('supllier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'email' => 'email',
            'address' => 'required',
            'telepon' => 'required'
        ]);

        $supllier = Supllier::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'telepon' => $request->input('telepon')
        ]);

        if ($supllier) {
            return redirect()->route('admin.supplier.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('admin.supplier.index')->with(['error' => 'Data Gagal Disimpan']);
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
    public function edit($id)
    {
        $supllier = Supllier::findOrFail($id);
        return view('admin.supllier.edit', compact('supllier'));
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
            'name' => 'required',
            'email' => 'email',
            'address' => 'required',
            'telepon' => 'required'
        ]);
        $supllier = Supllier::findOrFail($id);
        $supllier->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'telepon' => $request->input('telepon')
        ]);

        if ($supllier) {
            return redirect()->route('admin.supplier.index')->with(['success' => 'Data Berhasil Diupdate']);
        } else {
            return redirect()->route('admin.supplier.index')->with(['error' => 'Data Gagal Diupdate']);
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
        $supllier = Supllier::findOrFail($id);
        $supllier->delete();

        if ($supllier) {
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

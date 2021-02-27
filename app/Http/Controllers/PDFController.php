<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductIn;
use App\Models\ProductOut;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PDFController extends Controller
{
    // function to display preview
    public function preview()
    {
        $data = Product::all();
        return view('preview', compact('data'));
        // $data = Product::all();

        // $pdf = PDF::loadView('preview');
        // return $pdf->download('preview.pdf');
    }

    public function generatePDF()
    {
        $data = Product::all();
        $pdf = PDF::loadView('preview', compact('data'));
        return $pdf->stream('product.pdf');
    }

    public function generatePDFProduct()
    {
        $data = ProductIn::all();
        $pdf = PDF::loadView('admin.product_in.generate', compact('data'));
        return $pdf->stream('product-masuk.pdf');
    }

    public function generatePDFProductKeluar()
    {

        $data = ProductOut::all();
        $pdf = PDF::loadView('admin.product_out.generate', compact('data'));
        return $pdf->stream('product-keluar.pdf');
    }
}

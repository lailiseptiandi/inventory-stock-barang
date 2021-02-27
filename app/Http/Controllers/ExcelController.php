<?php

namespace App\Http\Controllers;

use App\Exports\ProdukExport;
use App\Models\ProductIn;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class ExcelController extends Controller
{
   
    public function exportProdukMasuk()
    {

        return Excel::download(new ProdukExport, 'produk-masuk.xlsx');
    }

    public function exportProdukKeluar()
    {

        return Excel::download(new ProdukExport, 'produk-keluar.xlsx');
    }

}

<?php

namespace App\Exports;

use App\Models\ProductIn;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProdukExport implements FromView
{
    /**
     * @return \Illuminate\Support\View
     */
    public function view(): View
    {
        return view('admin.product_in.excel-generate', [
            'data' => ProductIn::all()
        ]);
    }

    
}

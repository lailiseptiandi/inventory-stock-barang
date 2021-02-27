<?php

namespace App\Exports;

use App\Models\ProductOut;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProdukKeluarExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('admin.product_out.excel-generate', [
            'data' => ProductOut::all()
        ]);
    }
}

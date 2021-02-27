<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIn extends Model
{
    use HasFactory;

    protected $table = 'product_ins';

    protected $primarykey = 'id';
    // protected $fillable = ['product_id', 'supplier_id', 'qty'];

    // protected $guarded = [];

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

    public function Supplier()
    {
        return $this->belongsTo(Supllier::class);
    }
}

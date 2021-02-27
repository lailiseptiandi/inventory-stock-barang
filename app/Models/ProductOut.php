<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOut extends Model
{
    use HasFactory;

    protected $table = 'product_out';

    protected $primaryKey = 'id';

    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Supllier extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function productIn()
    {
        return $this->belongsTo(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\ProductIn;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $table = 'products';

    public function category()
    {
        $this->hasMany(Category::class);
    }

    public function productIn()
    {
        return $this->hasMany(ProductIn::class);
    }
}

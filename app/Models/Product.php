<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const PRODUCT_TYPE = ['Car', 'MiniHouse'];

    public function productMetas()
    {
        return $this->hasMany(ProductMeta::class);
    }
}

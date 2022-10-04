<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReserved extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function reserved_metas()
    {
        return $this->hasMany(ReservedProductMeta::class, 'reservation_product_id');
    }
}

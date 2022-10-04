<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    const STATUS = ['PENDING', 'PROCESSING', 'COMPLETED'];
    protected $guarded = [];

    /**
     * Get the parent reservable model (car or mini-house).
     */
    public function reservedProducts()
    {
        return $this->hasMany(ProductReserved::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Car extends Product
{
    use HasFactory;

    const REQUIRED_FIELDS = ['type', 'model', 'year', 'color', 'number_of_passengers'];

    /**
     * Get all of the post's comments.
     */
    public function reservations()
    {
        return $this->morphMany(Reservation::class, 'reservable');
    }
}

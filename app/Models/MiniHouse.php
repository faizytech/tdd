<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Product;

class MiniHouse extends Product
{
    use HasFactory;

    const REQUIRED_FIELDS = ['area', 'number_of_rooms', 'number_of_bath_rooms', 'has_internet', 'has_parking'];
    /**
     *
     */
    public function reservations()
    {
        return $this->morphMany(Reservation::class, 'reservable');
    }

}

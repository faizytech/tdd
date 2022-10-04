<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Product;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    //
    public function index(ReservationRequest $request)
    {

        //Reservation
        $reservation = Reservation::create([
            'user_id' => $request->user_id,
            'package_id' => $request->package_id,
            'duration' => $request->duration,
            'package_name' => $request->package_name
        ]);

        foreach($request->products as $product){
            $productData = Product::find($product);
            $reservedProducts = $reservation->reservedProducts()->create([
                'product_id' => $product,
                'reservation_id' => $reservation->id,
                'product_type' => $productData->product_type
            ]);

            foreach($productData->productMetas as $productMeta){
                $reservedProducts->reserved_metas()->create([
                    'meta_key' => $productMeta->meta_key,
                    'meta_value' => $productMeta->meta_value,
                    'reservation_product_id' => $reservedProducts->id,
                ]);
            }
        }

        response()->json([
            'message' => 'booking successfully completed'
        ], 200);
    }
}

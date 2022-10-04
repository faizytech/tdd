<?php

namespace Tests\Feature\Http\Controllers\API;

use App\Models\Package;
use App\Models\Product;
use App\Models\ProductMeta;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReservationControllerTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function can_book_a_reservation()
    {
        //Given
        $user = User::factory()->create();
        $products = Product::factory()->count(2)->create();
        $package = Package::inRandomOrder()->limit(1)->first();
        $products->each(function ($product){
            $productMetaOb = 'App\Models\\'.$product->product_type;
            $productMetaObj = new $productMetaOb();
            collect($productMetaObj::REQUIRED_FIELDS)->each(function($requireField) use ($product){
                ProductMeta::factory()->create([
                    'meta_key' => $requireField,
                    'product_id' => $product
                ]);
            });
        });

        //When
        $response = $this->post('/api/reservation', [
            'products' => $products->pluck('id')->toArray(),
            'user_id' => $user->id,
            'package_id' => $package->id,
            'duration' => $package->no_of_days,
            'package_name' => $package->name
        ]);

        //Then
        $response->assertStatus(200);
    }
}

<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexWillReturnProducts()
    {
        $product1 = Product::factory()->create();
        Product::factory()->count(10)->create();

        $this->json('GET', 'api/v1/products')
            ->assertOk()
            ->assertJsonFragment([
                'name' => $product1->name,
                'uuid' => $product1->uuid,
            ])
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'uuid',
                        'name'
                    ]
                ]
            ]);
    }
}
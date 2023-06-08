<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;
    public function setUp(): void
    {
        parent::setUp();

        $this->seed(ProductSeeder::class);
        $this->admin = User::factory()->create();
    }

    public function test_index(): void
    {
        $response = $this->actingAs($this->admin)->get(route('products.index'));

        $response->assertStatus(200)
                 ->assertViewIs('products.index');
    }

    public function test_create(): void
    {
        $response = $this->actingAs($this->admin)->get(route('products.create'));

        $response->assertStatus(200)
                 ->assertViewIs('products.create');
    }

    public function test_store(): void
    {
        $response = $this->actingAs($this->admin)->post(route('products.store'), [
            'name' => 'Gatorade Sweat Aide',
        ]);

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseHas('products', [
            'name' => 'Gatorade Sweat Aide'
        ]);
    }

    public function test_edit(): void
    {
        $product = Product::factory()->create();
        $response = $this->actingAs($this->admin)->get(
            route('products.edit', [
                'product' => $product
            ])
        );

        $response->assertOk()
                 ->assertViewIs('products.edit');
    }

    public function test_update(): void
    {
        $newName = 'Mirinda Zero';
        $product = Product::factory()->create();

        $response = $this->actingAs($this->admin)->put(
            // url
            route('products.update', [
                'product' => $product
            ]),
            // form data to submit
            [
                'name' => $newName
            ]
        );
        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseHas('products', [
            'name' => $newName
        ]);
    }

    public function test_confirm_delete(): void
    {
        $product = Product::factory()->create();
        $response = $this->actingAs($this->admin)->get(route('products.confirm-delete', [
            'product' => $product
        ]));

        $response->assertOk()
                 ->assertViewIs('products.confirm-delete');
    }

    public function test_destroy(): void
    {
        $product = Product::factory()->create();

        $response = $this->actingAs($this->admin)->delete(route('products.destroy', [
            'product' => $product
        ]));

        $response->assertRedirect(route('products.index'));
        $this->assertDatabaseMissing('products', [
            'id' => $product->id
        ]);
    }
}

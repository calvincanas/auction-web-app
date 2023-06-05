<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;
    public function setUp(): void
    {
        parent::setUp();

        $this->seed(UserSeeder::class);
        $this->admin = User::where('email', 'admin@kahera.test')->first();
    }

    public function test_index(): void
    {
        $response = $this->actingAs($this->admin)->get(route('users.index'));

        $response->assertStatus(200)
            ->assertViewIs('users.index');
    }

    public function test_create(): void
    {
        $response = $this->actingAs($this->admin)->get(route('users.create'));

        $response->assertStatus(200)
                 ->assertViewIs('users.create');
    }

    public function test_store(): void
    {
        $response = $this->actingAs($this->admin)->post(route('users.store'), [
            'name' => 'John Smith',
            'email' => 'johnsmith@gmail.com',
            'password' => 'password'
        ]);

        $response->assertRedirect(route('users.index'));
    }

    public function test_edit(): void
    {
        $targetUser = User::factory()->create();
        $response = $this->actingAs($this->admin)->get(
            route('users.edit', [
                'user' => $targetUser
            ])
        );

        $response->assertOk()
            ->assertViewIs('users.edit');
    }

    public function test_update(): void
    {
        $newName = 'Robert Tables';
        $targetUser = User::factory()->create();

        $response = $this->actingAs($this->admin)->put(
            // url
            route('users.update', [
                'user' => $targetUser
            ]),
            // form data to submit
            [
                'name' => $newName
            ]
        );
        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', [
            'name' => $newName
        ]);
    }

    public function test_confirm_delete(): void
    {
        $targetUser = User::factory()->create();
        $response = $this->actingAs($this->admin)->get(route('users.confirm-delete', [
            'user' => $targetUser
        ]));

        $response->assertOk()
                 ->assertViewIs('users.confirm-delete');
    }

    public function test_destroy(): void
    {
        $targetUser = User::factory()->create();

        $response = $this->actingAs($this->admin)->delete(route('users.destroy', [
            'user' => $targetUser
        ]));

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseMissing('users', [
            'id' => $targetUser->id
        ]);
    }
}

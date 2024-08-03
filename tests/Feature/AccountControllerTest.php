<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Layer;
use App\Models\Account;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $layer = Layer::factory()->create(['user_id' => $user->id]);
        $response = $this->get(route('accounts.index', ['layer' => $layer->public_id]));

        $response->assertStatus(200);
        $response->assertViewIs('accounts');
        $response->assertViewHas('accounts');
    }

    public function testCreate()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $layer = Layer::factory()->create(['user_id' => $user->id]);
        $response = $this->get(route('accounts.create', ['layer' => $layer->public_id]));

        $response->assertStatus(200);
        $response->assertViewIs('account_create');
    }

    public function testStore()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $layer = Layer::factory()->create(['user_id' => $user->id]);
        $response = $this->post(route('accounts.store'), [
            'name' => 'Test Account',
            'notes' => 'Some notes',
            'layer_id' => $layer->public_id,
            'username' => 'testuser',
            'password' => 'password',
            'url' => 'https://example.com',
            'email' => 'test@example.com',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('status', 'Account created successfully');
    }
}

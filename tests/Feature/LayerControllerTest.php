<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Layer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LayerControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $layer = Layer::factory()->create(['user_id' => $user->id]);

        $response = $this->get(route('layers.index'));

        $response->assertStatus(200);
        $response->assertViewHas('layers', function ($layers) use ($layer) {
            return $layers->contains($layer);
        });
    }

    public function testCreate()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('layers.create'));

        $response->assertStatus(200);
        $response->assertViewIs('layer_create');
    }

    public function testStore()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('layers.store'), [
            'name' => 'Test Layer',
            'description' => 'Test Description',
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('layers', [
            'name' => 'Test Layer',
            'user_id' => $user->id,
        ]);
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Layer>
 */
class LayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $uuid = $this->faker->uuid();
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'is_protected' => $this->faker->boolean,
            'user_id' => User::factory(),
            'public_id' => $uuid,
            'password' => bcrypt('password'),
        ];
    }
}

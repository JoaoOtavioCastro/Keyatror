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
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'public_id' => $uuid,
            'user_id' => User::all()->random()->id,
            'password' =>  bcrypt($this->faker->password()),
        ];
    }
}

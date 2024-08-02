<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Layer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
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
            'layer_id' => Layer::all()->random()->id,
            'public_id' => $uuid,
            'password' => bcrypt( $this->faker->password()),
            'name' => $this->faker->name(),
            'url' => $this->faker->url(),
            'username' => $this->faker->userName(),
            'email' => $this->faker->email(),
            'notes' => $this->faker->text(),
        ];
    }
}

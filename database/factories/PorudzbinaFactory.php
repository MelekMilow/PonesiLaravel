<?php

namespace Database\Factories;

use App\Models\Hrana;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PorudzbinaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'hrana_id' => Hrana::factory(),
            'user_id' => User::factory(),
            'datum' => $this->faker->date(),
            'dostava_cena' => $this->faker->randomFloat()
        ];
    }
}

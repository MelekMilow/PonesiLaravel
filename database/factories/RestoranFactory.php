<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RestoranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'naziv' => "Restoran ".random_int(1,100),
            'adresa' => $this->faker->address(),
            'brojTelefona' => $this->faker->phoneNumber(),
            'radnoVreme' =>$this->faker->randomElement(['8:00-20:00','8:00-18:00','8:00-22:00']) ,
        ];
    }
}

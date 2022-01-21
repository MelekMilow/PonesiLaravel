<?php

namespace Database\Factories;

use App\Models\Restoran;
use Illuminate\Database\Eloquent\Factories\Factory;

class HranaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'naziv' => "Hrana ".random_int(1,100),
            'opis' => $this->faker->sentence(),
            'cena' => $this->faker->randomFloat(2,10,1000),
            'restoran' =>Restoran::factory()
        ];
    }
}

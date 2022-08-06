<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombres' => $this->faker->firstname(),
            'apellidos' => $this->faker->lastname(),
            'dni' =>  $this->faker->unique()->numerify("########"),
            'edad' => $this->faker->numberBetween(5, 80),
        ];
    }
}

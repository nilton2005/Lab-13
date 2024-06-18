<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'titulo' => $this->faker->sentence,
            'autor'  => $this->faker->name,
            'año'    => $this->faker->year,
            'editorial' =>$this->faker->sentence,
            'gender' => $this->faker->randomElement([
            'Novela de ficción',
            'No ficción',
            'Ciencia ficción',
            'Fantasía',
            'Misterio y suspenso',
            'Romance',
            'Aventura',
            'Historia',
            'Biografía',
            'Autoayuda'
            ])
        ];
    }
}

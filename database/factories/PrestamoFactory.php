<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PrestamoFactory extends Factory
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
            'book_id' => \App\Models\Book::factory(),
            'user_id' => \App\Models\User::factory(),
            'fecha_prestamo'=> $this->faker->date,
            'fecha_devuelto' => $this->faker->date,
            'estado' => $this->faker->boolean,
        ];
    }
}

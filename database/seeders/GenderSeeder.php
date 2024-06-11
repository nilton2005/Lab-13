<?php

namespace Database\Seeders;

use App\Models\Book;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        //
        $faker = Faker::create();

        $books = Book::all();
        foreach($books as $book){
            $book->gender = $faker->randomElement(['Novela de ficción',
            'No ficción',
            'Ciencia ficción',
            'Fantasía',
            'Misterio y suspenso',
            'Romance',
            'Aventura',
            'Historia',
            'Biografía',
            'Autoayuda']);
            $book->save();
        }
    }
}

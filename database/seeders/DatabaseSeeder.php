<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        \App\Models\Book::factory(40)->create();
        \App\Models\User::factory(20)->create();
        \App\Models\Prestamo::factory(10)->create();
    }
}

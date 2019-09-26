<?php

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
        //$this->call(UsersTableSeeder::class);
        $this->call(MastersTableSeeder::class);
        $this->call(PokemonsTableSeeder::class);
        $this->call(Master_PokemonTableSeeder::class);
    }
}

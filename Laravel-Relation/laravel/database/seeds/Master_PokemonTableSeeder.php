<?php

use Illuminate\Database\Seeder;

class Master_PokemonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_pokemon')->insert([
            'master_id' => 1,
            'pokemon_id' => 1,
        ]);
        DB::table('master_pokemon')->insert([
            'master_id' => 2,
            'pokemon_id' => 2,
        ]);
        DB::table('master_pokemon')->insert([
            'master_id' => 3,
            'pokemon_id' => 3,
        ]);
        DB::table('master_pokemon')->insert([
            'master_id' => 4,
            'pokemon_id' => 4,
        ]);
        DB::table('master_pokemon')->insert([
            'master_id' => 4,
            'pokemon_id' => 1,
        ]);
    }
}

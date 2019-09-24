<?php

use Illuminate\Database\Seeder;

class PokemonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pokemon = new \App\Models\Pokemon([
            'name' => 'ピカチュウ'
        ]);
        $pokemon->save();
 
        $pokemon = new \App\Models\Pokemon([
            'name' => 'イワーク'
        ]);
        $pokemon->save();
 
        $pokemon = new \App\Models\Pokemon([
            'name' => 'スターミー'
        ]);
        $pokemon->save();
 
        $pokemon = new \App\Models\Pokemon([
            'name' => 'ニャース'
        ]);
        $pokemon->save();
    }
}

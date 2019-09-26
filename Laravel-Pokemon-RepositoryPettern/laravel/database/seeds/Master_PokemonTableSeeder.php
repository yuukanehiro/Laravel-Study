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
            'comment' => "キミに決めた！",
        ]);
        DB::table('master_pokemon')->insert([
            'master_id' => 2,
            'pokemon_id' => 2,
            'comment' => "イワーク、ご苦労だった。"
        ]);
        DB::table('master_pokemon')->insert([
            'master_id' => 3,
            'pokemon_id' => 3,
            'comment' => "いけー！マイ ステディ！"
        ]);
        DB::table('master_pokemon')->insert([
            'master_id' => 4,
            'pokemon_id' => 4,
            'comment' => "ニャースでニャース! (せりふ) うるさい!"
        ]);
        DB::table('master_pokemon')->insert([
            'master_id' => 4,
            'pokemon_id' => 1,
            'comment' => "ピカチュウ！捕まえた〜！",
        ]);
    }
}

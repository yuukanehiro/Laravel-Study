<?php

use Illuminate\Database\Seeder;

class MastersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $master = new \App\Models\Master([
            'name' => 'さとし',
            'cnt_battle' => 10,
            'cnt_won' => 4,
        ]);
        $master->save();

        $master = new \App\Models\Master([
            'name' => 'たけし',
            'cnt_battle' => 100,
            'cnt_won' => 20,
        ]);
        $master->save();

        $master = new \App\Models\Master([
            'name' => 'かすみ'
        ]);
        $master->save();

        $master = new \App\Models\Master([
            'name' => 'こじろう'
        ]);
        $master->save();
    }
}

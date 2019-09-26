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
            'name' => 'さとし'
        ]);
        $master->save();
 
        $master = new \App\Models\Master([
            'name' => 'たけし'
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

<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->insert([
            'name' => 'yamada',
            'mail' => 'yamada@example.net',
            'age' => 12,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('people')->insert([
            'name' => 'satou',
            'mail' => 'satou@example.net',
            'age' => 6,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('people')->insert([
            'name' => 'amano',
            'mail' => 'amano@example.net',
            'age' => 89,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}

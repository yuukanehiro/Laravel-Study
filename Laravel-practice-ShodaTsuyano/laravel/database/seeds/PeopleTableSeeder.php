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
            'id'   => 1,
            'name' => 'yamada',
            'mail' => 'yamada@example.net',
            'age' => 12,
            'created_at' => "2019-09-15 06:24:40",
            'updated_at' => "2019-09-15 06:24:40",
        ]);
        DB::table('people')->insert([
            'id'   => 2,
            'name' => 'satou',
            'mail' => 'satou@example.net',
            'age' => 6,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('people')->insert([
            'id'   => 3,
            'name' => 'amano',
            'mail' => 'amano@example.net',
            'age' => 89,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('people')->insert([
            'id'   => 4,
            'name' => 'erika',
            'mail' => 'erika@example.net',
            'age' => 33,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('people')->insert([
            'id'   => 5,
            'name' => 'don',
            'mail' => 'don@example.net',
            'age' => 6,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('people')->insert([
            'id'   => 6,
            'name' => 'miyu',
            'mail' => 'miyu@example.net',
            'age' => 6,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}

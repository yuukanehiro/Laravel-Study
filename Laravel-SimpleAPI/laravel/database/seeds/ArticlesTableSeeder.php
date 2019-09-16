<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'title' => 'Laravel入門',
            'body'  => 'わかりやすい',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('articles')->insert([
            'title' => 'Laravel実践開発',
            'body'  => '実践的な内容',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('articles')->insert([
            'title' => 'SQLの苦手を克服する本',
            'body'  => '1章がとても良い。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}


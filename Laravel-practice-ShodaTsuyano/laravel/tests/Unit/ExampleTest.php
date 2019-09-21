<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Person;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->get('/')->assertStatus(200);
        $this->get('/hello')->assertOk();
        //$this->post('/hello')->assertOk();
        $this->get('/hello/1')->assertOk();
        $this->get('/hoge')->assertStatus(404);
        $this->get('/hello')->assertSeeText('Index');
        $this->get('/hello')->assertSee('<h1>');
        $this->get('/hello')->assertSeeInOrder(['<html','<head','<body','<h1>']);
        $this->get('/hello/json/1')->assertSeeText('YAMADA');
        $this->get('/hello/json/1')->assertExactJson(
            ["id"=>1,"name"=>"YAMADA","mail"=>"yamada@example.net","age"=>12,
            "created_at"=>"2019-09-15 06:24:40","updated_at"=>"2019-09-15 06:24:40"]
        );
    }

    public function testPersonModel()
    {
        $data = [
            'id'   => 1,
            'name' => 'yamada',
            'mail' => 'yamada@example.net',
            'age'  => '12',
            "created_at"=>"2019-09-15 06:24:40",
            "updated_at"=>"2019-09-15 06:24:40"
        ];
        $this->assertDatabaseHas('people', $data);

        $dummy_data = [
            'name' => 'DUMMY',
            'mail' => 'dummy@example.net',
            'age'  => 0
        ];
        $person = new Person();
        $person->fill($dummy_data)->save();
        $this->assertDatabaseHas('people', $dummy_data);

        $person->name = 'NOT-DUMMY';
        $person->save();
        $this->assertDatabaseMissing('people', $dummy_data); // 存在しないことをチェック
        $dummy_data['name'] = 'NOT-DUMMY';
        $this->assertDatabaseHas('people', $dummy_data);

        $person->delete();
        $this->assertDatabaseMissing('people', $dummy_data);
    }

    public function testPersonFactory()
    {
        for($i = 0;$i < 100;$i++)
        {
            factory(Person::class)->create();
        }
        $count = Person::get()->count();
        $person = Person::find(rand(1, $count));
        $data = $person->toArray();
        print_r($data);

        $this->assertDatabaseHas('people', $data);
        $person->delete();
        $this->assertDatabaseMissing('people', $data);
    }

}

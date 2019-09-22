<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Person;
use Illuminate\Support\Facades\Bus;
use App\Jobs\MyJob;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $data = [
            'id'   => 1,
            'name' => 'yamada',
            'mail' => 'yamada@example.net',
            'age'  => '12',
            "created_at"=>"2019-09-15 06:24:40",
            "updated_at"=>"2019-09-15 06:24:40"
        ];
        $person = new Person();
        $person->fill($data)->save();

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

    public function testState()
    {
        $list = [];
        for($i = 0;$i < 10;$i++) {
            $p1 = factory(Person::class)->create();
            $p2 = factory(Person::class)->state('upper')->create();
            $p3 = factory(Person::class)->state('lower')->create();
            $p4 = factory(Person::class)
                ->state('upper')
                ->state('lower')
                ->create();
            $list = array_merge($list, [
                $p1->id,
                $p2->id,
                $p3->id,
                $p4->id
            ]);
        }

        for($i = 0;$i < 10;$i++) {
            shuffle($list);
            $item = array_shift($list);
            $person = Person::find($item);
            $data = $person->toArray();
            print_r($data);

            $this->assertDatabaseHas('people', $data);

            $person->delete();
            $this->assertDatabaseMissing('people', $data);
        }
    }


    public function testMyJob()
    {
        $id = 10002;
        $data = [
            'id' => $id,
            'name' => 'DUMMY',
            'mail' => 'dummy@mail.com',
            'age' => 0
        ];
        $person = new Person();
        $person->fill($data)->save();
        $this->assertDatabaseHas('people', $data);

        Bus::fake();
        Bus::assertNotDispatched(MyJob::class);
        MyJob::dispatch($id);
        Bus::assertDispatched(MyJob::class);
    }

    public function testDispatched()
    {
        $id = 10003;
        $data = [
            'id' => $id,
            'name' => 'DUMMY2',
            'mail' => 'dummy2@mail.com',
            'age' => 0
        ];
        $person = new Person();
        $person->fill($data)->save();
        $this->assertDatabaseHas('people', $data);

        Bus::fake();
        MyJob::dispatch($id);

        Bus::assertDispatched(MyJob::class,
            function($job) use ($id) {
                $p = Person::find($id)->first();
                return $job->getPersonId() == $p->id;
            });
    }
}

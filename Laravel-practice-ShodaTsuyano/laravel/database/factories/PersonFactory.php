<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'mail' => $faker->email,
        'age'  => $faker->numberBetween(1,100),
    ];
});

$factory->state(Person::class, 'upper', function($faker){
    return [
        'name' => strtoupper($faker->name())
    ];
});

$factory->state(Person::class, 'lower', function($faker){
    return [
        'name' => strtolower($faker->name())
    ];
});



// モデル作成後の処理
$factory->afterMaking(Person::class,
    function ($person, $faker){
        $person->name .= ' [making]';
        $person->save();
    });

// モデル保存後の処理
$factory->afterCreating(Person::class,
    function ($person, $faker){
        $person->name .= ' [creating]';
        $person->save();
    });

// モデル作成後のステート実行後の処理
$factory->afterMakingState(person::class,
                           'upper',
                           function ($person, $faker) {
                               $person->name .= ' [making state]';
                               $person->save();
                           });

// モデル保存後のステート実行後の処理
$factory->afterMakingState(person::class,
                           'lower',
                           function ($person, $faker) {
                               $person->name .= ' [creating state]';
                               $person->save();
                           });







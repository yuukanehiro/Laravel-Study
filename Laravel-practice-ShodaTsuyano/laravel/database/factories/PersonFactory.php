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

<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'quantity' => array_random([rand(1, 100)]),
        'price' => array_random([rand(100, 1000)])

    ];
});

<?php

$factory->define(App\Models\Group::class, function (Faker\Generator $faker) {

    // Use Nubs random name generator for cool names :)
    $randomNameGen = \Nubs\RandomNameGenerator\All::create();

    return [
        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
	    'name' => $randomNameGen->getName(),
        'scrap' => $faker->numberBetween(0, 100),
        'food' => $faker->numberBetween(0, 100),
        'water' => $faker->numberBetween(0, 100),
        'fuel' => $faker->numberBetween(0, 100),
    ];
});

$factory->state(App\Models\Group::class, 'new', function ($faker) {
    return [
        'scrap' => $faker->numberBetween(0, 5),
        'food' => $faker->numberBetween(0, 5),
        'water' => $faker->numberBetween(0, 5),
        'fuel' => $faker->numberBetween(0, 5),
    ];
});

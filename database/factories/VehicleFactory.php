<?php

$factory->define(App\Models\Vehicle::class, function (Faker\Generator $faker) {

    // Use Nubs random name generator for cool names :)
    $randomNameGen = \Nubs\RandomNameGenerator\All::create();

    return [
        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'group_id' => function (array $post) {
            return App\Models\Group::inRandomOrder()->first()->id;
        },
	    'name' => $randomNameGen->getName(),
        'chassis' => $faker->randomElement(array_keys(config('vehicle.chassis'))),
        'plant' => $faker->randomElement(array_keys(config('vehicle.plant'))),
    ];
});

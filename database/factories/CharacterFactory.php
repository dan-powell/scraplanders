<?php

$factory->define(App\Models\Character::class, function (Faker\Generator $faker) {

    // Use Nubs random name generator for cool names :)
    $randomNameGen = new \Nubs\RandomNameGenerator\All(
        [
            new \Nubs\RandomNameGenerator\Alliteration(),
            new \Nubs\RandomNameGenerator\Vgng()
        ]
    );

    $hp_max = $faker->numberBetween(60, 100);

    return [
        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'group_id' => function (array $post) {
            return App\Models\Group::inRandomOrder()->first()->id;
        },

	    'firstname' => $faker->firstName(),
        'lastname' => $faker->lastName(),
        'nickname' => $randomNameGen->getName(),
        'dob' => $faker->dateTimeBetween($startDate = '-45 years', $endDate = '-18 years'),

        'strength' => $faker->numberBetween(0, 10),
        'toughness' => $faker->numberBetween(0, 10),
        'constitution' => $faker->numberBetween(0, 10),
        'dexterity' => $faker->numberBetween(0, 10),
        'intelligence' => $faker->numberBetween(0, 10),
        'wisdom' => $faker->numberBetween(0, 10),
        'charisma' => $faker->numberBetween(0, 10),
        'willpower' => $faker->numberBetween(0, 10),
        'perception' => $faker->numberBetween(0, 10),
        'luck' => $faker->numberBetween(0, 10),

        'experience' => $faker->numberBetween(0, 9000),

        'hp' => $faker->numberBetween($hp_max/2, $hp_max),

        'health' => $faker->numberBetween(0, 10),
        'mood' => $faker->numberBetween(0, 10),
        'hunger' => $faker->numberBetween(0, 10),
        'thirst' => $faker->numberBetween(0, 10),
        'rads' => $faker->numberBetween(0, 10),

        'lawfulness' => $faker->numberBetween(-10, 10),
        'goodness' => $faker->numberBetween(-10, 10),
        //'temperment' => $faker->numberBetween(-10, 10),

        //'template' => $faker->randomElement(array_keys(config('character.templates'))),

    ];
});

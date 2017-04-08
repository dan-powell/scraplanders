<?php


$factory->define(App\Models\Character::class, function (Faker\Generator $faker) {

    // Use Nubs random name generator for cool names :)
    $randomNameGen = new \Nubs\RandomNameGenerator\All(
        [
            new \Nubs\RandomNameGenerator\Alliteration(),
            new \Nubs\RandomNameGenerator\Vgng()
        ]
    );


    $experience = $faker->numberBetween(0, 9000);

    $level = App\Models\Character::getLevelFromExperience($experience);

    $points = $level * config('character.experience.stats_per_level');

    $stats = App\Models\Character::distributePoints($points);

    $hp_max = App\Models\Character::getMaxHp($stats);

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

        'strength' => $stats['strength'],
        'toughness' => $stats['toughness'],
        'constitution' => $stats['constitution'],
        'dexterity' => $stats['dexterity'],
        'intelligence' => $stats['intelligence'],
        'wisdom' => $stats['wisdom'],
        'charisma' => $stats['charisma'],
        'willpower' => $stats['willpower'],
        'perception' => $stats['perception'],
        'luck' => $stats['luck'],

        'experience' => $experience,

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

$factory->state(App\Models\Character::class, 'fart', function ($faker) {
    return [
        'name' => 'New User',
        'email' => 'new@example.com'
    ];
});

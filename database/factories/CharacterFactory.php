<?php


$factory->define(App\Models\Character::class, function (Faker\Generator $faker) {

    // Use Nubs random name generator for cool names :)
    $randomNameGen = new \Nubs\RandomNameGenerator\All(
        [
            new \Nubs\RandomNameGenerator\Alliteration(),
            new \Nubs\RandomNameGenerator\Vgng()
        ]
    );

    // Generate the stats
    $points = $faker->numberBetween(10, 20);
    $stats_array = config('character.stats');
    $distribution = Utilities::distributePoints(count($stats_array), $points);
    $stats = [];
    for($i = 0; $i < count($stats_array); $i++) {
        $stats[$stats_array[$i]] = $distribution[$i];
    }
    // Calc the max HP
    $hp_max = App\Models\Character::getMaxHp($stats);

    return [
        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'group_id' => function (array $post) {
            return App\Models\Group::withoutGlobalScopes()->inRandomOrder()->first()->id;
        },

	    'firstname' => $faker->firstName(),
        'lastname' => $faker->lastName(),
        'nickname' => $randomNameGen->getName(),
        'birthyear' => app('time')->year() - $faker->numberBetween(18, 60),

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

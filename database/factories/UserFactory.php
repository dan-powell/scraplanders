<?php


$factory->define(App\Models\User::class, function (Faker\Generator $faker) {

    return [
        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
	    'name' => $faker->sentence(rand(2, 5)),
        'email' => $faker->name(),
        'password' => bcrypt('password'),
    ];

});

$factory->state(App\Models\User::class, 'test', function ($faker) {
    return [
        'name' => 'Test User',
        'email' => 'test@example.com'
    ];
});

$factory->state(App\Models\User::class, 'new', function ($faker) {
    return [
        'name' => 'New User',
        'email' => 'new@example.com'
    ];
});

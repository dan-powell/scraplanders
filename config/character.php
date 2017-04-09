<?php

// All settings related to character
return [

    // Various settings for character stats
    'stats' => [
        'strength',
        'toughness',
        'constitution',
        'dexterity',
        'intelligence',
        'wisdom',
        'charisma',
        'willpower',
        'perception',
        'luck'
    ],

    'hp' => [
        'strength' => 0.2,
        'toughness' => 0.2,
        'constitution' => 0.5,
        'willpower' => 0.1,
    ],

    'heft' => [
        'strength' => 0.8,
        'toughness' => 0.1,
        'constitution' => 0.1,
    ],



    // Health related settings
    'health' => [
        // Used to define the max HP based on stats
        'multiplier' => 10,
    ],


    // IDEA templates provide a structure for distributing stat points when leveling up via percentage
    // 'templates' => [
    //     'joe' => [
    //         'strength' => 10,
    //         'toughness' => 10,
    //         'constitution' => 10,
    //         'dexterity' => 10,
    //         'intelligence' => 10,
    //         'wisdom' => 10,
    //         'charisma' => 10,
    //         'willpower' => 10,
    //         'perception' => 10,
    //         'luck' => 10
    //     ],
    //     'meathead' => [
    //         'strength' => 80,
    //         'toughness' => 10,
    //         'constitution' => 10,
    //         'dexterity' => 10,
    //         'intelligence' => 0,
    //         'wisdom' => 0,
    //         'charisma' => 0,
    //         'willpower' => 0,
    //         'perception' => 0,
    //         'luck' => 0
    //     ],
    //     'brainboy' => [
    //         'strength' => 0,
    //         'toughness' => 0,
    //         'constitution' => 0,
    //         'dexterity' => 0,
    //         'intelligence' => 40,
    //         'wisdom' => 40,
    //         'charisma' => 0,
    //         'willpower' => 0,
    //         'perception' => 20,
    //         'luck' => 0
    //     ],
    //     'eagleeye' => [
    //         'strength' => 0,
    //         'toughness' => 0,
    //         'constitution' => 0,
    //         'dexterity' => 30,
    //         'intelligence' => 10,
    //         'wisdom' => 0,
    //         'charisma' => 0,
    //         'willpower' => 0,
    //         'perception' => 60,
    //         'luck' => 0
    //     ],
    // ],

];

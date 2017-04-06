<?php

// All settings related to character
return [

    // Various settings for character stats
    'stats' => [
        'strength' => [
            'name' => 'Strength',
            // Used to 'weight' the amount of max HP generated per stat
            'health_constant' => 0.3,
        ],
        'toughness' => [
            'name' => 'Toughness',
            'health_constant' => 0.2,
        ],
        'constitution' => [
            'name' => 'Consitution',
            'health_constant' => 0.4,
        ],
        'dexterity' => [
            'name' => 'Dexterity',
        ],
        'intelligence' => [
            'name' => 'Intelligence',
        ],
        'wisdom' => [
            'name' => 'Wisdom',
        ],
        'charisma' => [
            'name' => 'Charisma',
        ],
        'willpower' => [
            'name' => 'Willpower',
            'health_constant' => 0.1,
        ],
        'perception' => [
            'name' => 'Perception',
        ],
        'luck' => [
            'name' => 'Luck',
        ],
    ],

    // Experience related settings
    'experience' => [
        // The basis for
        'constant' => 0.3, // Do not chnage this value without first re-distributing all stat points.
        // Number of stat points available per level
        'stats_per_level' => 1,
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

<?php

return [


    'stats' => [
        'attack',
        'defence'
    ],







    // Main component of vehicle
    'chassis' => [
        'bike' => [
            'name' => 'Bike',
            'value' => 10,
            'points' => 1,
            'crew' => 1,
            'fuel' => 10,
            'armour' => 1

        ],
        'car' => [
            'name' => 'Car',
            'value' => 30,
            'points' => 3,
            'crew' => 3,
            'fuel' => 40,
            'armour' => 1
        ],
        'tank' => [
            'name' => 'Tank',
            'value' => 60,
            'points' => 5,
            'crew' => 5,
            'fuel' => 100,
            'armour' => 1
        ]
    ],

    // Engine or main source of locomotion
    'plant' => [
        '2stroke' => [
            'name' => '2 Stroke',
            'value' => 3,
            'weight' => 1,
            'torque' => 10,
            'horsepower' => 10,
            'consumption' => 1,
        ],
        'straight4' => [
            'name' => 'Straight 4',
            'value' => 10,
            'weight' => 10,
            'torque' => 30,
            'horsepower' => 100,
            'consumption' => 20,
        ],
        'v10' => [
            'name' => 'V10',
            'value' => 30,
            'weight' => 40,
            'torque' => 200,
            'horsepower' => 3000,
            'consumption' => 100,
        ]
    ],

    // Components that are assigned to hard points
    'component' => [
        'flamethrower' => [
            'name' => 'Flame Thrower',
            'type' => 'weapon',
            'value' => 10,
            'weight' => 1,
            /*
            'stats' => [
                'attack' => 200,
                'range' => 100,
                'accuracy' => 0.1,
                'rate' => 100
            ],
            */
            'modifers' => [
                'attack' => '+10'
            ]
        ],
        'canon' => [
            'name' => 'Canon',
            'type' => 'weapon',
            'value' => 100,
            'weight' => 10,
            'modifers' => [
                'attack' => '+30'
            ]
        ],
        'armour' => [
            'name' => 'Additional Armour',
            'type' => 'armour',
            'value' => 10,
            'weight' => 4,
            'modifers' => [
                'defence' => '+10'
            ]
        ],
    ]

];

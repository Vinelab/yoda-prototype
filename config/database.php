<?php

return [

    'default' => 'neo4j',

    'connections' => [

        'neo4j' => [
            'driver'   => env('DB_CONNECTION'),
            'host'     => env('DB_HOST'),
            'port'     => env('DB_PORT'),
        ],

    ],
];

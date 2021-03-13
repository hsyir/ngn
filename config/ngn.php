<?php


return [
    "drivers" => [
        "Database" => [
            "0210000"
        ],
        "api" => [
            "0210001"
        ],
    ],
    "class-map"=>[
        "database"=>\Hsy\Ngn\Drivers\DatabaseDriver::class,
        "api"=>"App\\Ngn\\Drivers\\Api",
    ]
];

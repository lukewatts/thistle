<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Set your values in the .env file in the Thistle root directory
    |
    | All database work in Thistle is done through Laravel's EloquentORM.
    |
    */
    'db' => [
        'name' => getenv('DB_NAME'),
        'host' => getenv('DB_HOST'),
        'user' => getenv('DB_USER'),
        'pass' => getenv('DB_PASS')
    ]
];
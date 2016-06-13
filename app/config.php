<?php

/**
 * ------------------------------------------------------------
 * Configuration Settings
 * ------------------------------------------------------------
 *
 * Thistle configuration settings. This is where we define
 * our default settings, such as turning on/off errors,
 * setting the base url and registering service providers
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.1
 */
return [
    'debug' => true,
    'url'   => 'http://127.0.0.1/sites/thistle',
    'assets_dir' => 'assets',
    'db'    => [
        'dbname'    => 'thistle',
        'host'      => '127.0.0.1',
        'user'      => 'root',
        'password'  => '',
        'driver'    => 'pdo_mysql',
        'charset'   => 'utf8',
    ]
];
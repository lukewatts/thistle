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
    'url' => 'http://127.0.0.1/sites/thistle',
    'providers' => [

        /**
         * ------------------------------------------------------------
         * Twig Service Provider
         * ------------------------------------------------------------
         *
         * Twig is used for all of Thistle's templates and views
         *
         * @author Luke Watts <luke@affinity4.ie>
         * @since 0.0.1
         */
        'Silex\Provider\TwigServiceProvider' => [
            'twig.path' => __DIR__ . '/views'
        ]
    ]
];
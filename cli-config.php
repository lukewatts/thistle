<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

/**
 * ------------------------------------------------------------
 * Composer Autoload
 * ------------------------------------------------------------
 *
 * All autoload should be done through composer to ensure
 * packages are available to the rest of the application
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.6
 */
require_once __DIR__ . '/vendor/autoload.php';

/**
 * ------------------------------------------------------------
 * App: Init
 * ------------------------------------------------------------
 *
 * Initialize Silex. Silex is the heart of Thistle. Silex
 * handles Dependency Injection, routing, and middleware
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.6
 */
$app = new Silex\Application;

/**
 * ------------------------------------------------------------
 * Configuration
 * ------------------------------------------------------------
 *
 * Load our configuration array for use throughout our
 * application
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.6
 */
$config = require_once __DIR__ . '/app/config.php';

/**
 * ------------------------------------------------------------
 * Functions
 * ------------------------------------------------------------
 *
 * Thistle core functions
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.6
 */
require_once __DIR__ . '/app/core/helpers/functions.php';

/**
 * ------------------------------------------------------------
 * Service Providers
 * ------------------------------------------------------------
 *
 * Register all of our service providers registered in the
 * app/providers.php array
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.6
 */
$providers = require_once __DIR__ . '/app/providers.php';

foreach ($providers as $provider => $options) {
    if (!is_array($options)) $app->register(new $options());
    else $app->register(new $provider(), $options);
}

/**
 * ------------------------------------------------------------
 * Console Runner Helper Set
 * ------------------------------------------------------------
 *
 * Make EntityManager available to the Doctrine Console Tools
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.6
 */
return ConsoleRunner::createHelperSet($app['em']);

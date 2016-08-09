<?php
/**
 * ------------------------------------------------------------
 * Bootstrap
 * ------------------------------------------------------------
 *
 * This file should be used when you need access to the $app
 * variable and the Service Providers without running the
 * entire Application. For example, the console needs access
 * to $app at times without the output from the routes.
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.9
 */

/**
 * ------------------------------------------------------------
 * Composer Autoload
 * ------------------------------------------------------------
 *
 * All autoload should be done through composer to ensure
 * packages are available to the rest of the application
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.1
 */
require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

/**
 * ------------------------------------------------------------
 * App: Init
 * ------------------------------------------------------------
 *
 * Initialize Silex. Silex is the heart of Thistle. Silex
 * handles Dependency Injection, routing, and middleware
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.1
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
 * @since 0.0.1
 */
$config = require_once dirname(__DIR__) . '/config.php';

/**
 * ------------------------------------------------------------
 * App: URL
 * ------------------------------------------------------------
 *
 * Set the $app['url'] to the value of app/config.php 'url'.
 * Otherwise, set it to the value of $_SERVER['SERVER_NAME]
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.1
 */
$app['url'] = (isset($config['url'])) ? $config['url'] : sprintf('http://%s', $request->server->get('SERVER_NAME'));

/**
 * ------------------------------------------------------------
 * App: Debug
 * ------------------------------------------------------------
 *
 * Check if the debug value has been set in app/config.php.
 * If it has use that value, otherwise set debug to false
 *
 * NOTE: if debug is true then Whoops will be used for the
 * display of errors
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.1
 */
$app['debug'] = (isset($config['debug']) && $config['debug'] === true) ? true : false;

/**
 * ------------------------------------------------------------
 * Functions
 * ------------------------------------------------------------
 *
 * Thistle core function
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.1
 */
require_once __DIR__ . '/helpers/functions.php';

/**
 * ------------------------------------------------------------
 * Service Providers
 * ------------------------------------------------------------
 *
 * Register all of our service providers registered in the
 * app/providers.php array
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.1
 */
$providers = require_once dirname(__DIR__) . '/providers.php';

foreach ($providers as $provider => $options) {
    if (!is_array($options)) $app->register(new $options());
    else $app->register(new $provider(), $options);
}

return $app;

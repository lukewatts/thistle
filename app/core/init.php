<?php
use Symfony\Component\HttpFoundation\Request;

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
 * Request
 * ------------------------------------------------------------
 *
 * Request global for use outside of the $app request cycle
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.1
 */
$request = Request::createFromGlobals();

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
 * Whoops Service Provider
 * ------------------------------------------------------------
 *
 * If $app'debug] is true we register the Whoops Service
 * Provider
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.1
 */
if ($app['debug']) {
    $app->register(new Thistle\App\Core\Provider\Whoops\WhoopsServiceProvider());
}

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

/**
 * ------------------------------------------------------------
 * Twig: Extend
 * ------------------------------------------------------------
 *
 * Extend Twig by adding functions, filters and globals
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.3
 */
require_once dirname(__DIR__) . '/twig/extend.php';

/**
 * ------------------------------------------------------------
 * Routes
 * ------------------------------------------------------------
 *
 * Thistle routes
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.1
 */
require_once dirname(__DIR__) . '/routes.php';

/**
 * ------------------------------------------------------------
 * App: Run
 * ------------------------------------------------------------
 *
 * Run the application
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.1
 */
$app->run();
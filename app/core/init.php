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
 * Initialize Thistle. Silex is the heart of Thistle. Silex
 * handles Dependency Injection, routing, and middleware while
 * Thistle handles it's own setup.
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.9
 */
$app = new \Thistle\Application;

/**
 * ------------------------------------------------------------
 * App: Config
 * ------------------------------------------------------------
 *
 * The configuration variables from app/config.php
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.9
 *
 */
$app->setConfig(dirname(__DIR__) . '/config.json');
$app['config'] = $app->getConfig();

/**
 * ------------------------------------------------------------
 * App: Version
 * ------------------------------------------------------------
 *
 * Set the app version based on the comments block in
 * index.php
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.9
 *
 */
$app['version'] = $app->version();

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
$app['url'] = $app->url();

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
 * @since 0.0.9
 */
$app['debug'] = $app->debug();

/**
 * ------------------------------------------------------------
 * Whoops Service Provider
 * ------------------------------------------------------------
 *
 * If $app['debug] is true we register the Whoops Service
 * Provider
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.1
 */
if ($app['debug']) $app->register(new Thistle\Core\Provider\Whoops\WhoopsServiceProvider());

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
$providers = $providers = [
    /**
     * ------------------------------------------------------------
     * Service Controller Service Provider
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.9
     */
    'Silex\Provider\ServiceControllerServiceProvider' => [],

    /**
     * ------------------------------------------------------------
     * Finder Service Provider
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.9
     */
    'Thistle\Core\Provider\Finder\FinderServiceProvider' => [],

    /**
     * ------------------------------------------------------------
     * Http Fragment Service Provider
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.9
     */
    'Silex\Provider\HttpFragmentServiceProvider' => [],

    /**
     * ------------------------------------------------------------
     * Password Service Provider
     * ------------------------------------------------------------
     *
     * Provides access to the Password class. The Password class
     * encrypts and verifies passwords as well as setting the
     * appropriate cost for the current server configuration.
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.7
     */
    'Thistle\Core\Provider\Password\PasswordServiceProvider' => [
        'password.encryption' => PASSWORD_BCRYPT, 'password.cost' => 8, 'password.tolerance' => 0.05
    ],

    /**
     * ------------------------------------------------------------
     * Doctrine ORM Service Provider
     * ------------------------------------------------------------
     *
     * Providers access to the Doctrine ORM including the Entity
     * Manager. Requires DoctrineServiceProvider
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.6
     */
    'Thistle\Core\Provider\DoctrineORM\DoctrineORMServiceProvider' => [
        'orm.isDevMode' => true, 'orm.paths' => [
            __DIR__ . '/entities'
        ]
    ],

    /**
     * ------------------------------------------------------------
     * Doctrine Service Provider
     * ------------------------------------------------------------
     *
     * The Doctrine Service is used to connect to the database and
     * abstract the stand PDO class. It also is required by the
     * DoctrineORMServiceProvider.
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.2
     */
    'Silex\Provider\DoctrineServiceProvider' => [
        'db.options' => $app['config']['db']
    ],

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
        'twig.path' => dirname(__DIR__) . '/views'
    ],

    /**
     * ------------------------------------------------------------
     * Repository Service Provider
     * ------------------------------------------------------------
     *
     * Repositories are a CRUD approximation of the Entity Manager
     *
     * @deprecated 0.0.6 in favour of Entities. Deprecated by Luke Watts
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.1
     */
    'Thistle\Core\Provider\Model\ModelServiceProvider' => [
        'models' => model_files_array()
    ],

    /**
     * ------------------------------------------------------------
     * URL Generator Service Provider
     * ------------------------------------------------------------
     *
     * This allow for use or the url and path functions in Twig
     * as well as other benefits outside of Twig
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.3
     */
    'Silex\Provider\UrlGeneratorServiceProvider',
];

$app->providers($providers);

/**
 * ------------------------------------------------------------
 * Controller Services
 * ------------------------------------------------------------
 *
 * Define your Service Controllers in this file.
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.9
 */
require_once dirname(__DIR__) . '/controllers/services/services.php';

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

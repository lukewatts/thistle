<?php if (!defined('BASEDIR')) die('BASEDIR not set correctly');

/**
 * Check php version and die and dump and error message otherwise
 */
if (version_compare(PHP_VERSION, '5.3.2', '<')) die('A minimum of PHP 5.3.2 is required to run Thistle.<br />You are using PHP : ' . PHP_VERSION);

// Composer Autoloaders
require_once(BASEDIR . '/vendor/autoload.php');

// Setup paths for use throughout application
require_once(BASEDIR . '/app/core/helpers/paths.php');

// TODO: Use Symfony Classloader to load Environment and settings class
Environment::load();

// TODO: Find files in config directory dynamically and push/require them into an array and return the array
$config = new Settings;

// Application configuration
// TODO: remove in favour of above method
$config['app'] = require_once(APPDIR . '/config/app.php');
var_dump($config);
// Database configuration
$config['database'] = require_once(APPDIR . '/config/database.php');

// Set session and cookie values
$config['session'] = require_once(APPDIR . '/config/sessions.php');

// Set mail configuration values
$config['mail'] = require_once(APPDIR . '/config/mail.php');

// If debug mode is true turn on errors and warnings
if ($config['app']['debug_mode'] == true) ini_set('display_errors', 1);

// $env = new Environment($environment);
// $url = new HTTP;
// $html = new HTML;
// $helper = new Helper;
// $meta = new Meta($url);
// $plugin = new Plugin;
// new Mailer;

// /**
//  * Eloquent ORM
//  *
//  * @since 3.2.0
//  */
// use Illuminate\Database\Capsule\Manager as Capsule;

// $capsule = new Capsule();

// $capsule->addConnection(array(
//     'driver'    => 'mysql',
//     'host'      => $db['host'],
//     'database'  => $db['name'],
//     'username'  => $db['user'],
//     'password'  => $db['pass'],
//     'charset'   => 'utf8',
//     'collation' => 'utf8_unicode_ci',
//     'prefix'    => ''
// ));

// $capsule->setAsGlobal();
// $capsule->bootEloquent();

// // Bootstrap Admin
// require_once($path['admin'] . '/core/init.php');

// // Require Custom Plugins
// require_once($path['app'] . '/plugins/init.php');
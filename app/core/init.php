<?php if (!defined('BASEDIR')) die('BASEDIR not set correctly');

/**
 * Check php version and die and dump and error message otherwise
 */
if (version_compare(PHP_VERSION, '5.3.2', '<')) die('A minimum of PHP 5.3.2 is required to run Thistle.<br />You are using PHP : ' . PHP_VERSION);

// Setup paths for use throughout application
require_once(BASEDIR . '/app/core/helpers/paths.php');

// Composer Autoloaders
require_once(BASEDIR . '/vendor/autoload.php');

$config = require_once(APPDIR . '/config/app.php');

Dotenv::load(BASEDIR);
$config = array_merge($config, require_once(APPDIR . '/config/database.php'));

// If debug mode is true turn on errors and warnings
if ($config['debug_mode'] == true) ini_set('display_errors', 1);

// Set session and cookie values
require_once(APPDIR . '/config/sessions.php');

// Set mail configuration values
require_once(APPDIR . '/config/mail.php');

$env = new Environment($environment);
$url = new HTTP;
$html = new HTML;
$helper = new Helper;
$meta = new Meta($url);
$plugin = new Plugin;
new Mailer;

/**
 * Eloquent ORM
 *
 * @since 3.2.0
 */
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection(array(
    'driver'    => 'mysql',
    'host'      => $db['host'],
    'database'  => $db['name'],
    'username'  => $db['user'],
    'password'  => $db['pass'],
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
));

$capsule->setAsGlobal();
$capsule->bootEloquent();

// Bootstrap Admin
require_once($path['admin'] . '/core/init.php');

// Require Custom Plugins
require_once($path['app'] . '/plugins/init.php');
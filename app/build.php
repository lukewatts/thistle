<?php
/**
 * Framework for quickly turning static html sites into dynamic 'pseudo CMS' websites
 *
 * @author  Luke Watts <luke@luke-watts.com>
 * @author  Affinity4 <info@affinity4.ie>
 * @link    http://affinity4.ie/
 * @version 3.2
 */

/**
 * @since 3.0
 */
if ( !defined( 'PHP_VERSION' ) ) define( 'PHP_VERSION', phpversion() );

// Setup paths for use through application
require_once( 'paths.php' );

// URL helpers
require_once( 'urls.php' );

// Set configuration values
require_once( 'config/config.php' );

// Set database configuration values
require_once( 'config/database.php' );

// Set mail configuration values
require_once( 'config/mail.php' );

// Set $site['url'] and allow override
// TODO: Move to it's own file
$site['url'] = ( $site['url'] == '' ) ? get_base_url(true) : $site['url']; // TODO: Check if site is in a subdirectory also

// If debug mode is true turn on errors and warnings
// TODO: Move to it's own file
if ( $debug_mode == true ) ini_set('display_errors', 1);

/**
 * @since 2.2.0
 */
require_once( $path['app'] . '/autoload.php' );

if ( file_exists( $path['base'] . '/vendor' . '/autoload.php' ) ) require_once( $path['base'] . '/vendor' . '/autoload.php' );

$env = new Environment( $environment );
$url = new HTTP();
$html = new HTML();
$helper = new Helper();
$meta = new Meta( $url );
$plugin = new Plugin();
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

// Include Custom Plugins
include_once( 'plugins/init.php' );

// Bootstrap Admin
require_once( $path['admin'] . '/core/init.php' );
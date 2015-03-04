<?php
/**
 * Framework for quickly turning static html sites into dynamic 'pseudo CMS' websites
 *
 * @author  Luke Watts <luke@luke-watts.com>
 * @author  Affinity4 <info@affinity4.ie>
 * @link    http://affinity4.ie/
 * @version 3.1
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

// TODO: Clean up the rest of this file. Perhaps create an Application class to wrap this
// Set $site['url'] and allow override
$site['url'] = ( $site['url'] == '' ) ? get_base_url(true) : $site['url']; // TODO: Check if site is in a subdirectory also

// If debug mode is true turn on errors and warnings
if ( $debug_mode == true ) ini_set('display_errors', 1);

/**
 * @since 1.2.0
 */
if ( PHP_VERSION < '5.3.2' || $development_mode == true ) {
  
  /**
   * @since 2.2.0
   */
  require_once( $path['app'] . '/autoload.php' );

}
else {
  if ( file_exists( $path['base'] . '/vendor' . '/autoload.php' ) ) require_once( $path['base'] . '/vendor' . '/autoload.php' );
}

$env = new Environment( $environment );
$url = new HTTP();
$html = new HTML();
$helper = new Helper();
$meta = new Meta( $url );
$plugin = new Plugin();

// TODO: Make a Mail class which takes in $mail_settings and then does the following from it's constructor
/**
 * Mail functionality
 *
 * @since 3.1
 */
if ( $mail_settings['mailer_on'] ) {

  switch ( $mail_settings['mailer'] ) {
    case 'PHPMailer':
      array_push( $active_plugins, 'PHPMailer' );
      break;
    case 'SwiftMailer':
      array_push( $activate_plugins, 'SwiftMailer' );
      break;
    default:
      return false;
      break;
  }
}

// Include Custom Plugins
include_once( 'plugins/init.php' );
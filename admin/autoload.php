<?php
/**
 * Autoload Admin Core
 *
 * @since 3.1
 */

define( 'ADMIN_CORE', $path['admin'] . '/core/' );
define( 'ADMIN_MODELS', $path['admin'] . '/models/' );

function admin_autoload( $class_name ) {

  $file = ADMIN_CORE . $class_name . '.php';

  if ( file_exists( $file ) ) {
    require_once( $file );
  }
}
spl_autoload_register( 'admin_autoload' );


/**
 * Autoload Models
 * 
 * @since  3.2.0
 */
function models_autoload( $class_name ) {

  $file = ADMIN_MODELS . $class_name . '.php';

  if ( file_exists( $file ) ) {
    require_once( $file );
  }
}
spl_autoload_register( 'models_autoload' );
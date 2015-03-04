<?php
/**
 * Autoload Admin Core
 *
 * @since 3.1
 */

define( 'ADMIN_CORE', $path['admin'] . '/core/' );

function admin_autoload( $class_name ) {

  $file = ADMIN_CORE . $class_name . '.php';

  if ( file_exists( $file ) ) {
    require_once( $file );
  }
}
spl_autoload_register( 'admin_autoload' );
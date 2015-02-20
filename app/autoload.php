<?php
/**
 * Autolading helpers for PHP < 5.3.2
 *
 * @since 2.2.0
 */
define( 'LIBS_DIR', $path['app'] . '/libs/' );

function autoload( $class_name ) {

  $file = LIBS_DIR . $class_name . '.php';

  if ( file_exists( $file ) ) {
    require_once( $file );
  }
}

spl_autoload_register( 'autoload' );
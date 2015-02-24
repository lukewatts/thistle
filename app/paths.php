<?php

/**
 * Used to create missing __DIR__ constant for php < 5.3.2
 *
 * @since 1.2.0
 */
if ( !defined('__DIR__') ) define( '__DIR__', dirname( __FILE__ ) );

/**
 * Used to create paths for includes and requires
 *
 * @var array
 * @since 1.1.0
 */
$path = array(
  'base'    => str_replace( '\\', '/', dirname( __DIR__ ) ),
  'app'     => str_replace( '\\', '/', __DIR__ ),
  'admin'   => str_replace( '\\', '/', dirname( __DIR__ ) . '/admin' )
);
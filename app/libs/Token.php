<?php

/**
 * Token for protection against CSRF
 *
 * @package Thistle
 *
 * @since 3.3.0
 */
class Token {
  
  /**
   * Generate a unique token from the existing session
   * 
   * @return string
   * @since  3.3.0
   */
  public static function make() {
    $token = Session::set( Config::get( 'session.token' ), md5( uniqid() ) );
    
    return $token;
  }

  /**
   * Check if given token matches the session
   * If it does: Delete the session and return true
   * If it does not simply return false
   *
   * @param  string $token
   * @return boolean
   * @since 3.3.0
   */
  public static function check( $token ) {
    $token_name = Config::get( 'session.token' );

    if ( Session::exists( $token_name ) && $token === Session::get( $token_name ) ) {
      Session::delete( $token_name );
      return true;
    }

    return false;

  }

}
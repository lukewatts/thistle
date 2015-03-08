<?php

/**
 * Creating and checking tokens
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
   * Check if the token matches the session
   * 
   * @param  string $token
   * @return boolean
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
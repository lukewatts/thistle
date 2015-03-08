<?php

class Token {
  
  public static function make() {
    
    $token = Session::set( Config::get( 'session.token' ), md5( uniqid() ) );
    
    return $token;
  }
}
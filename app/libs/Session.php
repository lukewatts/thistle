<?php

class Session {

  public static function set( $name, $value ) {
    $session = $_SESSION[$name] = $value;

    return $session;
  }
  
}
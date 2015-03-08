<?php

class Config {

  public static function get( $path = null ) {
    if ( $path ) {

      $config = $GLOBALS['config'];
      
      $key = explode( '.', $path );

      foreach( $key as $val ) {

        if ( isset( $config[$val] ) ) {
          $config = $config[$val];
        }

      }

      return $config;

    }
  }

}

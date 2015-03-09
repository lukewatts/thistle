<?php

class Redirect {
  public static function to( $location = null ) {
    if ( $location ) {

      if ( is_numeric( $location ) ) {
        global $path;
        switch ( $location ) {
          case 404 :
            $http_error = 'HTTP/1.0 404 Not Found';
            $file = $path['base'] . '/' . $location . '.php';
          break;
        }
        header( $http_error );
        require_once( $file );
        exit();
      }
      header( 'Location: ' . $location );
      exit();
    }

  }
}
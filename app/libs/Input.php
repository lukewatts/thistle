<?php

/**
 * Checks and deals with GET and POST variables
 *
 * @since 3.3.0
 */
class Input {

  /**
   * Check if the POST or GET exists
   * 
   * @param  string $type The type: 'get' or 'post'. Default: 'post'
   * @return boolean
   */
  public static function exists( $type = 'post' ) {

    switch( $type ) {
      case 'post' :
        $output = ( !empty( $_POST ) ) ? true : false;
      break;
      case 'get' :
        $output = ( !empty( $_GET ) ) ? true : false;
      break;
      default :
        $output = false;
      break;
    }

    return $output;

  }

  /**
   * Get the value from either the post or get globals
   * 
   * @param  string $item
   * @return string
   */
  public static function get( $item ) {
    
    if ( isset( $_POST[$item] ) ) {
      return $_POST[$item];
    }
    elseif ( isset( $_GET[$item] ) ) {
      return $_GET[$item];
    }

    return '';

  }


}
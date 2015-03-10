<?php

/**
 * Determines if a form has received input
 *
 * @package Thistle
 *
 * @since 3.3.0
 */
class Input {

  /**
   * Check if get or post data exists
   *
   * @package Thistle
   *
   * @since 3.3.0
   */
  public static function exists( $type = 'post' ) {

    switch ($type) {
      case 'post' :
        $check_if_empty = (!empty($_POST)) ? true : false;
        return $check_if_empty;
        break;
      case 'get':
        $check_if_empty = (!empty($_GET)) ? true : false;
        return $check_if_empty;
        break;
      default :
        return false;
        break;
    }
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

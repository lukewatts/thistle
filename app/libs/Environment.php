<?php

/**
 * Class Environment
 * Set the environment dynamically
 *
 * @param string $env Set the name of the environment. Default: null (Optional)
 * @since 2.0
 */
class Environment {

  protected $environment = array();

  public function __construct( $env = '' ) {
    $this->set( $env );
  }

  /**
   * Set the environment
   *
   * @param string $env
   */
  public function set( $env = '' ) {

    $this->environment = array(
        'SERVER_NAME'   => $_SERVER['SERVER_NAME'],
        'SERVER_ADDR'   => $_SERVER['SERVER_ADDR'],
        'REMOTE_ADDR'   => $_SERVER['REMOTE_ADDR'],
        'DOCUMENT_ROOT' => $_SERVER['DOCUMENT_ROOT']
    );

    // Set Environment dynamically if not already set
    if ( empty( $env ) ) {
      if ($_SERVER['SERVER_ADDR'] === $_SERVER['REMOTE_ADDR']) {
        $this->environment['ENV'] = 'development';
      }
      else {
        $this->environment['ENV'] =  'production';
      }
      return true; // IMPORTANT: Won't work without this...I have no idea why
    }
    else {
      $this->environment['ENV'] = $env;
    }

  }

  public function get( $key = null ) {

    if ( !isset( $key ) ) {
      return $this->environment;
    }
    else {

      if ( array_key_exists( $key, $this->environment ) ) {
        return $this->environment[$key];
      }
      else {
        return false;
      }

    }

  }
}
<?php

class App {

  protected $controller = 'dashboard';

  protected $method = 'index';

  protected $params = array();

  public function __construct() {
    
    global $path;

    // Parse and sanitize url...
    $url = $this->parseUrl();

    // If a controller exists from first value in $url array...
    if ( file_exists( $path['admin'] . '/controllers/' . $url[0] . '.php' ) ) {

      // Set controller property to that value...
      $this->controller = $url[0];

      // Then unset the value from the $url array...
      unset( $url[0] );

    }
    
    // Require in our controller...
    require_once( $path['admin'] . '/controllers/' . $this->controller . '.php' );

    // Create new Object from our controller so we can find it's methods...
    $this->controller = new $this->controller;

    // If a method has been passed through the url...
    if ( isset( $url[1] ) ) {

      // And such a method also exists in our controller file...
      if ( method_exists( $this->controller, $url[1] ) ) {

        // Set our method property to that value...
        $this->method = $url[1];

        // Unset the value from the $url value so we can deal with our params as a seperate array...
        unset($url[1]);

      }
      
    }

    // If our $url has values...
    if ( isset($url) && array_values( $url ) ) {

      // Set $url with those an array of those values...
      $url = array_values($url);

    }
    else {
      // Otherwise set $url as an empty array
      $url = array();
    }

    // Then set params property with that array...
    $this->params = $url;

    // Finally, call our controller->method( $params ) with call_user_func_array()
    call_user_func_array( array( $this->controller, $this->method ), $this->params );
    
  }

  public function parseUrl() {

    if ( isset( $_GET['url'] ) ) {
      $url = $_GET['url'];
      $url = rtrim( $url, '/' );
      $url = filter_var($url, FILTER_SANITIZE_URL );
      $url = explode( '/', $url );

      return $url;
    }

  }

}
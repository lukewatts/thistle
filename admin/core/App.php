<?php

class App {

  protected $controller = 'dashboard';

  protected $method = 'index';

  protected $params = array();

  public function __construct() {
    $url = $this->parseUrl();
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
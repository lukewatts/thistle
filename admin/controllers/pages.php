<?php

class Pages {
  public function __construct() {
    
    echo 'Pages Controller<br />';

  }

  public function index() {
    echo 'pages/index<br />';
  }

  public function test( $param = '' ) {
    if ( $param != '' ) {
      echo 'pages/test saying ' . $param . '<br />';
    }
    else {
      echo 'pages/test method<br>';
    }
    
  }
}


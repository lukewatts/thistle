<?php

class Controller {
    
  public function __construct() {
    echo __CLASS__ . '<br />';
  }

  public function model( $model ) {
    
    global $path;

    require_once( $path['admin'] . '/models/' . $model . '.php' );
    
  }

}
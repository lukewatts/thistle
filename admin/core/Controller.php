<?php

class Controller {

  public function model( $model ) {
    
    global $path;

    $file = $path['admin'] . '/models/' . $model . '.php';

    if ( file_exists( $file ) ) {

      require_once( $file );

    }
    else {

      global $debug_mode;

      if ( $debug_mode == true ) {
        echo 'Model ' . $model . ' doesn\'t exist. Check if ' . $file . ' exists.';
      }
      
    }
    
    return new $model();

  }

  public function view( $view, $data = array(), $extract = false ) {

    global $path;

    if ( $extract ) {
      extract($data);
    }

    require_once( $path['admin'] . '/views/' . $view . '.php' );

  }

}
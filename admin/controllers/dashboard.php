<?php

class Dashboard extends Controller {

  public function index( $name = '' ) {
    
    $user = $this->model('User');
    $user->name = $name;
    
    $this->view( 'dashboard/index', array( 'name' => $user->name ), true );

  }

}


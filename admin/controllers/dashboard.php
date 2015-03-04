<?php

class Dashboard extends Controller {

  public function index( $name = '' ) {
    
    User::create(array(
      'name' => 'Test'
    ));
    $user->name = $name;
    
    $this->view( 'dashboard/index', array( 'name' => $user->name ), true );

  }

}


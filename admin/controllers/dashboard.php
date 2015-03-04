<?php

class Dashboard extends Controller {
  
  public function __construct() {

  }

  public function index( $data = '' ) {
    
    echo '<h1>Welcome to the Thistle Admin Dashboard</h1>';
    print_r($data);

  }

}


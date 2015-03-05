<?php

class Dashboard extends Controller {

  public function index(  ) {

    $user = User::all();

    $this->view( 'dashboard/index', array( 'user' => $user->last() ), true );

  }

}

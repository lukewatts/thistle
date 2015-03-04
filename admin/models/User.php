<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {
  protected $fillable = array( 'name' );

  public $timestamps = array();
}
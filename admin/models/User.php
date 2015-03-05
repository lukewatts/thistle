<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {
  protected $fillable = array(
    'first_name',
    'last_name',
    'email',
    'is_admin'
  );

}
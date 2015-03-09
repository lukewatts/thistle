<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {
  protected $fillable = array(
    'first_name',
    'last_name',
    'email',
    'is_admin'
  );

  /**
   * Check if a User exists in the database based 
   * on an array of columns and their values
   * 
   * @param  array  $fields
   * @return mixed
   */
  public static function exists( $fields = array() ) {
    
    foreach ( $fields as $col => $val) {
      try {
        $user = self::where( $col, '=', $val )->count();
      
        if ( $user ) {
          return true;
        }
        else {
          return false;
        }
      }
      catch ( PDOException $e ) {
        $error = $e->getMessage();
      }
      
    }

  }

  public static function getUserId( $fields = array() ) {
    foreach ( $fields as $col => $val) {
      try {
        $user = self::where( $col, '=', $val )->first();
      
        if ( $user ) {
          return $user->id;
        }
        else {
          return false;
        }
      }
      catch ( PDOException $e ) {
        return $e->getMessage();
      }
    }
  }

  /**
   * Login user and create session
   * 
   * @param  array  $fields
   * @return mixed
   */
  public static function login( $fields = array() ) {
    foreach ( $fields as $col => $val) {
      try {
        $user = self::where( $col, '=', $val )->first();
      
        if ( $user ) {
          $user_id = $user->id;
          Session::set( 'logged_in', $user_id );

          return true;
        }
        else {
          return false;
        }
      }
      catch ( PDOException $e ) {
        $error = $e->getMessage();
      }
      
    }    
  }

  public static function logout() {
    Session::delete( 'logged_in' );
  }

  public static function isAdmin( $id = 1 ) {
    $user = self::find($id);

    if ( $user->is_admin ) {
      return true;
    }
    else {
      return false;
    }
  }

  

}
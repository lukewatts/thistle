<?php
/**
 * Handles CRUD operations on files
 *
 * @since 2.0
 */
class FileHandler {

  protected $base_path;
  protected $file;
  protected $contents;
  protected $mode;

  public function __construct( $file_name = null, $file_dir = null ) {

    if ( !isset( $file_dir ) ) {
      $this->setBasePath();
    }
    else {
      $this->setBasePath( $file_dir );
    }

    $file = $this->base_path . $file_name;

    if ( isset( $file_name ) ) $this->setFileName($file);

    return $this;

  }

  public function setBasePath( $base_path = null ) {
    global $path;

    $this->base_path = ( !isset( $base_path ) ) ? $path['base'] .'/' : $base_path;

  }

  public function getBasePath() {
    return $this->base_path;
  }

  public function setFileName( $file_name ) {
    $this->file = $file_name;
  }

  public function getFileName() {
    return $this->file;
  }

  public function createNew( $file = null ) {
    if ( isset( $file ) ) {
      $handle = fopen($file, 'x');

      $this->setFileName($file);
    }
    else {
      $handle = fopen( $this->file, 'x' );
    }

    return ( $handle ) ? true : false;
  }

  public function read( $file = null ) {
    if ( isset($file) ) {
      $handle = fopen( $file );

      $this->setFileName( $file );
    }
    else {
      $handle = fopen( $this->file, 'r' );
    }
  }

  public function setContents( $file_contents ) {
    $this->contents = $file_contents;
  }

  public function getContents() {
    return $this->contents;
  }

  protected function write( $file_name = null, $mode = 'c', $file_contents = null ) {
    if ( isset( $file_name ) ) {

      $this->setFileName( $file_name );
    }

    if ( isset( $file_contents ) ) {
      $this->setContents( $file_contents );
    }

    $handle = fopen( $this->getFileName(), $mode, $file_contents );
    fwrite( $handle, $this->getContents() );
  }

  public function setMode( $mode = 'c' ) {
    $this->mode = $mode;
  }

  public function getMode() {
    return $this->mode;
  }

  public function append( $file_name = null, $file_contents = null) {
    if ( isset( $file_contents ) ) {
      $this->setContents( $file_contents );
      $this->write( $file_name, 'a', $this->getContents() );
    }
    else {
      $this->setMode('a');
      return $this;
    }
  }

  public function overwrite( $file_name = null, $file_contents = null ) {
    if ( isset( $file_contents ) ) {
      $this->setContents( $file_contents );
      $this->write( $file_name, 'w' );
    }
    else {
      $this->setMode( 'w' );
      return $this;
    }
  }

  public function with( $file_contents ) {

    $this->setContents( PHP_EOL . $file_contents );

    $this->write( $this->getFileName(), $this->getMode(), $this->getContents() );
  }

  public function delete( $file_name = null ) {
    if ( isset( $file_name ) ) {
      $this->setFileName( $file_name );
    }

    unlink( $this->getFileName() );
  }

}
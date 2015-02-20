<?php

/**
 * Class Plugin
 *
 * @since 2.1.0
 */
class Plugin {

  protected $active_plugins;
  protected $plugin;
  protected $page;

  public function __construct() {
    $this->setActivePlugins();
  }

  public function setPluginName( $plugin_name ) {
    $this->plugin = $plugin_name;

  }

  public function getPluginName() {
    return $this->plugin;
  }

  public function setActivePlugins() {
    global $active_plugins;
    $this->active_plugins = $active_plugins;
  }

  public function getActivePlugins() {
    return $this->active_plugins;
  }

  public function isActive( $plugin_name ) {
    if ( in_array( $plugin_name, $this->getActivePlugins() ) ) {
      return true;
    }
    else {
      return false;
    }
  }

  public function insert( $plugin_name, $page_name ) {
    $this->page = $page_name;

    if ( $this->isActive( $plugin_name ) ) {
      $this->plugin_name = $plugin_name;
      require_once( 'templates/' . $this->plugin_name . '/' . $this->page . '.php' );
    }
    else {
      return false;
    }
  }


}
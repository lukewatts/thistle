<?php
/**
 * @since 2.1.0
 */
if ( file_exists( $path['app'] . '/libs/Plugin.php' ) && !class_exists('Plugin')) {
  require_once($path['app'] . '/libs/Plugin.php');
  $plugin = new Plugin();
}

/*
 * Retrieves the array of active plugins from the app/config.php global variable $active_plugins
 */
foreach ( $active_plugins as $active_plugin ) {

  if ( !empty( $active_plugin ) ) {
    include_once( $active_plugin . '/' . $active_plugin . '.php' );
  }

}
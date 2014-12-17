<?php
/**
 * URL helpers for dynamic URL generation
 *
 * @since 1.1.0
 */

/**
 * Checks if the current server is running SSL (https://) Returns true if https://, false if http://
 *
 * @return boolean
 *
 * @since 1.1.0
 */
function is_https() {
  return ( !empty( $_SERVER['HTTPS'] ) ) ? true : false;
}


/**
 * Returns the current protocol
 *
 * @return string
 *
 * @since 1.1.0
 */
function get_https() {
  return ( is_https() ) ? 'https://' : 'http://';
}


/**
 * Outputs the current protocol ( 'http://' or 'https://' )
 *
 * @return void
 *
 * @since 1.1.0
 */
function https() {
  echo get_https();
}


/**
 * Returns the server name ( 'example.com' )
 *
 * @return string
 *
 * @since 1.1.0
 */
function get_server_name() {
  return $_SERVER['SERVER_NAME'];
}


/**
 * Outputs the server name ( 'example.com' )
 *
 * @return void
 *
 * @since 1.1.0
 */
function server_name() {
  echo get_server_name();
}


/**
 * Returns the full absolute base url ('http://example.com') with or without trailing slash ('/')
 *
 * @param  boolean|string $append_slash Whether or not to append a slash to the end of the url
 * @return string
 *
 * @since 1.1.0
 */
function get_base_url( $append_slash = false ) {
  return ( $append_slash == '/' || $append_slash == true ) ? get_https() . get_server_name() . '/' : get_https() . get_server_name();
}


/**
 * Outputs the full absolute base url ('http://example.com') with or without trailing slash ('/')
 *
 * @param  boolean|string $append_slash Whether or not to append a slash to the end of the url
 * @return string
 *
 * @since 1.1.0
 */
function base_url( $append_slash = false ) {
  echo get_base_url( $append_slash );
}


/**
 * Returns the full absolute assets url ('http://example.com/assets') with or without trailing slash ('/')
 *
 * @param  boolean|string $append_slash Whether or not to append a slash to the end of the url
 * @return string
 *
 * @since 1.1.0
 */
function get_assets_url( $append_slash = false ) {
  return ( $append_slash == '/' || $append_slash == true ) ? get_base_url( true ) . 'assets/' : get_base_url( true ) . 'assets';
}


/**
 * Outputs the full absolute assets url ('http://example.com/assets') with or without trailing slash ('/')
 *
 * @param  boolean|string $append_slash Whether or not to append a slash to the end of the url
 * @return string
 *
 * @since 1.1.0
 */
function assets_url( $append_slash = false ) {
  echo get_assets_url( $append_slash );
}
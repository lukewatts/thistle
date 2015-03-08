<?php
session_start();

/**
 * Session configuration settings
 *
 * @package Thistle
 * @since 3.3.0
 */

$GLOBALS['config'] = array(
  'cookie' => array(
    'name' => 'hash',
    'expiry' => 604800
  ),
  'session' => array(
    'name' => 'user',
    'token' => 'token'
  )
);

<?php

/**
 * Mail functionality
 *
 * @since 3.1
 */
class Mailer {

  protected $settings = array();
  protected $mailer = '';

  public function __construct() {
    global $mail_settings, $active_plugins;

    $this->settings = $mail_settings;

    $this->mailer = $this->settings['mailer'];

    if ( $this->settings['mailer_on'] && $this->mailer != '' ) {
      array_push( $active_plugins, $this->mailer );
    }
    else {
      return false;
    }

  }

}
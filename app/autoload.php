<?php
/**
 * Autolading helpers for PHP < 5.3.2
 *
 * @since 2.2.0
 */
define( 'LIBS_DIR', $path['app'] . '/libs/' );
define( 'VENDOR_DIR', $path['base'] . '/vendor/' );

function libs_autoload( $class_name ) {

  $file = LIBS_DIR . $class_name . '.php';

  if ( file_exists( $file ) ) {
    require_once( $file );
  }
}
spl_autoload_register( 'libs_autoload' );

/**
 * PHPMAILER Can be globally required based on mail_on setting
 *
 * @since 3.1.0
 */
if ( $mail_settings['mailer_on'] ) {
  require_once(VENDOR_DIR . '/phpmailer/phpmailer/PHPMailerAutoload.php');
}
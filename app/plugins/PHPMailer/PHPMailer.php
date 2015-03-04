<?php
/**
 * PHPMailer Plugin for Thistle
 *
 * @package Thistle
 * @since 3.1
 *
 * @subpackage PHPMailer Thistle Plugin
 * @version 1.0
 *
 */

$errorHandler = new ErrorHandler;

// For php < 5.3.2
if ( !defined( 'PHPMailer' ) && $mail_settings['mailer_on'] ) {
  
  if ( file_exists( $path['base'] . VENDOR_DIR . 'phpmailer/phpmailer/PHPMailerAutoload.php' ) ) {
    
    require_once( $path['base'] . VENDOR_DIR . 'phpmailer/phpmailer/PHPMailerAutoload.php' );

    $mail = new PHPMailer();

    if ( !empty( $_POST ) ) {

      $validator = new Validator( $errorHandler );

      $validator->rules = array(
        'name' => array(
            'required'  => true,
            'maxlength' => 20,
            'minlength' => 3,
            'alphanumeric' => true
          ),
        'email' => array(
            'required' => true,
            'maxlength' => 255,
            'email' => true
          ),
        'message' => array(
            'required' => true,
            'minlength' => 6
          ),
        // 'password' => array(
        //     'required' => true,
        //     'minlength' => 6
        //   ),
        // 'retype_password' => array(
        //     'match' => 'password'
        //   ),
        );

      if ( $mail_settings['host'] == 'smtp' ) {
        $mail->IsSMTP();
        $mail->Host = $mail_settings['host'];
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPDebug = 1;
        $mail->SMTPUsername = $mail_settings['username'];
        $mail->SMTPPassword = $mail_settings['password'];
      }

      $mail->AddAddress( $mail_settings['recipient'], $site['author'] );
      $mail->Subject    = $mail_settings['subject'];
      $mail->FromName   = $_POST['name'];
      $mail->From       = $_POST['email'];
      $mail->AddReplyTo( $_POST['email'], $mail->FromName );
      $mail->SetFrom( $_POST['email'], $_POST['name'] );
      $mail->Body       = $_POST['message'];

      $validation = $validator->check( $_POST );

      if ( $validation->fails() ) {
        
        $validation_errors = array(
          'name'    => $validation->errors()->first( 'name' ),
          'email'   => $validation->errors()->first( 'email' ),
          'message' => $validation->errors()->first( 'message' )
        );

        $class = 'alert';
        $form_output = '';
      }
      elseif ( !$mail->Send() ) {
        
        $message = array(
          'title' => 'Oops!',
          'body'  => $mail->ErrorInfo
        );

        $class = 'alert';
        $format = '<h4 style="color:white;">%s</h4>' . PHP_EOL . '%s';
        $form_output = sprintf( $format, $message['title'], $message['body'] );

      }
      else {
        
        $message = array(
          'title' => 'Message Sent!',
          'body'  => 'Thank you ' . $mail->FromName . '. We\'ll get back to you soon!'
        );

        $class = 'success';
        $format = '<h4 style="color:white">%s</h4>' . PHP_EOL . '%s';
        $form_output = sprintf( $format, $message['title'], $message['body'] );

      }
    }
  }
}
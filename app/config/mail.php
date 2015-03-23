<?php

return [
    'mailer'    => 'PHPMailer',         // Which mailer you wish to use ( 'PHPMailer', 'SwiftMailer' ).
    'transport' => 'mail',              // Set the method of sending email ( 'mail', 'sendmail', 'smtp' )
    'host'      => 'mail.gmail.com',    // If using smtp transport you will need to provide a host
    'username'  => getenv('MAIL_USER'), // If using smtp transport you will need to provide a username
    'password'  => getenv('MAIL_PASS'), // If using smtp transport you will need to provide a password
    'recipient' => 'your@email.here',   // Default recipient if none is provided i.e. contact form)
    'subject'   => 'Your Default Subject Here', // Default subject if none is provided i.e. contact form)
    'mailer_on' => true                 // Turn this to false if your application doesn't require any mail functionality
];

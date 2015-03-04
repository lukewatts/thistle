<?php

// FIXME: Paths to classes aren't working
require_once( dirname( dirname(__FILE__) ) . '/app/build.php' );

require_once( $path['admin'] . '/core/init.php' );

new App;

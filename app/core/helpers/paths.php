<?php

/**
 * Used to create paths for includes and requires
 *
 * @since 0.3.3
 */
define('APPDIR', rtrim(BASEDIR . '/app'), '/');
define('COREDIR', rtrim(APPDIR . '/core'), '/');

/**
 * Aliases
 *
 * @since 0.3.3
 */
define('BASEPATH', BASEDIR);
define('APPPATH', APPDIR);
define('COREPATH', COREDIR);
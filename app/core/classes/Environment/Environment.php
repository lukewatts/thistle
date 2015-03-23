<?php namespace Thistle\Environment;

use Dotenv;

class Environment
{
    public static function init()
    {
        static::load();
    }

    public static function load() {
        try {
            // Load our Environment variables
            Dotenv::load(BASEDIR);
            return true;
        } catch(InvalidArgumentException $e) {
            echo $e->getMessage() . '<br />Copy ".env-sample" to .env and conigure your environments settings.';
            return false;
        }
    }


}
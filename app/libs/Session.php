<?php

/**
 * Class for setting, getting, checking and deleting sessions
 *
 * @package Thistle
 * @since  3.3.0
 */
class Session
{
    /**
     * Set a session by name => value and return it
<<<<<<< HEAD
     *
=======
     * 
>>>>>>> c61c17b09b3351c9981ebdf4c55fd88893f9392b
     * @param  string $name
     * @param  string $value
     * @return string
     */
    public static function set($name, $value)
    {
        $session = $_SESSION[$name] = $value;

        return $session;
    }

    /**
     * Return the given session value or the session array
     * @return mixed
     * @since 3.3.0
     */
    public static function get($name = '')
    {
<<<<<<< HEAD
        if (!empty($name)) {
            return $_SESSION[$name];
        } else {
=======
        if(!empty($name)) {
            return $_SESSION[$name];
        }
        else {
>>>>>>> c61c17b09b3351c9981ebdf4c55fd88893f9392b
            return $_SESSION;
        }
    }

    /**
     * Check if a session exists by name
     *
     * @param  string $name
     * @return boolean
     */
    public static function exists($name)
    {
        return (isset($_SESSION[$name])) ? true : false;
    }

    /**
     * Delete a session by name
<<<<<<< HEAD
     *
=======
     * 
>>>>>>> c61c17b09b3351c9981ebdf4c55fd88893f9392b
     * @param  string $name
     * @return void
     */
    public static function delete($name)
    {
<<<<<<< HEAD
        if (self::exists($name)) {
=======
        if ( self::exists($name)) {
>>>>>>> c61c17b09b3351c9981ebdf4c55fd88893f9392b
            unset($_SESSION[$name]);
        }
    }

    /**
     * Flash a message to the user after a session is created
<<<<<<< HEAD
     *
=======
     * 
>>>>>>> c61c17b09b3351c9981ebdf4c55fd88893f9392b
     * @param  string $name
     * @param  string $message
     * @return mixed
     */
    public static function flash($name, $message = '')
    {
        if (self::exists($name)) {
            $session = self::get($name);
            self::delete($name);
            return $session;
<<<<<<< HEAD
        } else {
=======
        }
        else {
>>>>>>> c61c17b09b3351c9981ebdf4c55fd88893f9392b
            self::set($name, $message);
        }
    }

}

<?php defined('SYSPATH') OR die('No direct script access.');
abstract class Site_Session extends Session {
    
    /**
     * Creates a singleton session of the given type. Some session types
     * (native, database) also support restarting a session by passing a
     * session id as the second parameter.
     *
     *     $session = Session::instance();
     *
     * [!!] [Session::write] will automatically be called when the request ends.
     *
     * @param   string  $type   type of session (native, cookie, etc)
     * @param   string  $id     session identifier
     * @return  Session
     * @uses    Kohana::$config
     */
    public static function instance($type = NULL, $id = NULL)
    {
        $adminConfig = Kohana::$config->load('site');
        $sessionDriver = $adminConfig->get('session_driver');
        $sessionConfig = $adminConfig->get('session_config');
        
        if ($type === NULL)
        {
            // Use the default type
            $type = $sessionDriver;
        }
    
        if ( ! isset(Session::$instances[$type]))
        {
            // Load the configuration for this type
            $config = Kohana::$config->load($sessionConfig)->get($type);
    
            // Set the session class name
            $class = 'Session_'.ucfirst($type);
    
            // Create a new session instance
            Session::$instances[$type] = $session = new $class($config, $id);
    
            // Write the session at shutdown
            register_shutdown_function(array($session, 'write'));
        }
    
        return Session::$instances[$type];
    }
}
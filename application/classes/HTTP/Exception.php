<?php defined('SYSPATH') OR die('No direct script access.');

class HTTP_Exception extends Kohana_HTTP_Exception {
    
    /**
     * Creates an HTTP_Exception of the specified type.
     *
     * @param   integer $code       the http status code
     * @param   string  $message    status message, custom content to display with error
     * @param   array   $variables  translation variables
     * @return  HTTP_Exception
     */
    public static function factory($code, $message = NULL, array $variables = NULL, Exception $previous = NULL)
    {
        $class = 'HTTP_Exception_'.$code;
        
        if (Request::$current && stripos(Request::$current->uri(), Route::get('admin')->uri()) === 0){
            return Admin_HTTP_Exception::factory($code, $message, $variables, $previous);
        }
        elseif (class_exists('Site_HTTP_Exception_'.$code)) $class ='Site_HTTP_Exception_'.$code;
        
        return new $class($message, $variables, $previous);
    }
}
<?php
$application = '../application';
$modules     = '../modules';
$system      = '../system';

define('EXT', '.php');

define('APPPATH', realpath($application).DIRECTORY_SEPARATOR);
define('MODPATH', realpath($modules).DIRECTORY_SEPARATOR);
define('SYSPATH', realpath($system).DIRECTORY_SEPARATOR);
define('DOCROOT', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR);

if (!APPPATH || !MODPATH || !SYSPATH) {
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    echo "Bad paths:\nAPPPATH=".(APPPATH ?: 'FALSE')."\nMODPATH=".(MODPATH ?: 'FALSE')."\nSYSPATH=".(SYSPATH ?: 'FALSE')."\n";
    exit;
}

require SYSPATH.'classes/Kohana/Core'.EXT;
require SYSPATH.'classes/Kohana'.EXT;

spl_autoload_register(array('Kohana', 'auto_load'));
spl_autoload_register(array('Kohana', 'auto_load_lowercase'));

if (!function_exists('get_magic_quotes_gpc')) {
    function get_magic_quotes_gpc() { return 0; }
}
if (!function_exists('__')) {
    function __($string, array $values = null, $lang = null) {
        return $values ? strtr($string, $values) : $string;
    }
}

require APPPATH.'bootstrap'.EXT;

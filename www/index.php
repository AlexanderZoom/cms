<?php
// --- Path settings (adjust if your structure differs) ---
$application = '../application';
$modules     = '../modules';
$system      = '../system';

define('EXT', '.php');

define('APPPATH', realpath($application).DIRECTORY_SEPARATOR);
define('MODPATH', realpath($modules).DIRECTORY_SEPARATOR);
define('SYSPATH', realpath($system).DIRECTORY_SEPARATOR);

if (!APPPATH || !MODPATH || !SYSPATH) {
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    echo "Bad paths:\nAPPPATH=".(APPPATH ?: 'FALSE')."\nMODPATH=".(MODPATH ?: 'FALSE')."\nSYSPATH=".(SYSPATH ?: 'FALSE')."\n";
    exit;
}

// --- Load Kohana core (must be before APP bootstrap) ---
require SYSPATH.'classes/Kohana/Core'.EXT;
require SYSPATH.'classes/Kohana'.EXT;

// --- Register autoloaders ---
spl_autoload_register(array('Kohana', 'auto_load'));
spl_autoload_register(array('Kohana', 'auto_load_lowercase'));

// --- PHP 8 removed APIs: safe fallbacks ---
// Kohana 3.x checks magic quotes in Core::init(); define stub to avoid fatal on PHP 8
if (!function_exists('get_magic_quotes_gpc')) {
    function get_magic_quotes_gpc() { return 0; }
}

// Some Kohana views call __() early; ensure a minimal pass-through exists
if (!function_exists('__')) {
    function __($string, array $values = null, $lang = null) {
        return $values ? strtr($string, $values) : $string;
    }
}

// --- Load application bootstrap ---
require APPPATH.'bootstrap'.EXT;

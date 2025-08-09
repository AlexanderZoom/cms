<?php defined('SYSPATH') or die('No direct script access.');

// Environment
Kohana::$environment = Kohana::DEVELOPMENT;
if (isset($_SERVER['KOHANA_ENV'])) {
    Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
}
//Kohana::$environment = Kohana::PRODUCTION;

// Initialize Kohana
Kohana::init(array(
    'base_url'   => '/',
    'index_file' => false,
    'caching'    => false,
    'expose'     => false,
));

// Attach config
//Kohana::$config->attach(new Config_File);
Kohana::$config->attach(new Config_File_Writer);

// Enable modules
$modulesList = array(
    'database'    => MODPATH.'database',
    'image'       => MODPATH.'image',
    'minion'      => MODPATH.'minion',
    'orm'         => MODPATH.'orm',
    'userguide'   => MODPATH.'userguide',
    'i18n_plural' => MODPATH.'i18n_plural',
    'utils'       => MODPATH.'utils',
);

Kohana::modules($modulesList);
$modulesList = Arr::merge($modulesList, Modules::getList4Load());
Kohana::modules($modulesList);

// Now safe to touch I18n (module loaded)
if (class_exists('I18n', false) && method_exists('I18n', 'lang')) {
    I18n::lang('');
}

// Load main config group once
$main = Kohana::$config->load('main');

// Attach logging dir from config
$logs_dir = is_object($main) ? (string)$main->get('logs', '') : '';
if ($logs_dir !== '') {
    Kohana::$log->attach(new Log_File($logs_dir));
}

// Set cookie salt from config (string only)
$salt = is_object($main) ? (string)$main->get('cookie_salt', '') : '';
if ($salt !== '') {
    Cookie::$salt = $salt;
}

// Routes
require APPPATH.'route'.EXT;

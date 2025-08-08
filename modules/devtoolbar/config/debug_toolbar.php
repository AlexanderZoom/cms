<?php defined('SYSPATH') or die('No direct script access.');

/*
 * If true, the debug toolbar will be automagically displayed
 * NOTE: if IN_PRODUCTION is set to TRUE, the toolbar will
 * not automatically render, even if auto_render is TRUE
 */
$config['auto_render'] = false; //Kohana::$environment > Kohana::PRODUCTION;

/*
 * If true, the toolbar will default to the minimized position
 */
$config['minimized'] = TRUE;

/*
 * Log toolbar data to FirePHP
 */
$config['firephp_enabled'] = FALSE;

/*
 * Enable or disable specific panels
 */
$config['panels'] = array(
	'benchmarks'		=> TRUE,
	'database'			=> TRUE,
	'vars'				=> TRUE,
	'configs'			=> FALSE, // also depends on 'vars' values
	'ajax'				=> TRUE,
	'files'				=> TRUE,
	'modules'			=> TRUE,
	'routes'			=> TRUE,
	'customs'           => TRUE,
);

/*
 * Toolbar alignment
 * options: right, left, center
 */
$config['align'] = 'right';

/*
 * Secret Key
 */
$config['secret_key'] = FALSE;

/**
 * Exclude configs
 */
$config['skip_configs'] = array('database', 'encrypt');

/**
 * Disabled routes
 */
$config['excluded_routes'] = array(
	'docs/media',  // Userguide media route
	'/admin/ru/media/filemanager',
	'/admin/en/media/filemanager',
);

return $config;
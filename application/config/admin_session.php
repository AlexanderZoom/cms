<?php defined('SYSPATH') OR die('No direct script access.');

return array(
    'native' => array(
        'name' => 'ADMINPANEL',
        'lifetime' => 0,
    ),
    'cookie' => array(
        'name' => 'ADMINPANEL',
        'encrypted' => TRUE,
        'lifetime' => 0,
    ),
    'database' => array(
        'name' => 'ADMINPANEL',
        'encrypted' => TRUE,
        'lifetime' => 0,
        'group' => 'default',
        'table' => 'admin_session',
        'columns' => array(
            'session_id'  => 'session_id',
            'last_active' => 'last_active',
            'contents'    => 'contents'
        ),
        'gc' => 500,
    ),
);
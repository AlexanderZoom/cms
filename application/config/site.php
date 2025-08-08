<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
    'session_config' => 'site_session',
    'session_driver' => 'database',
    'class_user_auth' => 'Site_Auth_User_Db',
);


<?php defined('SYSPATH') OR die('No direct script access.');
return array (
  'session_config' => 'admin_session',
  'session_driver' => 'database',
  'class_user_auth' => 'Admin_Auth_User_Db',
  'title' => 'Admin panel',
  'title_separator' => '::',
  'item_on_page' => '10',
  'language_default' => 'ru',
  'language_list' => '(ru|en)',
);
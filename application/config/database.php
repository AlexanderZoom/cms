<?php defined('SYSPATH') OR die('No direct script access.');
return array (
  'default' => 
  array (
    'type' => 'PDO_MySQL',
    'connection' => 
    array (
      'hostname' => 'localhost',
      'database' => 'kohana',
      'username' => 'feed',
      'password' => 'cd7hKh28FMpNH3ZP',
      'persistent' => false,
      'dsn' => 'mysql:host=localhost;dbname=local_feed',
    ),
    'table_prefix' => '',
    'charset' => 'utf8',
    'caching' => false,
    'identifier' => '`',
  ),
  'alternate' => 
  array (
    'type' => 'PDO',
    'connection' => 
    array (
      'dsn' => 'mysql:host=localhost;dbname=kohana',
      'username' => 'root',
      'password' => 'r00tdb',
      'persistent' => false,
    ),
    'table_prefix' => '',
    'charset' => 'utf8',
    'caching' => false,
  ),
);
<?php
// Пути к каталогам (относительно этого index.php)
$application = '../application';
$modules     = '../modules';
$system      = '../system';

// .php
define('EXT', '.php');

// Разрешаем абсолютные пути
define('APPPATH', realpath($application).DIRECTORY_SEPARATOR);
define('MODPATH', realpath($modules).DIRECTORY_SEPARATOR);
define('SYSPATH', realpath($system).DIRECTORY_SEPARATOR);

// Быстрая диагностика путей (можно удалить после проверки)
if (!APPPATH || !MODPATH || !SYSPATH) {
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    echo "Bad paths:\nAPPPATH=".(APPPATH ?: 'FALSE')."\nMODPATH=".(MODPATH ?: 'FALSE')."\nSYSPATH=".(SYSPATH ?: 'FALSE')."\n";
    exit;
}

// ОБЯЗАТЕЛЬНО: подключаем ядро Kohana до bootstrap
require SYSPATH.'classes/Kohana/Core'.EXT;
require SYSPATH.'classes/Kohana'.EXT;

// Регистрируем автозагрузчик Kohana
spl_autoload_register(array('Kohana', 'auto_load'));
spl_autoload_register(array('Kohana', 'auto_load_lowercase'));

// Теперь можно грузить bootstrap приложения
require APPPATH.'bootstrap'.EXT;

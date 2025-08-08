<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2020-06-19 00:01:25 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:01:25 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:01:27 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:01:27 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:01:28 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:01:28 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:01:29 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:01:29 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:03:14 --- CRITICAL: Database_Exception [ 0 ]: invalid data source name ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:03:14 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:03:15 --- CRITICAL: Database_Exception [ 0 ]: invalid data source name ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:03:15 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:03:16 --- CRITICAL: Database_Exception [ 0 ]: invalid data source name ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:03:16 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:03:16 --- CRITICAL: Database_Exception [ 0 ]: invalid data source name ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:03:16 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:03:16 --- CRITICAL: Database_Exception [ 0 ]: invalid data source name ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:03:16 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:03:17 --- CRITICAL: Database_Exception [ 0 ]: invalid data source name ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:03:17 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:03:17 --- CRITICAL: Database_Exception [ 0 ]: invalid data source name ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:03:17 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:19 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:19 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:20 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:20 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:25 --- CRITICAL: Database_Exception [ 1044 ]: SQLSTATE[HY000] [1044] Access denied for user ''@'localhost' to database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:25 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:26 --- CRITICAL: Database_Exception [ 1044 ]: SQLSTATE[HY000] [1044] Access denied for user ''@'localhost' to database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:26 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:26 --- CRITICAL: Database_Exception [ 1044 ]: SQLSTATE[HY000] [1044] Access denied for user ''@'localhost' to database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:26 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:26 --- CRITICAL: Database_Exception [ 1044 ]: SQLSTATE[HY000] [1044] Access denied for user ''@'localhost' to database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:26 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:26 --- CRITICAL: Database_Exception [ 1044 ]: SQLSTATE[HY000] [1044] Access denied for user ''@'localhost' to database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:26 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:27 --- CRITICAL: Database_Exception [ 1044 ]: SQLSTATE[HY000] [1044] Access denied for user ''@'localhost' to database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:27 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:40 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:40 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:40 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:40 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:40 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:04:40 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:18 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:18 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:19 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:19 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:19 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:19 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:32 --- CRITICAL: Database_Exception [ 1049 ]: SQLSTATE[HY000] [1049] Unknown database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:32 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:33 --- CRITICAL: Database_Exception [ 1049 ]: SQLSTATE[HY000] [1049] Unknown database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:33 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:34 --- CRITICAL: Database_Exception [ 1049 ]: SQLSTATE[HY000] [1049] Unknown database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:34 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:36 --- CRITICAL: Database_Exception [ 1049 ]: SQLSTATE[HY000] [1049] Unknown database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:36 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:40 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:40 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:41 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:41 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:49 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:49 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:50 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:50 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:50 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:50 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:50 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:05:50 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:06:19 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:06:19 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:06:20 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:06:20 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:08:59 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:08:59 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:00 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:00 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:00 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:00 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:00 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:00 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:01 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:01 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:01 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:01 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:01 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:01 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:02 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:02 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:02 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:02 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:27 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:27 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:27 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:27 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:28 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:28 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:29 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:29 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:29 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:29 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:30 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:30 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:30 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:30 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:30 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:30 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:30 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:30 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:31 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:31 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:31 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:31 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:31 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:31 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:31 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:31 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:31 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:31 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:32 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:32 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:32 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:32 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:32 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:32 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:32 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:32 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:33 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:33 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:33 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:33 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:34 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:34 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:34 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:34 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:47 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:47 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:47 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:47 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:47 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:47 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:48 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:48 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:48 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:48 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:48 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:09:48 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:33 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:33 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:34 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:34 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:35 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:35 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:35 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:35 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:36 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:36 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:36 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:36 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:36 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:36 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:36 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:36 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:46 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:46 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:49 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:49 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:50 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:50 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:50 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:50 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:50 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:50 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:51 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:51 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:51 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:51 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:51 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:51 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:51 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:51 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:52 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:52 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:52 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:52 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:52 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:52 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:53 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:10:53 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-19 00:16:22 --- CRITICAL: Site_HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: admin-content/images/fileicons/rar.png ~ APPPATH\classes\HTTP\Exception.php [ 22 ] in F:\wamp64\vhosts\cms.local\system\classes\Kohana\Request.php:986
2020-06-19 00:16:22 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Request.php(986): HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 F:\wamp64\vhosts\cms.local\www\index.php(118): Kohana_Request->execute()
#2 {main} in F:\wamp64\vhosts\cms.local\system\classes\Kohana\Request.php:986
2020-06-19 00:18:58 --- CRITICAL: Site_HTTP_Exception_404 [ 404 ]: The requested URL photos was not found on this server. ~ APPPATH\classes\HTTP\Exception.php [ 22 ] in F:\wamp64\vhosts\cms.local\system\classes\Kohana\Request\Client\Internal.php:79
2020-06-19 00:18:58 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Request\Client\Internal.php(79): HTTP_Exception::factory(404, 'The requested U...', Array)
#1 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#2 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#3 F:\wamp64\vhosts\cms.local\www\index.php(118): Kohana_Request->execute()
#4 {main} in F:\wamp64\vhosts\cms.local\system\classes\Kohana\Request\Client\Internal.php:79
2020-06-19 00:19:05 --- CRITICAL: Site_HTTP_Exception_404 [ 404 ]: The requested URL contact was not found on this server. ~ APPPATH\classes\HTTP\Exception.php [ 22 ] in F:\wamp64\vhosts\cms.local\system\classes\Kohana\Request\Client\Internal.php:79
2020-06-19 00:19:05 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Request\Client\Internal.php(79): HTTP_Exception::factory(404, 'The requested U...', Array)
#1 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#2 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Request.php(997): Kohana_Request_Client->execute(Object(Request))
#3 F:\wamp64\vhosts\cms.local\www\index.php(118): Kohana_Request->execute()
#4 {main} in F:\wamp64\vhosts\cms.local\system\classes\Kohana\Request\Client\Internal.php:79
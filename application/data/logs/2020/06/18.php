<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2020-06-18 22:57:37 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'feed'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 22:57:37 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 22:58:20 --- CRITICAL: Database_Exception [ 1049 ]: SQLSTATE[HY000] [1049] Unknown database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 22:58:20 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 22:58:21 --- CRITICAL: Database_Exception [ 1049 ]: SQLSTATE[HY000] [1049] Unknown database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 22:58:21 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 22:58:21 --- CRITICAL: Database_Exception [ 1049 ]: SQLSTATE[HY000] [1049] Unknown database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 22:58:21 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 22:58:21 --- CRITICAL: Database_Exception [ 1049 ]: SQLSTATE[HY000] [1049] Unknown database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 22:58:21 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:05:12 --- CRITICAL: Database_Exception [ 1049 ]: SQLSTATE[HY000] [1049] Unknown database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:05:12 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:05:13 --- CRITICAL: Database_Exception [ 1049 ]: SQLSTATE[HY000] [1049] Unknown database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:05:13 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:05:13 --- CRITICAL: Database_Exception [ 1049 ]: SQLSTATE[HY000] [1049] Unknown database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:05:13 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:05:13 --- CRITICAL: Database_Exception [ 1049 ]: SQLSTATE[HY000] [1049] Unknown database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:05:13 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:05:47 --- CRITICAL: Database_Exception [ 1049 ]: SQLSTATE[HY000] [1049] Unknown database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:05:47 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:05:48 --- CRITICAL: Database_Exception [ 1049 ]: SQLSTATE[HY000] [1049] Unknown database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:05:48 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:05:48 --- CRITICAL: Database_Exception [ 1049 ]: SQLSTATE[HY000] [1049] Unknown database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:05:48 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:05:48 --- CRITICAL: Database_Exception [ 1049 ]: SQLSTATE[HY000] [1049] Unknown database 'local_feed' ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:05:48 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:18 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:18 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:19 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:19 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:19 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:19 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:19 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:19 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:19 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:19 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:20 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:20 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:21 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:21 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:21 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:21 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:22 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:22 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:22 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:22 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:24 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:24 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:25 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:25 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:25 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:25 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:25 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:25 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:26 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:26 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:26 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:26 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:31 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:31 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:32 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:32 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:32 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:32 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:32 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:18:32 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:23:04 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:23:04 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:23:05 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:23:05 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:23:05 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:23:05 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:23:05 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:23:05 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:23:06 --- CRITICAL: Database_Exception [ 1045 ]: SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 59 ] in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
2020-06-18 23:23:06 --- DEBUG: #0 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php(136): Kohana_Database_PDO->connect()
#1 F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, Object(Database_Query_Builder_Select), false, Array)
#2 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(14): Kohana_Database_Query->execute()
#3 F:\wamp64\vhosts\cms.local\application\classes\Model\Setting.php(48): Model_Setting::load()
#4 F:\wamp64\vhosts\cms.local\application\modules\static_pages\init.php(2): Model_Setting::get('site.pages.defa...')
#5 F:\wamp64\vhosts\cms.local\system\classes\Kohana\Core.php(602): require_once('F:\\wamp64\\vhost...')
#6 F:\wamp64\vhosts\cms.local\application\bootstrap.php(161): Kohana_Core::modules(Array)
#7 F:\wamp64\vhosts\cms.local\www\index.php(102): require('F:\\wamp64\\vhost...')
#8 {main} in F:\wamp64\vhosts\cms.local\modules\database\classes\Kohana\Database\PDO.php:136
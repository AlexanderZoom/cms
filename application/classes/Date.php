<?php defined('SYSPATH') OR die('No direct access allowed.');
// Если требуется именно I18n_Date, можно подключить его явным образом:
// $f = Kohana::find_file('classes', 'I18n/Date'); if ($f) { require_once $f; class Date extends I18n_Date {}} else { class Date extends Kohana_Date {} }
class Date extends Kohana_Date {}

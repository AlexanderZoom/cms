<?php defined('SYSPATH') OR die('No direct script access.');
interface ISetting {
	public static function getTabName();
	public static function getTabDescription();
	public static function getPositionTab();
	public static function getView();
	public static function getData();
	public static function setValidatorRule(Validation $validator);
	public static function save($data);
	public static function setDefaults();
}

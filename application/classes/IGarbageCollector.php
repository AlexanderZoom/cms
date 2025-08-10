<?php defined('SYSPATH') OR die('No direct script access.');
interface IGarbageCollector{
	public static function checkRun();
	public static function Run($log);
}
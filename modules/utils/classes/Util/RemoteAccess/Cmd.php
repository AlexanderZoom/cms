<?php defined('SYSPATH') or die('No direct script access.');
abstract class Util_RemoteAccess_Cmd {
    
    abstract public function checkAuthObj($auth);
}
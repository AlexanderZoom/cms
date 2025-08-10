<?php defined('SYSPATH') OR die('No direct script access.');

class Valid extends Kohana_Valid {
    
    public static function in($value, $arr){
        if (is_array($value)){
            foreach ($value as $val){
                if (!self::in($val, $arr)) return false;
            }
            
            return true;
        }
            
        
        return in_array($value, $arr);
    }
    
    public static function check_password($value, $retypePassword){
        return (strcmp($value, $retypePassword) == 0);
    }
    
    public static function not_empty_all($value){
        $res = true;
        
        if (is_array($value) && !count($value)) $res = false;
        elseif (!is_array($value) && empty($value)) $res =  false;
        else ;
        
        
       return $res;
    }
    
}
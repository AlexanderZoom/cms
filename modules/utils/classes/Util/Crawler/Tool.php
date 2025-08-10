<?php defined('SYSPATH') or die('No direct script access.');
class Util_Crawler_Tool {
    static public function DeleteDir($path){
        if (is_dir($path) === true){
            $files = array_diff(scandir($path), array('.', '..'));
    
            foreach ($files as $file){
                self::DeleteDir(realpath($path) . DIRECTORY_SEPARATOR . $file);
            }
    
            return rmdir($path);
        }
        else if (is_file($path) === true){
            return unlink($path);
        }
    
        return false;
    }
    
    static public function generateName($length){
        $chars = 'abcdefghijklmnopqrstuvwxyz1234567890';
        $name = '';
    
        if ($length < 1) return $name;
    
        $charsLength = (strlen($chars) - 1);
        for($i = 0; $i < $length; $i++){
            $name .= $chars{rand(0, $charsLength)};
        }
    
        return $name;
    }
    
    static public function buildUrl($parts){
        return Util_Url::build($parts);
    }
    
    static public function getExtensionByMime($mime){
        return Util_Mime::getExtension($mime);
    }
    
    static public function getUUID(){
        return Util_UUID::v4();
    }
    
    static public function realisticPath($path){
        $path = explode(DIRECTORY_SEPARATOR, $path);
        $root = false;
        $i = 0;
        if ($path[0] == ''){
            $root = true;
            array_shift($path);
        }
        for (; $i < count($path); ){
            $path[$i] = trim($path[$i]);
            if (isset($path[$i]) && !$path[$i]){
                array_splice($path, $i, 1);
            }
            elseif(isset($path[$i]) && $path[$i] == '..'){
                array_splice($path, $i, 1);
                
                if ($i != 0 && isset($path[$i-1])){
                    $i--;
                    array_splice($path, $i, 1);
                }
            }
            else $i++;
            
        }
        
        if ($root) array_unshift($path, '');
        if (count($path) == 1 && $path[0] == '') $path[] = '';
        return implode(DIRECTORY_SEPARATOR, $path);
    }
    
    static public function sizeHumanReadable($bytes){
        $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
        $base = 1024;
        $class = min((int)log($bytes , $base) , count($si_prefix) - 1);
        
        return sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class];
    }
    
    /**
     * Returns an array value for a path.
     *
     * @param array  $values   The values to search
     * @param string $name     The token name
     * @param array  $default  Default if not found
     *
     * @return array
     */
    static public function getArrayValueForPath($values, $name, $default = null)
    {
    
        if (false === $offset = strpos( $name, '[' ))
        {
            return isset( $values [$name] ) ? $values [$name] : $default;
        }
    
        if (! isset( $values [substr( $name, 0, $offset )] ))
        {
            return $default;
        }
    
        $array = $values [substr( $name, 0, $offset )];
    
        while ( false !== $pos = strpos( $name, '[', $offset ) )
        {
            $end = strpos( $name, ']', $pos );
            if ($end == $pos + 1)
            {
                // reached a []
                if (! is_array( $array ))
                {
                    return $default;
                }
                break;
            } else if (! isset( $array [substr( $name, $pos + 1, $end - $pos - 1 )] ))
            {
                return $default;
            } else if (is_array( $array ))
            {
                $array = $array [substr( $name, $pos + 1, $end - $pos - 1 )];
                $offset = $end;
            } else
            {
                return $default;
            }
        }
    
        return $array;
    }
    
    /**
     * Returns true if the a path exists for the given array.
     *
     * @param array  $values  The values to search
     * @param string $name    The token name
     *
     * @return bool
     */
    static public function hasArrayValueForPath($values, $name)
    {
    
        if (false === $offset = strpos( $name, '[' ))
        {
            return array_key_exists( $name, $values );
        }
    
        if (! isset( $values [substr( $name, 0, $offset )] ))
        {
            return false;
        }
    
        $array = $values [substr( $name, 0, $offset )];
        while ( false !== $pos = strpos( $name, '[', $offset ) )
        {
            $end = strpos( $name, ']', $pos );
            if ($end == $pos + 1)
            {
                // reached a []
                return is_array( $array );
            } else if (! isset( $array [substr( $name, $pos + 1, $end - $pos - 1 )] ))
            {
                return false;
            } else if (is_array( $array ))
            {
                $array = $array [substr( $name, $pos + 1, $end - $pos - 1 )];
                $offset = $end;
            } else
            {
                return false;
            }
        }
    
        return true;
    }
    
    /**
     * Removes a path for the given array.
     *
     * @param array  $values   The values to search
     * @param string $name     The token name
     * @param mixed  $default  The default value to return if the name does not exist
     */
    static public function removeArrayValueForPath(&$values, $name, $default = null)
    {
    
        if (false === $offset = strpos( $name, '[' ))
        {
            if (isset( $values [$name] ))
            {
                $value = $values [$name];
                unset( $values [$name] );
    
                return $value;
            } else
            {
                return $default;
            }
        }
    
        if (! isset( $values [substr( $name, 0, $offset )] ))
        {
            return $default;
        }
    
        $value = &$values [substr( $name, 0, $offset )];
    
        while ( false !== $pos = strpos( $name, '[', $offset ) )
        {
            $end = strpos( $name, ']', $pos );
            if ($end == $pos + 1)
            {
                // reached a []
                if (! is_array( $value ))
                {
                    return $default;
                }
                break;
            } else if (! isset( $value [substr( $name, $pos + 1, $end - $pos - 1 )] ))
            {
                return $default;
            } else if (is_array( $value ))
            {
                $parent = &$value;
                $key = substr( $name, $pos + 1, $end - $pos - 1 );
                $value = &$value [$key];
                $offset = $end;
            } else
            {
                return $default;
            }
        }
    
        if ($key)
        {
            unset( $parent [$key] );
        }
    
        return $value;
    }
}
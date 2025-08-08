<?php defined('SYSPATH') OR die('No direct script access.');
class Modules {
    const STATUS_UNKNOWN = 'unknown';
    const STATUS_OK = 'ok';
    const STATUS_INFO_NOT_FOUND = 'info_not_found';
    const STATUS_INFO_BAD_STRUCTURE = 'info_bad_structure';
    const STATUS_SYSTEM = 'system';
    
    public static function getAccessClasses(){
        $listClasses = array();
        $listClasses[] = 'Admin_Access_Declare_Global';
        $listClasses[] = 'Admin_Access_Declare_General';
        
        $uniqClass['Admin_Access_Declare_Global'] = 0;
        $uniqClass['Admin_Access_Declare_General'] = 0;
        
        $uniqStrucName = array();
        
        foreach (self::get('admin') as $moduleName => $moduleValues){
            if ($moduleValues['status'] == self::STATUS_OK && $moduleValues['info']['enable'] &&
                isset($moduleValues['info']['access_declare_class']) && !empty($moduleValues['info']['access_declare_class'])){
                
                if (!isset($uniqClass[$moduleValues['info']['access_declare_class']])){
                	$listClasses[] = $moduleValues['info']['access_declare_class'];
                	$uniqClass[$moduleValues['info']['access_declare_class']] = 0;
                }
            }
        }
        
        //check uniq name structure
        if (count($listClasses))
        foreach ($listClasses as $class){
        	foreach($class::$structure as $struct => $structList){
        		if (!empty($uniqStrucName) &&  isset($uniqStrucName[$class::$package . '_' . $struct])){
        			throw new Admin_Exception("Auth struct name collision class {$class} class $uniqStrucName[$struct] struct {$struct}");
        		}
        		else $uniqStrucName[$class::$package . '_' . $struct] = $class;
        			
        	}
        } 
                
        return $listClasses;
    }
    
    public static function getSiteAccessClasses(){
    	$listClasses = array();
    	$listClasses[] = 'Site_Access_Declare_Global';
    	$listClasses[] = 'Site_Access_Declare_General';
    
    	$uniqClass['Site_Access_Declare_Global'] = 0;
    	$uniqClass['Site_Access_Declare_General'] = 0;
    
    	$uniqStrucName = array();
    
    	foreach (self::get('site') as $moduleName => $moduleValues){
    		if ($moduleValues['status'] == self::STATUS_OK && $moduleValues['info']['enable'] &&
    		isset($moduleValues['info']['access_site_declare_class']) && !empty($moduleValues['info']['access_site_declare_class'])){
    
    			if (!isset($uniqClass[$moduleValues['info']['access_site_declare_class']])){
    				$listClasses[] = $moduleValues['info']['access_site_declare_class'];
    				$uniqClass[$moduleValues['info']['access_site_declare_class']] = 0;
    			}
    		}
    	}
    
    	//check uniq name structure
    	if (count($listClasses))
    	foreach ($listClasses as $class){
    		foreach($class::$structure as $struct => $structList){
    			if (!empty($uniqStrucName) &&  isset($uniqStrucName[$class::$package . '_' . $struct])){
    				throw new Site_Exception("Auth struct name collision class {$class} class $uniqStrucName[$struct] struct {$struct}");
    			}
    			else $uniqStrucName[$class::$package . '_' . $struct] = $class;
    			 
    		}
    	}
    
    	return $listClasses;
    }
    
    
    public static function getSettingClasses(){
    	$listClasses = array();
    	$listClasses[] = 'Site_Setting';
    	$listClasses[] = 'Admin_Setting';
    
    
    	
    
    	foreach (self::get('admin') as $moduleName => $moduleValues){
    		if ($moduleValues['status'] == self::STATUS_OK && $moduleValues['info']['enable'] &&
    		isset($moduleValues['info']['setting_class']) && !empty($moduleValues['info']['setting_class'])){
    
    			$listClasses[] = $moduleValues['info']['setting_class'];
    			
    		}
    	}
    
    	
    
    	return $listClasses;
    }
    
    
    public static function getGarbageCollectorClasses(){
    	$listClasses = array(); 	
    	$listClasses[] = 'Admin_GarbageCollector';
    
    
    	 
    
    	foreach (self::get('admin') as $moduleName => $moduleValues){
    		if ($moduleValues['status'] == self::STATUS_OK && $moduleValues['info']['enable'] &&
    		isset($moduleValues['info']['garbage_collector_class']) && !empty($moduleValues['info']['garbage_collector_class'])){
    
    			$listClasses[] = $moduleValues['info']['garbage_collector_class'];
    			 
    		}
    	}
    
    	 
    
    	return $listClasses;
    }
    
    public static function getList4Load(){
        $list4Load = array();
        
        foreach (self::get() as $moduleName => $moduleValues){
            if ($moduleValues['status'] == self::STATUS_OK && $moduleValues['info']['enable']){
                $list4Load[$moduleName] = $moduleValues['path'];
            }
        }
        
        return $list4Load;
    }
    
    public static function get($side = 'null'){
        $modules = array();
        $dir = APPPATH . 'modules';
        
        $modulesLoaded = Kohana::modules();
        
        if (!file_exists($dir) || !is_readable($dir)) return $modules;
        
        if ($handle = opendir($dir)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $moduleName = $entry;
                    $fileInfo = $dir . DIRECTORY_SEPARATOR . $entry . DIRECTORY_SEPARATOR . 'info.php';
                    $fileInfoSide = $dir . DIRECTORY_SEPARATOR . $entry . DIRECTORY_SEPARATOR . 'info_'.$side.'.php';
                    $modules[$moduleName] = array(
                        'status' => self::STATUS_UNKNOWN,
                        'loaded' => false,
                        'info' => array(),
                        'path' => $dir . DIRECTORY_SEPARATOR . $entry,
                    );
                    
                    if (!file_exists($fileInfo) || !is_readable($fileInfo)){
                        $modules[$moduleName]['status'] = self::STATUS_INFO_NOT_FOUND;
                        continue;
                    }
                    
                    $infoSide = array();
                    if (file_exists($fileInfoSide) && is_readable($fileInfoSide)){
                    	$infoSide = include $fileInfoSide;
                    }
                    
                    $info = include $fileInfo;
                    $info = array_merge($infoSide, $info);
                    
                    

                    if (!is_array($info)){
                        $modules[$moduleName]['status'] = self::STATUS_INFO_BAD_STRUCTURE;
                        continue;
                    }
                    
                    $requireFields = array('enable', 'version', 'description');
                    foreach ($requireFields as $field){
                        if (!isset($info[$field])){
                            $modules[$moduleName]['status'] = self::STATUS_INFO_BAD_STRUCTURE;
                            break;
                        }
                    }
                    
                    if ($modules[$moduleName]['status'] != self::STATUS_UNKNOWN) continue;
                    
                    $modules[$moduleName]['status'] = self::STATUS_OK;
                    $modules[$moduleName]['info'] = $info;
                    
                    if (isset($modulesLoaded[$moduleName])) $modules[$moduleName]['loaded'] = true;
                }
            }
            
            closedir($handle);
        }
        
        foreach ($modulesLoaded as $moduleName => $path){
            if (!isset($modules[$moduleName])){
                $modules[$moduleName] = array(
                        'status' => self::STATUS_SYSTEM,
                        'loaded' => true,
                        'info' => array('enable' => true, 'version' => 'x.x.x', 'description' => ''),
                        'path' => $path,
                    );
            }
        }
        
        return $modules;
        
    }
    
    public static function getListAdminMenu(){
        $listMenu = array();
        
        
        foreach (self::get('admin') as $moduleName => $moduleValues){
            if ($moduleValues['status'] == self::STATUS_OK && $moduleValues['loaded']){
                if (isset($moduleValues['info']['admin_menu']) && $moduleValues['info']['admin_menu'] instanceof Admin_Menu){
                    $listMenu[] = $moduleValues['info']['admin_menu'];
                }
            }
        }
    
        return $listMenu;
    }
}
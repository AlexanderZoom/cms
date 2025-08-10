<?php defined('SYSPATH') OR die('No direct script access.');
class Site_Avatar {
	
	protected static $_mediaCategory = 'avatar';
	
	public static function add(Model_Site_User $user, $file, $width, $height, $cropInfo){
		$cat = self::_getMedia();
		$path = "/";
		
		$img = Image::factory($file);
		
		if ($cropInfo['x1'] < $cropInfo['x2'] && $cropInfo['y1'] < $cropInfo['y2']){
			$crWidth = $cropInfo['x2'] - $cropInfo['x1'];
			$crHeight = $cropInfo['y2']-$cropInfo['y1'];
			$crOffsetX = $cropInfo['x1'];
			$crOffsetY = $cropInfo['y1'];			
			
			$img->crop($crWidth,  $crHeight, $crOffsetX, $crOffsetY);
		}
		
		$img->resize($width, $height);
		$img->save($file, 100);
		
		if ($img->type == IMAGETYPE_PNG){
			$image = imagecreatefrompng($file);
			imagejpeg($image, $file, 100);
			imagedestroy($image);
		}		
		
		if (self::get($user)) $cat->delete($path . "{$user->id}.jpg");
		
		$res = $cat->add($path, "{$user->id}.jpg", $file);
	}
	
	public static function addTemp(Model_Site_User $user, $file){
		$cat = self::_getMedia();
		$path = "/";
		$name = "temp_{$user->id}.jpg";
	
	
	
		$img = Image::factory($file);
	
		if ($img->type == IMAGETYPE_PNG){
			$image = imagecreatefrompng($file);
			imagejpeg($image, $file, 100);
			imagedestroy($image);
		}
			
	
		if (self::get($user, true)) $cat->delete($path . $name);
	
		$res = $cat->add($path, $name, $file, Model_Media_Storage_File::FILE_STATUS_TEMP);
	}
	
	public static function get(Model_Site_User $user, $isTemp = false, $isSysPath=false){
		if (!$user->loaded()) return '';
		
		$out = array();
		
		$cat = self::_getMedia();
		$path = "/{$user->id}.jpg";
		if ($isTemp) $path = "/temp_{$user->id}.jpg";
		try{
			$out = $cat->getinfo($path, false);
		}
		catch(Media_Storage_Exception_Category_FileNotFound $e){
			;
		}
		
		if ($isSysPath){
			if (isset($out['RealSysPath'])) return $out['RealSysPath'];
		}
		else {
			if (isset($out['RealPath'])) return $out['RealPath'];
		}
		
		return '';
	}
	
	public static function delete(Model_Site_User $user, $isTemp = false){
		if (!$user->loaded()) return '';
		
		$path = "/{$user->id}.jpg";
		if ($isTemp) $path = "/temp_{$user->id}.jpg";
		
		$cat = self::_getMedia();
		$cat->delete($path);
	}
	
	protected static function _getMedia(){
		return Media_Storage_Category::findByCode(self::$_mediaCategory);
	}
}
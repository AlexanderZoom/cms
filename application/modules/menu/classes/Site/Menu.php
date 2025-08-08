<?php
class Site_Menu {
	
	protected static $_cache = null;
	protected static $_menuRootName = null;
	protected static $_childPrefixName  = null;
	
	public static function get($menuRootName = null, $childPrefixName = '-'){
		if (is_null(self::$_cache)){
			self::$_menuRootName = $menuRootName;
			self::$_childPrefixName = $childPrefixName;			
			self::$_cache = self::_build();
			self::$_menuRootName = null;
			self::$_childPrefixName = null;
		}
		
		return self::$_cache;
				
	}
	
	protected static function _build($level=0, $parent = null, $childs = array()){
		$tree = array();
		$paths = array();
		
		
		if ($level == 0){
			$parentIds = array();
			$menu = ORM::factory('Site_Menu');
			$menu = $menu	->order_by('parent', 'asc')
			->order_by('position', 'asc')
			->order_by('name', 'asc')
			->find_all();

			foreach ($menu as $item){
				if (!$item->parent){
					if (!is_null(self::$_menuRootName) && self::$_menuRootName != $item->name) continue;
			
					$item_t = array(
							'id' => $item->id,
							'name' => $item->name,
							'name_prefix' => $item->name,
							'url'  => $item->url,
							'target' => $item->target,
							'parent_id' => $item->parent,
							'position' => $item->position,
							'path' => '/' . $item->position . '-' . $item->name,							
							'child' => array()
					);
					
					$tree[] = $item_t;			
					$paths[$item_t['path']] = $item_t;
			
				}
				else {
					if (!isset($childs[$item->parent])){
						$childs[$item->parent] = array();
					}
			
					$childs[$item->parent][] = $item;
				}
			}
			
			foreach ($tree as $idx => $item){
				if (isset($childs[$item['id']])){
					
					$res = self::_build($level + 1, $item, $childs);
										
					$tree[$idx]['child'] = $res['tree'];
					$paths = array_merge($paths, $res['line']);
				}
			}
		}
		else{
			$idxTree = 0;
			foreach ($childs[$parent['id']] as $idx =>$item){
				
					
			
						$item_t = array(
								'id' => $item->id,
								'name' => $item->name,
								'name_prefix' => str_repeat(self::$_childPrefixName, $level) . $item->name,
								'url'  => $item->url,
								'parent_id' => $item->parent,
								'position' => $item->position,
								'target' => $item->target,
								'path' => $parent['path'] .'/' . $item->position . '-' . $item->name,								
								'child' =>array()
						);

						
						$tree[$idxTree] = $item_t;
						$paths[$item_t['path']] = $item_t;
						
						if (isset($childs[$item_t['id']])){
							$res = self::_build($level + 1, $item_t, $childs);
							$tree[$idxTree]['child'] = $res['tree'];
							$paths = array_merge($paths, $res['line']);
						}
						
						$idxTree++;
					
				
			}
		}
		
		
		ksort($paths, SORT_NATURAL);
		return array('tree' => $tree, 'line' => $paths);
	}
}
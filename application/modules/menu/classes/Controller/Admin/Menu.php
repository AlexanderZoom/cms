<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Admin_Menu extends Controller_Admin {

	
	
    public function action_index(){
        
        $search = !empty($_REQUEST['search']) ? $_REQUEST['search'] : ''; $search = trim($search);
         
        $this->template->title[] = 'Menu';
        $this->template->content = View::factory('admin/menu_index');
        $this->template->content->pagination = '';
        
        
        
        $menu = Site_Menu::get();
        $this->template->content->menus = $menu['line'];
        
        
    }
    
    public function action_create(){
    	$this->_checkAccess(Admin_Access::ACCESS_CREATE);
    	$fields = array('name' => '', 'url' => '', 'target' => '', 'parent' => '', 'position' => '');
    	$data = $this->_initFormData($fields, $_REQUEST);
    
    	
    	$errors = array();
    	if (isset($_REQUEST['save'])){
    		
    
    
    		$postValidator = Validation::factory($data);
    		$postValidator->label('name', 'Name');
    		$postValidator->label('url', 'Url');
    		$postValidator->label('target', 'Target');
    		$postValidator->label('parent', 'Parent');
    		$postValidator->label('position', 'Position');
    		
    
    		$postValidator->rule('name', 'not_empty');
    		$postValidator->rule('url', 'not_empty');
    		$postValidator->rule('target', 'not_empty');
    		$postValidator->rule('position', 'not_empty');
    		
    
    		if ($postValidator->check()){
    
    			try {
    				$menu = new Model_Site_Menu();
    				$menu->name = $data['name'];
    				$menu->url = $data['url'];
    				$menu->target = $data['target'];
    				$menu->parent = $data['parent'] == 'null' ? null : $data['parent'];
    				$menu->position = $data['position'];
    				$menu->save();
    				
    				$this->_addAudit(Admin_Audit::TYPE_ADD, "Menu {$menu->name}");
    			}
    			catch (Database_Exception $e){
    				if ($e->getCode() == 23000) $errors['name'] = ___('Menu exists');
    				else throw $e;
    			}
    			catch (ORM_Validation_Exception $e){
    				$errors = $e->errors('menu');
    			}
    
    			if (!count($errors)){
    
    				$this->setFlashNotice('Menu added');
    				$this->redirect(
    						URL::site(Route::url('admin', array('controller'=>'menu', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    			}
    		}
    		else $errors = $postValidator->errors('valid');
    		 
    	}
    
    	$optionForm = array(
    			'errors' => $errors,
    			'data'   => $data,
    	);
    
    	$this->_form($optionForm);
    
    }
    
    public function action_edit(){
    	$id = !empty($_REQUEST['checked'][0]) ? $_REQUEST['checked'][0] : 0;
    	if (!$id){
    		$this->setFlashError('Menu Id not found');
    		$this->redirect(URL::site(Route::url('admin', array('controller'=>'menu', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    	}
    
    	$menu = ORM::factory('Site_Menu')->where('id', '=', $id)->find();
    	if (!$menu->loaded()){
    		$this->setFlashError('Menu not found');
    		$this->redirect(URL::site(Route::url('admin', array('controller'=>'menu', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    	}
    
    	$errors = array();
    	$fields = array('name' => '', 'url' => '', 'target' => '', 'parent' => '', 'position' => '');
    	
    	$menuData = $this->_initFormData($fields, array(
    			'name' => $menu->name,
    			'url'  => $menu->url,
    			'target' => $menu->target,
    			'parent' => $menu->parent,
    			'position' => $menu->position
    	));
    
    
    	
    
    	$data = $menuData;
    	$data = $this->_initFormData($fields, $_REQUEST, $data);
    
    
    
    	if (isset($_REQUEST['save'])){
    		$this->_checkAccess(Admin_Access::ACCESS_MODIFY);
    		 
    		
    		$dataSave = array();
    		foreach ($data as $key => $value){
    			if ($value != $menuData[$key]) $dataSave[$key] = $value;
    		}
    
    
    		$postValidator = Validation::factory($data);
    		
    		foreach ($dataSave as $key => $value){
    			switch ($key){
    				case 'name' :
    					$postValidator->label('name', 'Name');
    					$postValidator->rule('name', 'not_empty');
    					break;
    
    				case 'position' :
    					$postValidator->label('position', 'Position');
    					$postValidator->rule('position', 'not_empty');
    					break;
    					
    				case 'url' :
    					$postValidator->label('url', 'Url');
    					$postValidator->rule('url', 'not_empty');
    					break;
    					
    				case 'target' :
    					$postValidator->label('target', 'Target');
    					$postValidator->rule('target', 'not_empty');
    					break;
    
    				
    			}
    		}
    		 
    
    		if ($postValidator->check()){
    
    			try {
    				foreach ($dataSave as $key => $value){
    					switch ($key){
    						case 'name' :
    							$menu->name = $dataSave['name'];
    							break;
    
    						case 'url' :
    							$menu->url = $dataSave['url'];
    							break;
    							
    						case 'target' :
    							$menu->target = $dataSave['target'];
    							break;
    							
    						case 'position' :
    							$menu->position = $dataSave['position'];
    							break;
    							
    						case 'parent' :
    							$menu->parent = $dataSave['parent'] == 'null' ? null : $dataSave['parent'];
    							break;
    					}
    				}
    
    				$menu->save();
    				
    				$this->_addAudit(Admin_Audit::TYPE_EDIT, "Menu {$menu->name}");
    			}
    			catch (Database_Exception $e){
    				if ($e->getCode() == 23000) $errors['name'] = ___('Menu exists');
    				else throw $e;
    			}
    			catch (ORM_Validation_Exception $e){
    				$errors = $e->errors('menu');
    			}
    
    			if (!count($errors)){
    
    				$this->setFlashNotice('Menu edited');
    				$this->redirect(
    						URL::site(Route::url('admin', array('controller'=>'menu', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    			}
    		}
    		else $errors = $postValidator->errors('valid');
    
    
    	}
    	else {
    		$data = $this->_initFormData($fields, $menuData ,$_REQUEST);
    	}
    
    	$data['id'] = $id;
    	$optionForm = array(
    			'errors' => $errors,
    			'data'   => $data,
    
    	);
    
    	$this->_form($optionForm);
    
    	//print_r($_REQUEST[checked]);
    }
    
    
    
    public function action_delete(){
    	$this->_checkAccess(Admin_Access::ACCESS_DELETE);
    
    	$ids = 0;
    	if (!empty($_REQUEST['checked']) && is_array($_REQUEST['checked']) && count($_REQUEST['checked'])){
    		$ids = $_REQUEST['checked'];
    		$cnt = count($_REQUEST['checked']);
    		$menuArr = Site_Menu::get();
    		$paths = array();
    		//get all path for selected tree
    		foreach ($ids as $id){
    			foreach ($menuArr['line'] as $menu){
    				if ($menu['id'] == $id) $paths[] = $menu['path'];
    			}
    		}
    		//get all sub menu
    		foreach ($paths as $path){
    			foreach ($menuArr['line'] as $menu){
    				if (strpos($menu['path'], $path) !== FALSE) $ids[] = $menu['id'];
    			}
    			
    		}
    		
    		
    		$menus = ORM::factory('Site_Menu')->where('id', 'in', $ids)->find_all();
			foreach ($menus as $menu){
				$this->_addAudit(Admin_Audit::TYPE_DELETE, "Menu {$menu->name}");
				$menu->delete();
			}
    		$this->setFlashNotice(($cnt == 1 ? 'Menu deleted' : 'Menu deleted'));
    
    	}
    	else $this->setFlashNotice('Menu Id not found');
    
    	
    	
    	$this->redirect(
    			URL::site(Route::url('admin', array('controller'=>'menu', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    }
    
    protected function _form($options = array()){
    	extract($options);
    
    	if (count($errors)) $this->setFlashError('Some fields were filled with error');
    	$this->template->title[] = isset($data['id']) ? 'Edit Menu' : 'Create Menu';
    	$this->template->content = View::factory('admin/menu_form');
    	$this->template->content->errors = $errors;
    	$this->template->content->data = $data;
    	$this->template->content->menu = Site_Menu::get();
    	$this->template->content->target = array('self', 'blank', 'parent');

    	$this->_setDefaultVariablesToTemplate($this->template->content);
    
    }
    
    
    protected function _breadcrumbs(){
    	$lst = parent::_breadcrumbs();
    	$lst[] = array(
    			'icon' => 'fa fa-bars',
    			'name' => 'Menu',
    			'url'  => URL::site(Route::url('admin', array('controller'=>'menu', 'lang' => $this->getLanguage(), 'action'=>'index')))
    	);
    
    
    	return $lst;
    }
    
}
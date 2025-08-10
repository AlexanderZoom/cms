<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Admin_Settings extends Controller_Admin {

    public function action_index(){
        $this->template->content = View::factory('admin/settings');
        $this->template->title[] = 'Settings';
        
        $settingClassArr = Modules::getSettingClasses();
        
        $settingClassArrSorted = array(
        		
        );
        
        foreach ($settingClassArr as $class){
        	$key = $class::getPositionTab() . '_'  . ___($class::getTabName());
        	$settingClassArrSorted[$key] = array('view' => View::factory($class::getView()), 'class' => $class);
        	$class::setDefaults();
        }
        
        ksort($settingClassArrSorted, SORT_NATURAL);
        
        $this->template->content->post = Model_Setting::getAll();
        $this->template->content->setting_classes = $settingClassArrSorted;
        
        foreach ($settingClassArrSorted as $keyArr => $dataArr){
        	$dataArr['view']->post = array_merge($dataArr['class']::getData(), $this->template->content->post);
        }
        
        if (isset($_POST['save'])){
            $this->_checkAccess(Admin_Access::ACCESS_MODIFY);
            
            $post = Arr::map('trim', $this->request->post());
            foreach ($post as $key => $val){
            	$key = str_replace('#', '.', $key);
            	$post[$key] = $val;
            }
            
            
            $this->template->content->post = $post;
            foreach ($settingClassArrSorted as $keyArr => $dataArr){
            	$dataArr['view']->post = array_merge($dataArr['class']::getData(), $this->template->content->post);
            }
            
            
            $postValidator = Validation::factory($post);
            foreach ($settingClassArrSorted as $keyArr => $dataArr){
            	$dataArr['class']::setValidatorRule($postValidator);
            }
            
            if ($postValidator->check()){
            	foreach ($settingClassArrSorted as $keyArr => $dataArr){
            		$dataArr['class']::save($post);
            	}                
                $this->template->content->success = true;
            }
            else{
            	
            	$this->template->content->errors = $postValidator->errors('valid');
            	foreach ($settingClassArrSorted as $keyArr => $dataArr){
            		$dataArr['view']->errors = $this->template->content->errors;
            	}
            }
            
            if (isset($this->template->content->errors)){
                $this->setFlashError('Some fields were filled with error');
            }
            
            if (isset($this->template->content->success)){
            	$this->_addAudit(Admin_Audit::TYPE_EDIT, "Settings");
                $this->setFlashNotice('Changes have been saved');
            }
            
        }
        
    }
    
    protected function _breadcrumbs(){
    	$lst = parent::_breadcrumbs();
    	$lst[] = array(
    			'icon' => 'fa fa-cogs',
    			'name' => 'Settings',
    			'url'  => URL::site(Route::url('admin', array('controller'=>'settings', 'lang' => $this->getLanguage(), 'action'=>'index')))
    	);
    
    	 
    	return $lst;
    }
}
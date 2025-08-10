<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Admin_Pages extends Controller_Admin {

	public function before()
	{
		if ($this->_getAction() == 'mceinit') $this->template = 'admin/main_plain';
		 
		parent::before();
	}
	
    public function action_index(){
        
        $search = !empty($_REQUEST['search']) ? $_REQUEST['search'] : ''; $search = trim($search);
         
        $this->template->title[] = 'Pages';
        $this->template->content = View::factory('admin/static_pages_index');
        $this->template->content->pagination = '';
        
        $itemOnPage = Kohana::$config->load('admin.item_on_page');
        $page = Arr::get($_GET, 'page', 1);
        
        $modelWithRights = $this->getQueryRights(Admin_Access::ACCESS_VIEW, 'index');
        if (!$modelWithRights) new Admin_Exception(500, 'Model for pages not found from access rights');
        
        if ($search) $modelWithRights->where('title', 'LIKE', "%{$search}%");
        
        $modelWithRights2 = clone $modelWithRights;
        
        
        $pagesTotal = $modelWithRights->count_all();
        
        $widgetDataClass = new Admin_Widget_Data();
        
        $optUrl = URL::site(Route::url('admin', array('controller' => 'pages', 'lang'=> $this->getLanguage())));
        if ($search) $optUrl = Util_Url::addParameter($optUrl, array('search' => $search));
        
        $options = array(
        		'url' => $optUrl,
        		'total' => $pagesTotal,
        		'page'  => $page,
        		'pages' => 5,
        		'data_class' => $widgetDataClass
        );
        
        $pagination = $this->getWidget('Pagination', $options);
        $this->template->content->pagination = $pagination->execute();
        $widgetData = $widgetDataClass->get();
        
        $page = Arr::get($widgetData, 'page', 1);
        
        
        $pages = $modelWithRights2->limit($itemOnPage);
        if ( ($page -1) >0) $pages->offset(($page -1) * $itemOnPage);
        $pages = $pages->find_all();
        
        
        $this->template->content->pages = $pages;
        
        $searchUrl = URL::site(Route::url('admin', array('controller' => 'pages', 'lang'=> $this->getLanguage(), 'action'=> 'index' )));
        $searchUrlParams = array('search' => '');
        $searchUrl = Util_Url::addParameter($searchUrl, $searchUrlParams);
        
        $this->template->content->searchUrl = $searchUrl;
        $this->template->content->search = htmlspecialchars($search);
    }
    
    public function action_create(){
    	$this->_checkAccess(Admin_Access::ACCESS_CREATE);
    	$fields = array('title' => '', 'slug' => '', 'text' => '', 'published_at' => '');
    	$data = $this->_initFormData($fields, $_REQUEST);
    
    	if (!$data['published_at']) $data['published_at'] = date('Y-m-d H:i:s', time());
    	
    	$errors = array();
    	if (isset($_REQUEST['save'])){
    		
    
    
    		$postValidator = Validation::factory($data);
    		$postValidator->label('title', 'Title');
    		$postValidator->label('slug', 'Slug');
    		$postValidator->label('text', 'Text');
    		$postValidator->label('published_at', 'Published At');
    		
    
    		$postValidator->rule('title', 'not_empty');
    		//$postValidator->rule('slug', '');
    		$postValidator->rule('text', 'not_empty');
    		//$postValidator->rule('published_at', );
    		
    
    		if ($postValidator->check()){
    
    			try {
    				$page = new Model_Site_Page();
    				$page->title = $data['title'];
    				$page->slug = $data['slug'];
    				$page->text = $data['text'];
    				$page->published_at = $data['published_at'] ? $data['published_at'] : 'NULL';    				
    				$page->save();
    				
    				$this->_addAudit(Admin_Audit::TYPE_ADD, "Pages {$page->title}");
    			}
    			catch (Database_Exception $e){
    				if ($e->getCode() == 23000) $errors['slug'] = ___('Slug exists');
    				else throw $e;
    			}
    			catch (ORM_Validation_Exception $e){
    				$errors = $e->errors('page');
    			}
    
    			if (!count($errors)){
    
    				$this->setFlashNotice('Page added');
    				$this->redirect(
    						URL::site(Route::url('admin', array('controller'=>'pages', 'lang' => $this->getLanguage(), 'action'=>'index'))));
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
    		$this->setFlashError('Page Id not found');
    		$this->redirect(URL::site(Route::url('admin', array('controller'=>'pages', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    	}
    
    	$page = ORM::factory('Site_Page')->where('id', '=', $id)->find();
    	if (!$page->loaded()){
    		$this->setFlashError('Page not found');
    		$this->redirect(URL::site(Route::url('admin', array('controller'=>'pages', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    	}
    
    	$errors = array();
    	$fields = array('title' => '', 'slug' => '', 'text' => '', 'published_at' => '');
    	
    	$userData = $this->_initFormData($fields, array(
    			'title' => $page->title,
    			'slug'  => $page->slug,
    			'text' => $page->text,
    			'published_at' => $page->published_at
    	));
    
    
    	
    
    	$data = $userData;
    	$data = $this->_initFormData($fields, $_REQUEST, $data);
    
    
    
    	if (isset($_REQUEST['save'])){
    		$this->_checkAccess(Admin_Access::ACCESS_MODIFY);
    		 
    		
    		$dataSave = array();
    		foreach ($data as $key => $value){
    			if ($value != $userData[$key]) $dataSave[$key] = $value;
    		}
    
    
    		$postValidator = Validation::factory($data);
    
    		foreach ($dataSave as $key => $value){
    			switch ($key){
    				case 'title' :
    					$postValidator->label('title', 'Title');
    					$postValidator->rule('title', 'not_empty');
    					break;
    
    				case 'text' :
    					$postValidator->label('text', 'Text');
    					$postValidator->rule('text', 'not_empty');
    					break;
    
    				
    			}
    		}
    		 
    
    		if ($postValidator->check()){
    
    			try {
    				foreach ($dataSave as $key => $value){
    					switch ($key){
    						case 'title' :
    							$page->title = $dataSave['title'];
    							break;
    
    						case 'slug' :
    							$page->slug = $dataSave['slug'];
    							break;
    							
    						case 'text' :
    							$page->text = $dataSave['text'];
    							break;
    							
    						case 'published_at' :
    							$page->published_at = $dataSave['published_at'];
    							break;
    					}
    				}
    
    				$page->save();
    				
    				$this->_addAudit(Admin_Audit::TYPE_EDIT, "Pages {$page->title}");
    			}
    			catch (Database_Exception $e){
    				if ($e->getCode() == 23000) $errors['slug'] = ___('Slug exists');
    				else throw $e;
    			}
    			catch (ORM_Validation_Exception $e){
    				$errors = $e->errors('page');
    			}
    
    			if (!count($errors)){
    
    				$this->setFlashNotice('Page edited');
    				$this->redirect(
    						URL::site(Route::url('admin', array('controller'=>'pages', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    			}
    		}
    		else $errors = $postValidator->errors('valid');
    
    
    	}
    	else {
    		$data = $this->_initFormData($fields, $userData ,$_REQUEST);
    	}
    
    	$data['id'] = $id;
    	$optionForm = array(
    			'errors' => $errors,
    			'data'   => $data,
    
    	);
    
    	$this->_form($optionForm);
    
    	//print_r($_REQUEST[checked]);
    }
    
    public function action_setmain(){
    	$this->_checkAccess(Admin_Access::ACCESS_MODIFY);
    	
    	$pageOrm = ORM::factory('Site_Page');
    	$pageOrm->table_name();
    	
    	if (!empty($_REQUEST['checked']) && is_array($_REQUEST['checked']) && count($_REQUEST['checked'])){
	    	$query = DB::update($pageOrm->table_name())
	    	->set(array('main' => 0));
	    	
	    	$query->execute();
	    	
	    	
	    	$query = DB::update($pageOrm->table_name())
	    	->set(array('main' => 1))->where('id', '=', $_REQUEST['checked'][0]);
	    	$query->execute();
	    	
	    	$this->_addAudit(Admin_Audit::TYPE_EDIT, "Pages Set main id {$_REQUEST['checked'][0]}");
	    	$this->setFlashNotice('Main page was set');
    	}
    	else $this->setFlashNotice('Main page Id not found');
    	
    	$this->redirect(
    			URL::site(Route::url('admin', array('controller'=>'pages', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    }
    
    public function action_delete(){
    	$this->_checkAccess(Admin_Access::ACCESS_DELETE);
    
    	$ids = 0;
    	if (!empty($_REQUEST['checked']) && is_array($_REQUEST['checked']) && count($_REQUEST['checked'])){
    		$ids = $_REQUEST['checked'];
    		$cnt = count($_REQUEST['checked']);
    		$pages = ORM::factory('Site_Page')->where('id', 'in', $ids)->find_all();
			foreach ($pages as $page){
				$this->_addAudit(Admin_Audit::TYPE_DELETE, "Pages {$page->title}");
				$page->delete();
			}
    		$this->setFlashNotice(($cnt == 1 ? 'Page deleted' : 'Pages deleted'));
    
    	}
    	else $this->setFlashNotice('User Id not found');
    
    	$this->redirect(
    			URL::site(Route::url('admin', array('controller'=>'pages', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    }
    
    protected function _form($options = array()){
    	extract($options);
    
    	if (count($errors)) $this->setFlashError('Some fields were filled with error');
    	$this->template->title[] = isset($data['id']) ? 'Edit Page' : 'Create Page';
    	$this->template->content = View::factory('admin/static_pages_form');
    	$this->template->content->errors = $errors;
    	$this->template->content->data = $data;
    	$this->_setDefaultVariablesToTemplate($this->template->content);
    
    }
    
    
    protected function _breadcrumbs(){
    	$lst = parent::_breadcrumbs();
    	$lst[] = array(
    			'icon' => 'fa fa-font',
    			'name' => 'Pages',
    			'url'  => URL::site(Route::url('admin', array('controller'=>'pages', 'lang' => $this->getLanguage(), 'action'=>'index')))
    	);
    
    
    	return $lst;
    }
    
    public function action_mceinit(){
    	$this->template->content = View::factory('admin/static_pages_mce');
    }
    
    protected function _js(){
    	return array('/admin-content/lib/tinymce/tinymce.min.js',
    				 URL::site(Route::url('admin', array('controller'=>'pages', 'lang' => $this->getLanguage(), 'action'=>'mceinit')))
    	);
    }
}
<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Admin_EmailTemplate extends Controller_Admin {

	public function before()
	{
		if ($this->_getAction() == 'mceinit') $this->template = 'admin/main_plain';
		 
		parent::before();
	}
	
    public function action_index(){
        
        $search = !empty($_REQUEST['search']) ? $_REQUEST['search'] : ''; $search = trim($search);
         
        $this->template->title[] = 'Email Template';
        $this->template->content = View::factory('admin/email_template_index');
        $this->template->content->pagination = '';
        
        $itemOnPage = Kohana::$config->load('admin.item_on_page');
        $page = Arr::get($_GET, 'page', 1);
        
        $modelWithRights = $this->getQueryRights(Admin_Access::ACCESS_VIEW, 'index');
        if (!$modelWithRights) new Admin_Exception(500, 'Model for email template not found from access rights');
        
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
        
        $searchUrl = URL::site(Route::url('admin', array('controller' => 'emailTemplate', 'lang'=> $this->getLanguage(), 'action'=> 'index' )));
        $searchUrlParams = array('search' => '');
        $searchUrl = Util_Url::addParameter($searchUrl, $searchUrlParams);
        
        $this->template->content->searchUrl = $searchUrl;
        $this->template->content->search = htmlspecialchars($search);
    }
    
    public function action_create(){
    	$this->_checkAccess(Admin_Access::ACCESS_CREATE);
    	$fields = array('title' => '', 'name' => '', 'text' => '');
    	$data = $this->_initFormData($fields, $_REQUEST);
    
    	
    	$errors = array();
    	if (isset($_REQUEST['save']) || isset($_REQUEST['savetest'])){
    		
    
    
    		$postValidator = Validation::factory($data);
    		$postValidator->label('title', 'Title');
    		$postValidator->label('name', 'Name');
    		$postValidator->label('text', 'Text');
    		
    
    		$postValidator->rule('title', 'not_empty');
    		$postValidator->rule('name', 'not_empty');
    		$postValidator->rule('text', 'not_empty');
    		//$postValidator->rule('published_at', );
    		
    
    		if ($postValidator->check()){
    
    			try {
    				$page = new Model_Site_EmailTemplate();
    				$page->title = $data['title'];
    				$page->name = $data['name'];
    				$page->text = $data['text'];
    				  				
    				$page->save();
    				
    				$this->_addAudit(Admin_Audit::TYPE_ADD, "EmailTemplate {$page->title}");
    			}
    			catch (Database_Exception $e){
    				if ($e->getCode() == 23000) $errors['name'] = ___('Name exists');
    				else throw $e;
    			}
    			catch (ORM_Validation_Exception $e){
    				$errors = $e->errors('page');
    			}
    
    			if (!count($errors)){
    
    				$this->setFlashNotice('Email template added');
    				if (isset($_REQUEST['savetest'])){
    					
    					$mailParams = Site_EmailTemplate::initParams(array(
    							'%username%' => 'Тестер Тестерович',
    							'%login%' => 'test',
    							'%password%' => '55674567',
    							'%verification_url%' => 'http://localhost',
    					));
    						
    					Site_EmailTemplate::send($page, $mailParams);
    					
    					$urlParam = array('checked[]' => $page->id);
    					$url = URL::site(Route::url('admin', array('controller'=>'emailTemplate', 'lang' => $this->getLanguage(), 'action'=>'edit')));
    					$url = Util_Url::addParameter($url, $urlParam);
    					$this->redirect($url);
    				}    					
    				else	
    				$this->redirect(
    						URL::site(Route::url('admin', array('controller'=>'emailTemplate', 'lang' => $this->getLanguage(), 'action'=>'index'))));
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
    		$this->setFlashError('Email template Id not found');
    		$this->redirect(URL::site(Route::url('admin', array('controller'=>'emailTemplate', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    	}
    
    	$page = ORM::factory('Site_EmailTemplate')->where('id', '=', $id)->find();
    	if (!$page->loaded()){
    		$this->setFlashError('Email template not found');
    		$this->redirect(URL::site(Route::url('admin', array('controller'=>'emailTemplate', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    	}
    
    	$errors = array();
    	$fields = array('title' => '', 'text' => '', 'name' => '');
    	
    	$userData = $this->_initFormData($fields, array(
    			'title' => $page->title,
    			'name'  => $page->name,
    			'text' => $page->text,    			
    	));
    
    
    	
    
    	$data = $userData;
    	$data = $this->_initFormData($fields, $_REQUEST, $data);
    
    
    
    	if (isset($_REQUEST['save']) || isset($_REQUEST['savetest'])){
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
    					
    				case 'name' :
    					$postValidator->label('name', 'Name');
    					$postValidator->rule('name', 'not_empty');
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
    
    						case 'name' :
    							$page->name = $dataSave['name'];
    							break;
    							
    						case 'text' :
    							$page->text = $dataSave['text'];
    							break;
    							
    						
    					}
    				}
    
    				$page->save();
    				$this->_addAudit(Admin_Audit::TYPE_EDIT, "EmailTemplate {$page->title}");
    			}
    			catch (Database_Exception $e){
    				if ($e->getCode() == 23000) $errors['name'] = ___('Name exists');
    				else throw $e;
    			}
    			catch (ORM_Validation_Exception $e){
    				$errors = $e->errors('email template');
    			}
    
    			if (!count($errors)){
    
    				$this->setFlashNotice('Email template edited');
    				if (isset($_REQUEST['savetest'])){
    					
    					$mailParams = Site_EmailTemplate::initParams(array(
    						'%username%' => 'Тестер Тестерович',
    						'%login%' => 'test',
    						'%password%' => '55674567',
    						'%verification_url%' => 'http://localhost',
    					));
    					
    					Site_EmailTemplate::send($page, $mailParams);
    					
    					
    					$urlParam = array('checked[]' => $page->id);
    					$url = URL::site(Route::url('admin', array('controller'=>'emailTemplate', 'lang' => $this->getLanguage(), 'action'=>'edit')));
    					$url = Util_Url::addParameter($url, $urlParam);
    					$this->redirect($url);
    				}
    				else
    				$this->redirect(
    						URL::site(Route::url('admin', array('controller'=>'emailTemplate', 'lang' => $this->getLanguage(), 'action'=>'index'))));
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
    
    
    
    public function action_delete(){
    	$this->_checkAccess(Admin_Access::ACCESS_DELETE);
    
    	$ids = 0;
    	if (!empty($_REQUEST['checked']) && is_array($_REQUEST['checked']) && count($_REQUEST['checked'])){
    		$ids = $_REQUEST['checked'];
    		$cnt = count($_REQUEST['checked']);
    		$pages = ORM::factory('Site_EmailTemplate')->where('id', 'in', $ids)->find_all();
			foreach ($pages as $page){
				$this->_addAudit(Admin_Audit::TYPE_DELETE, "EmailTemplate {$page->title}");
				$page->delete();
			}
    		$this->setFlashNotice(($cnt == 1 ? 'Email template deleted' : 'Email template deleted'));
    
    	}
    	else $this->setFlashNotice('Email template not found');
    
    	$this->redirect(
    			URL::site(Route::url('admin', array('controller'=>'emailTemplate', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    }
    
    protected function _form($options = array()){
    	extract($options);
    
    	if (count($errors)) $this->setFlashError('Some fields were filled with error');
    	$this->template->title[] = isset($data['id']) ? 'Email Template' : 'Email Template';
    	$this->template->content = View::factory('admin/email_template_form');
    	$this->template->content->errors = $errors;
    	$this->template->content->data = $data;
    	$this->_setDefaultVariablesToTemplate($this->template->content);
    
    }
    
    
    protected function _breadcrumbs(){
    	$lst = parent::_breadcrumbs();
    	$lst[] = array(
    			'icon' => 'fa fa-file-code-o',
    			'name' => 'Email Template',
    			'url'  => URL::site(Route::url('admin', array('controller'=>'emailTemplate', 'lang' => $this->getLanguage(), 'action'=>'index')))
    	);
    
    
    	return $lst;
    }
    
    public function action_mceinit(){
    	$this->template->content = View::factory('admin/email_template_mce');
    }
    
    protected function _js(){
    	return array('/admin-content/lib/tinymce/tinymce.min.js',
    				 URL::site(Route::url('admin', array('controller'=>'emailTemplate', 'lang' => $this->getLanguage(), 'action'=>'mceinit')))
    	);
    }
}
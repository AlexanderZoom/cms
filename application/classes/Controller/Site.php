<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Site extends Controller_Template {
	public $template = 'site/main';
	protected $templateNoAuth = 'site/main';
	protected $templateAjax = 'site/main_ajax';
	protected $ajaxMethods = array();

	
	/**
	 * On|Off check access
	 * @var unknown
	 */
	protected $authCheck = true;
	
	protected $i18nAdvFile = array();
	
	
	
	/**
	 * Executes the given action and calls the [Controller::before] and [Controller::after] methods.
	 *
	 * Can also be used to catch exceptions from actions in a single place.
	 *
	 * 1. Before the controller action is called, the [Controller::before] method
	 * will be called.
	 * 2. Next the controller action will be called.
	 * 3. After the controller action is called, the [Controller::after] method
	 * will be called.
	 *
	 * @throws  HTTP_Exception_404
	 * @return  Response
	*/
	public function execute()
	{
		$mainTemplateDir = APPPATH . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR;
 		if (Kohana_Core::$_paths[0] != $mainTemplateDir) array_unshift(Kohana_Core::$_paths, $mainTemplateDir);
 		
		Site_Language::init($this->i18nAdvFile);
	
		
		$this->_checkAccess();
	
		 
		// Execute the "before action" method
		try {
			$this->before();
		}
		catch (Exception $e){
			if (strpos(get_class($e), 'HTTP_Exception_') !== FALSE && $e->getCode() >=300 && $e->getCode() <= 307) throw $e;
			else throw new Site_Exception(' ' . $e, NULL, $e);
		}
		 
		 
		$this->template->content = '';
		if ($this->_is_ajax()) $this->template->content = new Site_Ajax();		
		 
		
		$this->template->title = array();
		if (Model_Setting::get('site.main.name')) $this->template->title[] = Model_Setting::get('site.main.name');
		
		$this->template->title_separator   = Model_Setting::get('site.main.name_separator');
		$this->template->title_description =  Model_Setting::get('site.main.description');
		$this->template->title_keyword     =  Model_Setting::get('site.main.keyword');
		 
		 
		// Determine the action to use
		$action = 'action_'.$this->request->action();
		 
		// If the action doesn't exist, it's a 404
		if ( ! method_exists($this, $action) || ($this->_is_ajax() && !in_array($this->request->action(), $this->ajaxMethods)))
		{
			throw Site_HTTP_Exception::factory(404,
					'The requested URL :uri was not found on this server.',
					array(':uri' => $this->request->uri())
			)->request($this->request);
		}
		 
		 
		$this->template->breadcrumbs = $this->_breadcrumbs();
		$this->template->_css = $this->_css();
		$this->template->_js = $this->_js();
		$this->template->_js_bottom = $this->_js_bottom();
		
		if ($this->template instanceof View) $this->_setDefaultVariablesToTemplate($this->template);
		 
		// Execute the action itself
		try {
			$this->{$action}();
			 
			if ($this->template->content instanceof View){
				$this->_setDefaultVariablesToTemplate($this->template->content);
			}
			// Execute the "after action" method
			$this->after();
			 
		}
		catch(Site_Auth_Restrict $e){
			$res = $this->_checkAccess($e->getMessage(), null, false);
			if (!($res instanceof Site_Auth_Result)) return $res;
			throw $e;
		}
		catch (Exception $e){
			if (strpos(get_class($e), 'HTTP_Exception_') !== FALSE && $e->getCode() >=300 && $e->getCode() <= 307) throw $e;
			else{
				$admException = Site_Exception::factory(500, $e->getMessage(), array(), $e);
				$admException->wrapper = $e;
				throw $admException;
			}
		}
	
	
		// Return the response
		return $this->response;
	}
	
	/**
	 *
	 * @return Request;
	 */
	public function getWidget($name, $options = array()){
		Controller_Site_Widget::setOptions($name, $options);
		$request = Request::factory('Site_Widget_' . $name, $options);
		return $request;
	}
	
	public function setFlashWarning($str){
		$this->setFlashMessage('WARNING', $str);
	}
	
	public function setFlashError($str){
		$this->setFlashMessage('ERROR', $str);
	}
	
	public function setFlashNotice($str){
		$this->setFlashMessage('NOTICE', $str);
	}
	
	public function setFlashMessage ($type, $message){
		Site_Session::instance()->set('FLASH_' . strtoupper($type), $message);
	}
	
	public function getLanguage(){
		return Site_Language::get();
	}
	
	protected function _initFormData($fields, $values, $default = array()){
		$data = $fields;
	
		foreach (array($default, $values) as $lst){
			foreach ($lst as $key => $value){
				if (isset($data[$key])){
					if (is_array($data[$key]) && !is_array($value)) continue;
	
					$data[$key] = is_array($value) ? array_map('trim', $value) : trim($value);
				}
			}
		}
	
		return $data;
	}
	
	protected function _setDefaultVariablesToTemplate($template){
		$template->lang = $this->getLanguage();
		$template->controller = $this;
		$template->current_user = null;
		$template->is_logged = $this->_isLogged();
	
	
		if ($template->is_logged){
			$template->current_user = $this->getUser();
		}
	}
	
	protected function _isLogged(){
		return (Site_Auth::getInstance()->getAuthUser()->logged_in() && !$this->getUser()->hasGroup('everyone'));
	}
	
	protected function _checkAccess($rights = null, $action = null){
		 
		if (is_null($action)) $action = $this->request->action();
		if (is_bool($action)) $action = 'index';
	
		$gotoController = '';
		$authResult = '';
		if ($this->authCheck){
	
			$rPrarms = array('controller' => 'login',
					'action' => 'index',
					'extension' => $this->request->param('extension'),
					//'lang'=> $this->getLanguage(),
					'directory'  =>'site',
			);
	
			$authResult = Site_Auth::getInstance()->checkAccess($this, $rights, $action);
			$url = '';
			
			switch ($authResult->result){
				case Site_Auth::AUTH_OK:
					if ($this->_is_ajax()) $this->template = $this->templateAjax;
					break;
	
				case Site_Auth::AUTH_NO:
					$rPrarms['controller'] = 'login';
					$url = Route::url('site', $rPrarms);
					
					break;
	
				case Site_Auth::AUTH_DENIED:
					$rPrarms['controller'] = 'denied';
					$url = Route::url('site', $rPrarms);
					
					break;
	
				case Site_Auth::AUTH_DISABLED:
					$rPrarms['controller'] = 'disabled';
					$url = Route::url('site', $rPrarms);
					break;
					
				case Site_Auth::AUTH_BANNED:
					$rPrarms['controller'] = 'banned';
					$url = Route::url('site', $rPrarms);
					break;
						
				case Site_Auth::AUTH_PREMODERATE:
					$rPrarms['controller'] = 'premoderate';
					$url = Route::url('site', $rPrarms);
					break;
			}

			if ($url){
				$this->redirect($url);
				exit();
			}
		}
		else {
			if ($this->_is_ajax()) $this->template = $this->templateAjax;
			else  $this->template = $this->templateNoAuth;
		}
	
	
		
	
	
		return ;
	}
	
	public function getQueryRights($rights = Site_Access::ACCESS_NO, $action = null, $instance = null){
		$result = Site_Auth::getInstance()->getRights($this, $rights, $action, $instance);
		return $result->queryRights;
	}
	
	public function getRights($rights = Site_Access::ACCESS_NO, $action = null, $instance = null){
		return Site_Auth::getInstance()->getRights($this, $rights, $action, $instance);
	}
	
	protected function _is_ajax(){
		return $this->request->is_ajax();
	}
	
	public function getUser(){
		return Site_Auth::getInstance()->getAuthUser()->get_user();
	}
	
	protected function _getAction(){
		return $this->request->action();
	}
	
	protected function _breadcrumbs(){
		return array(
				
		);
	}
	
	protected function _css(){
		return array();
	}
	
	protected function _js(){
		return array();
	}
	
	protected function _js_bottom(){
		return array();
	}
	
	public function setMetaDescription($text){
		if ($this->template instanceof View)
			$this->template->title_description = $text;
	}
	    
}
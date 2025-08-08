<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Admin extends Controller_Template {
   
    public $template = 'admin/main';
    protected $templateSidebar = 'admin/sidebar';
    protected $templateNoAuth = 'admin/main_noauth';
    protected $templateAjax = 'admin/main_ajax';
    protected $ajaxMethods = array();
    protected $showSidebar = true;
    
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
        Admin_Language::init($this->i18nAdvFile);

        $authRes = false;
        if (($res = $this->_checkAccess(null,null,false)) && !($res instanceof Admin_Auth_Result)) return $res;
        else $this->lastCheckControllerAccess = $res;
        
       
        
	        $includeSidebar = false;
	        if ($this->showSidebar) $includeSidebar = true;
	        
	        // Execute the "before action" method
	        try {
	            $this->before();
	        }
	        catch (Exception $e){
	            if (strpos(get_class($e), 'HTTP_Exception_') !== FALSE && $e->getCode() >=300 && $e->getCode() <= 307) throw $e;
	            else throw new Admin_Exception(' ' . $e, NULL, $e);
	        }
	        
	        
	        $this->template->content = '';
	        if ($this->_is_ajax()) $this->template->content = new Admin_Ajax();
	        if ($includeSidebar) $this->template->sidebar = View::factory($this->templateSidebar);
	    
	        $configAdmin = Kohana::$config->load('admin');
	        $this->template->title = array();
	        if ($configAdmin->get('title')) $this->template->title[] = $configAdmin->get('title');
	        
	        $this->template->title_separator = $configAdmin->get('title_separator');
	        $this->template->title_description = '';
	        
	        
	        // Determine the action to use
	        $action = 'action_'.$this->request->action();
	    
	        // If the action doesn't exist, it's a 404
	        if ( ! method_exists($this, $action) || ($this->_is_ajax() && !in_array($this->request->action(), $this->ajaxMethods)))
	        {
	            throw Admin_HTTP_Exception::factory(404,
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
	        catch(Admin_Auth_Restrict $e){
	        	$res = $this->_checkAccess($e->getMessage(), null, false);
	        	if (!($res instanceof Admin_Auth_Result)) return $res;
	        	throw $e;
	        }    
	        catch (Exception $e){
	            if (strpos(get_class($e), 'HTTP_Exception_') !== FALSE && $e->getCode() >=300 && $e->getCode() <= 307) throw $e;
	            else{
	                $admException = new Admin_Exception(500, NULL, $e);
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
        Controller_Admin_Widget::setOptions($name, $options);
        $request = Request::factory('Admin_Widget_' . $name, $options);
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
        Admin_Session::instance()->set('FLASH_' . strtoupper($type), $message);
    }
    
    public function getLanguage(){
        return Admin_Language::get();
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
        $template->is_logged = Admin_Auth::getInstance()->getAuthUser()->logged_in();
        
        
        if ($template->is_logged){
            $template->current_user = $this->getUser();
        }
    }
    
    protected function _checkAccess($rights = null, $action = null, $runFromAction = true){
    	
    	if (is_null($action)) $action = $this->request->action();
        if (is_bool($action)) $action = 'index';
        
        $gotoController = '';
        $authResult = '';
        if ($this->authCheck){
            
            $rPrarms = array('controller' => 'Auth_Login',
                              'action' => 'index',
                              'extension' => $this->request->param('extension'),
                              'lang'=> $this->getLanguage(),
            );
            
            $authResult = Admin_Auth::getInstance()->checkAccess($this, $rights, $action);
            
            switch ($authResult->result){
                case Admin_Auth::AUTH_OK:
                    if ($this->_is_ajax()) $this->template = $this->templateAjax;
                    break;
        
                case Admin_Auth::AUTH_NO:
                    $rPrarms['controller'] = 'Auth_Login';
                    $gotoController = Request::factory(Route::url('admin', $rPrarms));
                    break;
        
                case Admin_Auth::AUTH_DENIED:
                    $rPrarms['controller'] = 'Auth_Denied';
                    $gotoController = Request::factory(Route::url('admin', $rPrarms));
                    break;
        
                case Admin_Auth::AUTH_DISABLED:
                    $rPrarms['controller'] = 'Auth_Disabled';
                    $gotoController = Request::factory(Route::url('admin', $rPrarms));
                    break;
            }
       
            }
            else {
            	if ($this->_is_ajax()) $this->template = $this->templateAjax;
            	else  $this->template = $this->templateNoAuth;
            }
            
            
    		if ($gotoController){
    			
            	if (stripos($gotoController->uri(), $this->request->controller()) === FALSE){            		
	                if ($runFromAction) throw new Admin_Auth_Restrict($rights);
	                else return $gotoController->execute();
            	}
        	}
        
	        if (!$gotoController && $this->authCheck && $authResult != Admin_Auth::AUTH_OK){
	            throw Admin_HTTP_Exception::factory(500,
	                    'Goto controller is undefined for :controller action :action',
	                    array(':controller' => get_class($this), ':action' => $this->request->action())
	            )->request($this->request);
	        }
        
        
        
        return $authResult;
    }
    
    public function getQueryRights($rights = Admin_Access::ACCESS_NO, $action = null, $instance = null){
        $result = Admin_Auth::getInstance()->getRights($this, $rights, $action, $instance);
        return $result->queryRights;
    }
    
    public function getRights($rights = Admin_Access::ACCESS_NO, $action = null, $instance = null){
        return Admin_Auth::getInstance()->getRights($this, $rights, $action, $instance);
    }
    
    protected function _is_ajax(){
        return $this->request->is_ajax();
    }
    
    public function getUser(){
    	return Admin_Auth::getInstance()->getAuthUser()->get_user();
    }
    
    protected function _getAction(){
    	return $this->request->action();
    }
    
    protected function _addAudit($type, $message){
    	$ctrl = get_class($this);
    	$act = $this->_getAction();
    	$messageHead = "Controller: {$ctrl} Action: $act \n";
    	Admin_Audit::add($type, $messageHead . $message, $this->getUser());
    }
    
    protected function _breadcrumbs(){
    	return array(
    		array('icon' => 'fa fa-home', 
    			  'name' => 'Home', 
    			  'url'  => URL::site(Route::url('admin', array('controller' => 'home', 'lang'=> $this->getLanguage(), 'action'=> 'index' ))))		
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
        
}
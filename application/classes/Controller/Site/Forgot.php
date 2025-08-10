<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Site_Forgot extends Controller_Site {
    protected $authCheck = false;
    
    public function before()
    {
    	if ($this->_getAction() == 'captcha') $this->template = 'site/main_plain';
    
    	parent::before();
    }
    
    protected function _ifLogged(){
    	if ($this->_isLogged()){
    		$this->redirect(URL::site(Route::url('default')));
    		exit;
    	}
    }
    
    public function action_index(){
    	$this->_ifLogged();
    	
        $this->template->title[] = 'Reset password';
        $errors = array();
        
        $data = array('email' => Arr::get($_POST, 'email'));
        
        if (isset($_POST['doit'])){
        	$captchaCode = Site_Session::instance()->get_once('captcha_keystring');
        	 
        	if (!$captchaCode) throw new Site_Exception('Empty captcha code');
        	$ccode = Arr::get($_POST, 'ccode');
        	 
        	if ($captchaCode != $ccode) $errors['ccode'] = ___('Wrong captcha');
        	
        	$postValidator = Validation::factory($data);
        	$postValidator->label('email', 'email');
        	$postValidator->rule('email', 'email');
        	
        	if ($postValidator->check() && !count($errors)){
        		$user = ORM::factory('Site_User')->where('login', '=', $data['email'])->find();
        		if ($user->loaded()){
        			$model = Orm::factory('Site_EmailTemplate')->where('name', '=', 'site.register.forgot')->find();
        			if (!$model->loaded()) throw new Site_Exception('Site_EmailTemplate site.register.forgot not found');
        			
        			$modelVerify = Orm::factory('Site_User_Verify')
        			 ->where('uid', '=', $user->id)
        			 ->and_where('type', '=', 'forgot')
        			 ->find();
        			if (!$modelVerify->loaded()){
        				$modelVerify->uid = $user->id;
        				$modelVerify->type = 'forgot';
        				$modelVerify->hash = $modelVerify->createHash();
        				$modelVerify->save();
        			}
        			else {
        				if ( (time() - strtotime($modelVerify->updated_at)) > 86400){
        					$modelVerify->hash = $modelVerify->createHash();
        					$modelVerify->save();
        				}
        			}
        			
        			$verifyUrl = URL::site(Route::url('site', array('controller'=>'forgot', 'lang' => $this->getLanguage(), 'action'=>'reset')));
        			$verifyParams = array('email' => $user->login, 'hash' => $modelVerify->hash);
        			$verifyUrl = Util_Url::addParameter($verifyUrl, $verifyParams);
        			if (strpos($verifyUrl, '://') === FALSE){
        				$urlDefault = Model_Setting::get('site.main.url');
        				$verifyUrl = Util_Url::addUrl($urlDefault, $verifyUrl);
        			}
        			
        			$params = Site_EmailTemplate::initParams(array(
        					'%receiver%' => $user->login,
        					'%login%' => $user->login,
        					'%verification_url%' => $verifyUrl,
        					'%username%' => $user->nickname,
        			));
        			Site_EmailTemplate::send($model, $params);
        			 
        		}
        		
        		$this->redirect(
        				URL::site(Route::url('site', array('controller'=>'forgot', 'lang' => $this->getLanguage(), 'action'=>'presuccess'))));
        	}
        	else $errors = array_merge($postValidator->errors('valid'), $errors);	
        	
        	
        	
        }
        
        $this->template->content = View::factory('site/auth/forgot');
        $this->template->content->data = $data;
        $this->template->content->errors = $errors;
        
        
        
    }
    
    public function action_presuccess(){
    	$this->_ifLogged();
    	$this->template->title[] = 'Reset password';
    	$this->template->content = View::factory('site/auth/forgot_presuccess');
    }
    
    public function action_success(){
    	$this->_ifLogged();
    	$this->template->title[] = 'Reset password';
    	$this->template->content = View::factory('site/auth/forgot_success');
    }
    
    public function action_reset(){
    	$this->_ifLogged();
    	$this->template->title[] = 'Reset password';
    	$this->template->content = View::factory('site/auth/forgot_reset');
    	
    	$data = array('email' => $_REQUEST['email'], 'hash' => $_REQUEST['hash'],
    				  'password' => Arr::get($_POST, 'password'),
    				  'repassword' => Arr::get($_POST, 'repassword')
    	);
    	
    	$errors = array();
    	$formDisplay = false;
    	
    	$user = ORM::factory('Site_User')->where('login', '=', $data['email'])->find();
    	if (!$user->loaded()) $this->setFlashWarning('User not found');
    	else{
    		$verify = Orm::factory('Site_User_Verify')
        			 ->where('uid', '=', $user->id)
        			 ->and_where('type', '=', 'forgot')
        			 ->and_where('hash', '=', $data['hash'])
        			 ->find();
    		
    		if (!$verify->loaded()) $this->setFlashWarning('Hash is incorrect');
    		else {
    			$formDisplay = true;
    			
    			if (isset($_POST['doit'])){
	    			$postValidator = Validation::factory($data);
	    			$postValidator->label('password', 'password');
	    			$postValidator->label('repassword', 'retype password');
	    			$postValidator->rule('password','min_length', array(':value', 5));
	    			$postValidator->rule('password', 'check_password', array(':value', $data['repassword']));
	    			
	    			if ($postValidator->check() && !count($errors)){
	    				$user->setPassword($data['password']);
	    				$user->save();
	    				
	    				$verify->delete();
	    				
	    				$this->redirect(
	    						URL::site(Route::url('site', array('controller'=>'forgot', 'lang' => $this->getLanguage(), 'action'=>'success'))));
	    			}
	    			else $errors = array_merge($postValidator->errors('valid'), $errors);
    			}
    		}
    	}
    	
    	$this->template->content->data = $data;
    	$this->template->content->errors = $errors;
    	$this->template->content->form_display = $formDisplay;
    	
    }
}
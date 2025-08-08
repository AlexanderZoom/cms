<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Site_Register extends Controller_Site {
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
    	$errors = array();
        $this->template->title[] = 'Sign On';
        
        $this->template->content = View::factory('site/auth/register');
        $fields = array('email' => '', 'password' => '', 'repassword' => '', 'nickname' => '');
        $data = $this->_initFormData($fields, $_REQUEST);
        
        
        
        if (isset($_POST['reg'])){
        	
        	$captchaCode = Site_Session::instance()->get_once('captcha_keystring');
        	
        	if (!$captchaCode) throw new Site_Exception('Empty captcha code');
        	$ccode = Arr::get($_POST, 'ccode');
        	
        	if ($captchaCode != $ccode) $errors['ccode'] = ___('Wrong captcha');
        	
        	$postValidator = Validation::factory($data);
        	$postValidator->label('email', 'email');
        	$postValidator->label('nickname', 'nickname');
        	$postValidator->label('password', 'password');
        	$postValidator->label('repassword', 'retype password');
        	
        	$postValidator->rule('email', 'email');
        	$postValidator->rule('nickname', 'not_empty');
        	$postValidator->rule('password','min_length', array(':value', 5));
        	$postValidator->rule('password', 'check_password', array(':value', $data['repassword']));
        	
        	
        	
        	if ($postValidator->check() && !count($errors)){
        	
        		try {
        			$user = new Model_Site_User();
        			$user->login = $data['email'];
        			$user->setPassword($data['password']);
        			$user->nickname = $data['nickname'];
        			$user->save();
        		}
        		catch (Database_Exception $e){
        			if ($e->getCode() == 23000) $errors['email'] = ___('Email exists');
        			else throw $e;
        		}
        		catch (ORM_Validation_Exception $e){
        			$errors = $e->errors('user');
        		}
        		
        		$regType = Model_Setting::get('site.main.register_type');
        		if (!$regType) $errors['email'] = ___('Tech problem');
        			
        		
        		if (!count($errors)){

        			switch ($regType){
        				case 'simple':
        					$group = ORM::factory('Site_Group')->where('code', '=', 'user')->find();
        					$group->add('users', $user);
        					
        					$model = Orm::factory('Site_EmailTemplate')->where('name', '=', 'site.register.success')->find();
        					if (!$model->loaded()) throw new Site_Exception('Site_EmailTemplate site.register.success not found');
        					$params = Site_EmailTemplate::initParams(array(
        						'%receiver%' => $user->login,
        						'%login%' => $user->login,
        						'%password%' => $data['password'],
        						'%username%' => $user->nickname,        						
        					));
        					Site_EmailTemplate::send($model, $params);
        					
        					$this->redirect(
        							URL::site(Route::url('site', array('controller'=>'register', 'lang' => $this->getLanguage(), 'action'=>'success'))));
        					break;
        					
        				case 'verification':
        					$group = ORM::factory('Site_Group')->where('code', '=', 'premoderate')->find();
        					$group->add('users', $user);
        					
        					$modelVerify = Orm::factory('Site_User_Verify')
        					->where('uid', '=', $user->id)
        					->and_where('type', '=', 'register')
        					->find();
        					if (!$modelVerify->loaded()){
        						$modelVerify->uid = $user->id;
        						$modelVerify->type = 'register';
        						$modelVerify->hash = $modelVerify->createHash();
        						$modelVerify->save();
        					}
        					else {
        						if ( (time() - strtotime($modelVerify->updated_at)) > 86400){
        							$modelVerify->hash = $modelVerify->createHash();
        							$modelVerify->save();
        						}
        					}
        					 
        					$verifyUrl = URL::site(Route::url('site', array('controller'=>'register', 'lang' => $this->getLanguage(), 'action'=>'confirm')));
        					$verifyParams = array('email' => $user->login, 'hash' => $modelVerify->hash);
        					$verifyUrl = Util_Url::addParameter($verifyUrl, $verifyParams);
        					if (strpos($verifyUrl, '://') === FALSE){
        						$urlDefault = Model_Setting::get('site.main.url');
        						$verifyUrl = Util_Url::addUrl($urlDefault, $verifyUrl);
        					}
        					
        					$model = Orm::factory('Site_EmailTemplate')->where('name', '=', 'site.register.confirm')->find();
        					if (!$model->loaded()) throw new Site_Exception('Site_EmailTemplate site.register.confirm not found');
        					$params = Site_EmailTemplate::initParams(array(
        							'%receiver%' => $user->login,
        							'%login%' => $user->login,
        							'%password%' => $data['password'],
        							'%username%' => $user->nickname,
        							'%verification_url%' => $verifyUrl,
        					));
        					Site_EmailTemplate::send($model, $params);
        					 
        					$this->redirect(
        							URL::site(Route::url('site', array('controller'=>'register', 'lang' => $this->getLanguage(), 'action'=>'preconfirm'))));
        					
        					break;
        					
        				case 'premoderate':
        					$group = ORM::factory('Site_Group')->where('code', '=', 'premoderate')->find();
        					$group->add('users', $user);
        					
        					$model = Orm::factory('Site_EmailTemplate')->where('name', '=', 'site.register.premoderate')->find();
        					if (!$model->loaded()) throw new Site_Exception('Site_EmailTemplate site.register.premoderate not found');
        					$params = Site_EmailTemplate::initParams(array(
        							'%receiver%' => $user->login,
        							'%login%' => $user->login,
        							'%password%' => $data['password'],
        							'%username%' => $user->nickname,
        							
        					));
        					Site_EmailTemplate::send($model, $params);
        					
        					$this->redirect(
        							URL::site(Route::url('site', array('controller'=>'register', 'lang' => $this->getLanguage(), 'action'=>'premoderate'))));
        					 
        					break;
        			}        			
        			
        		}
        		else {
        			if($user->loaded()) $user->delete();
        		}
        	} else $errors = array_merge($postValidator->errors('valid'), $errors);	
        		
        }
        
        $this->template->content->data = $data;
        $this->template->content->errors = $errors;
    }
    
    public function action_success(){
    	$this->_ifLogged();
    	$this->template->title[] = 'Registration success';
    	$this->template->content = View::factory('site/auth/register_success');
    }
    
    public function action_preconfirm(){
    	$this->_ifLogged();
    	$this->template->title[] = 'Confirmation registration';
    	$this->template->content = View::factory('site/auth/register_preconfirm');
    }
    
    public function action_confirm(){
    	$this->_ifLogged();
    	$this->template->title[] = 'Confirmation registration';
    	$this->template->content = View::factory('site/auth/register_confirm');
    	
    	$data = array('email' => $_REQUEST['email'], 'hash' => $_REQUEST['hash']
    	);
    	     	
    	 
    	$user = ORM::factory('Site_User')->where('login', '=', $data['email'])->find();
    	if (!$user->loaded()) $this->setFlashWarning('User not found');
    	else{
    		$verify = Orm::factory('Site_User_Verify')
    		->where('uid', '=', $user->id)
    		->and_where('type', '=', 'register')
    		->and_where('hash', '=', $data['hash'])
    		->find();
    	
    		if (!$verify->loaded()) $this->setFlashWarning('Hash is incorrect');
    		else {
    			
    			
    			$groupOld = ORM::factory('Site_Group')->where('code', '=', 'premoderate')->find();
    			$groupNew = ORM::factory('Site_Group')->where('code', '=', 'user')->find();
    			
    			if (!$groupOld->loaded() ||!$groupNew->loaded()) throw new Site_Exception('Group for user not loaded');
    			$user->remove('groups', $groupOld);
    			$groupNew->add('users', $user);
    			
    			$verify->delete();

    		}
    	}
    }
    
    public function action_premoderate(){
    	$this->_ifLogged();
    	$this->template->title[] = 'Premoderate';
    	$this->template->content = View::factory('site/auth/premoderate');
    }
    
    public function action_captcha(){
    	$this->_ifLogged();
    	$captcha = new Util_Captcha();
    	Site_Session::instance()->set('captcha_keystring', $captcha->getKeyString());
    }
}
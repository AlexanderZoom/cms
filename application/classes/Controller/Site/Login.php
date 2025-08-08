<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Site_Login extends Controller_Site {
    protected $authCheck = false;
    protected $ajaxMethods = array('index');
    protected $showSidebar = false;
    
    public function action_index(){
        if ($this->template->content instanceof Site_Ajax){
            $this->template->content->setResult(Site_Ajax::RESULT_CODE_ERROR);
            $this->template->content->setErrorCode(Site_Ajax::ERROR_CODE_NO_AUTH);
        }
        else{
            $this->template->content = View::factory('site/auth/login');
            $this->template->title[] = 'Sign In';
            if ($this->_isLogged()){
            	$this->redirect(URL::site(Route::url('default')));
            	exit;
            }
            
            if (isset($_POST['check_auth'])){
                $login = Arr::get($_POST, 'email');
                $password = Arr::get($_POST, 'password');
                $auth = Site_Auth::getInstance()->getAuthUser();
                $remember = (bool) Arr::get($_POST, 'remember');
                                
                if ($auth->login($login, $password, $remember)){
                    $this->redirect(URL::site(Route::url('default')));
                    exit;
                }
                else $this->setFlashWarning('Your Login or Password incorrect');
            }
            else $this->setFlashWarning('Please login with your Login and Password');
                        
        }
    }
}

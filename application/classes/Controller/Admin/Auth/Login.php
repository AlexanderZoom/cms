<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Admin_Auth_Login extends Controller_Admin {
    protected $authCheck = false;
    protected $ajaxMethods = array('index');
    protected $showSidebar = false;
    
    public function action_index(){
        if ($this->template->content instanceof Admin_Ajax){
            $this->template->content->setResult(Admin_Ajax::RESULT_CODE_ERROR);
            $this->template->content->setErrorCode(Admin_Ajax::ERROR_CODE_NO_AUTH);
        }
        else{
            $this->template->content = View::factory('admin/auth/login');
            if (isset($_POST['check_auth'])){
                $login = Arr::get($_POST, 'login');
                $password = Arr::get($_POST, 'password');
                $auth = Admin_Auth::getInstance()->getAuthUser();
                $remember = (bool) Arr::get($_POST, 'remember');
                                
                if ($auth->login($login, $password, $remember)){
                	$ip = 'remote addr: ' .Arr::get($_SERVER, 'REMOTE_ADDR') . " forwarded for: " . Arr::get($_SERVER, 'HTTP_X_FORWARDED_FOR');

                	$this->_addAudit(Admin_Audit::TYPE_LOGIN, 'login ' . $ip);
                    $this->redirect(Arr::get($_SERVER, 'REQUEST_URI'));
                    exit;
                }
                else $this->setFlashWarning('Your Login or Password incorrect');
            }
            else $this->setFlashWarning('Please login with your Login and Password');
                        
        }
    }
}
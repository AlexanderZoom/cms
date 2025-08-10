<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Admin_SiteUsers extends Controller_Admin {

    public function action_index(){

    	$search = !empty($_REQUEST['search']) ? $_REQUEST['search'] : ''; $search = trim($search);
    	
        $this->template->title[] = 'SiteUsers';
        $this->template->content = View::factory('admin/siteusers');
        $this->template->content->pagination = '';
        
        $itemOnPage = Kohana::$config->load('admin.item_on_page');
        $page = Arr::get($_GET, 'page', 1);
        
        $modelWithRights = $this->getQueryRights(Admin_Access::ACCESS_VIEW, 'index');
        if (!$modelWithRights) new Admin_Exception(500, 'Model for user not found from access rights');
        
        if ($search){        	
        	$subTbl = ORM::factory('Site_Group')->table_name();
        	$subQ = DB::select('site_group_user.site_user_id')->from($subTbl)
        			->join('site_group_user', 'LEFT')
        			->on($subTbl . '.id', '=', 'site_group_user.site_group_id')
        			->where($subTbl . '.code', 'LIKE', "%{$search}%");
        	
        	$modelWithRights->where('login', 'LIKE', "%{$search}%")
        	->or_where('id', 'in', DB::expr('(' . $subQ . ')'));
        }
        
        $modelWithRights2 = clone $modelWithRights;
        
        
        $userTotal = $modelWithRights->count_all();

        $widgetDataClass = new Admin_Widget_Data();
        
        $optUrl = URL::site(Route::url('admin', array('controller' => 'siteUsers', 'lang'=> $this->getLanguage())));
        if ($search) $optUrl = Util_Url::addParameter($optUrl, array('search' => $search));
        
        $options = array(
        'url' => $optUrl,
        'total' => $userTotal,
        'page'  => $page,
        'pages' => 5,
        'data_class' => $widgetDataClass
        );
        
        $pagination = $this->getWidget('Pagination', $options);
        $this->template->content->pagination = $pagination->execute();
        $widgetData = $widgetDataClass->get();
        
        $page = Arr::get($widgetData, 'page', 1);
        
        
        $users = $modelWithRights2->limit($itemOnPage);
        if ( ($page -1) >0) $users->offset(($page -1) * $itemOnPage);
        $users = $users->find_all();
        
        
        $this->template->content->users = $users;
        
        $searchUrl = URL::site(Route::url('admin', array('controller' => 'siteUsers', 'lang'=> $this->getLanguage(), 'action'=> 'index' )));
        $searchUrlParams = array('search' => '');
        $searchUrl = Util_Url::addParameter($searchUrl, $searchUrlParams);
        
        $this->template->content->searchUrl = $searchUrl;
        $this->template->content->search = htmlspecialchars($search);
        
//         if (mt_rand(0, 1)) $this->setFlashError('Тестовая ошибка');
//         if (mt_rand(0, 1)) $this->setFlashWarning('Тестовый варнинг');
//         if (mt_rand(0, 1)) $this->setFlashNotice('Тестовое инфо');
    }
    
    public function action_create(){
        $fields = array('login' => '', 'group' => array(), 'disabled' => '', 
        				'password' => '', 'retype_password' => '',
        				'nickname' => '', 'firstname' => '', 'lastname' => '',
        				'birthday' => ''
        );
        $roles = Model_Site_Group::factory('Site_Group')->where('code', '<>', 'everyone')->find_all();
        $data = $this->_initFormData($fields, $_REQUEST);
        
        $errors = array();
        if (isset($_REQUEST['save'])){
            $this->_checkAccess(Admin_Access::ACCESS_CREATE);
            
            $roleList = array();
            foreach ($roles as $role) $roleList[] = $role->code;
            
            $postValidator = Validation::factory($data);
            $postValidator->label('login', 'Login');
            $postValidator->label('group', 'Group');
            $postValidator->label('disabled', 'Disable account');
            $postValidator->label('password', 'Password');
            $postValidator->label('retype_password', 'Retype Password');
            $postValidator->label('nickname', 'Nickname');
            $postValidator->label('firstname', 'First Name');
            $postValidator->label('lastname', 'Last Name');
            $postValidator->label('birthday', 'Birthday');
            
            $postValidator->rule('login', 'not_empty');
            $postValidator->rule('group', 'in', array(':value', $roleList));
            $postValidator->rule('group', 'not_empty');
            $postValidator->rule('password', 'check_password', array(':value', $data['retype_password']));
            $postValidator->rule('password','not_empty');
            
            if ($postValidator->check()){
                
                try {
                    $user = new Model_Site_User();
                    $user->login = $data['login'];
                    $user->setPassword($data['password']);
                    $user->is_disabled = $data['disabled'] ? 1 : 0;
                    $user->nickname = $data['nickname'];
                    $user->firstname = $data['firstname'];
                    $user->lastname = $data['lastname'];
                    $user->birthday = $data['birthday'];
                    $user->save();
                    
                    $this->_addAudit(Admin_Audit::TYPE_ADD, "SiteUsers {$user->login}");
                }
                catch (Database_Exception $e){
                    if ($e->getCode() == 23000) $errors['login'] = ___('Login exists');
                    else throw $e;
                }
                catch (ORM_Validation_Exception $e){
                    $errors = $e->errors('user');
                }
                
                if (!count($errors)){
                    foreach ($data['group'] as $roleCode){
                        foreach ($roles as $role){
                            if ($role->code == $roleCode){
                                $role->add('users' , $user);
                                break;
                            }
                        }
                    }
                    
                    $this->setFlashNotice('User added');
                    $this->redirect(
                        URL::site(Route::url('admin', array('controller'=>'siteUsers', 'lang' => $this->getLanguage(), 'action'=>'index'))));
                }
            }
            else $errors = $postValidator->errors('valid');
           
        }
        
        $optionForm = array(
            'errors' => $errors,
            'roles'  => $roles,
            'data'   => $data,
        
        );
        
        $this->_form($optionForm);

    }
    
    public function action_edit(){
        $id = !empty($_REQUEST['checked'][0]) ? $_REQUEST['checked'][0] : 0;
        if (!$id){
            $this->setFlashError('User Id not found');
            $this->redirect(URL::site(Route::url('admin', array('controller'=>'siteUsers', 'lang' => $this->getLanguage(), 'action'=>'index'))));
        }
        
        $user = ORM::factory('Site_User')->where('id', '=', $id)->find();
        if (!$user->loaded()){
            $this->setFlashError('User not found');
            $this->redirect(URL::site(Route::url('admin', array('controller'=>'siteUsers', 'lang' => $this->getLanguage(), 'action'=>'index'))));
        }
        
        //two flag for send notice on email user about verification success
        $isPremoderateOld = $user->hasGroup('premoderate');
        $isUserGroupNew = false;
        
        $errors = array();
        $fields = array('login' => '', 'group' => array(), 'disabled' => '', 
        				'password' => '', 'retype_password' => '',
        				'nickname' => '', 'firstname' => '', 'lastname' => '',
        				'birthday' => '',
        		'last_login' => '', 'last_ip' => '', 'last_ip_forward' => ''
        );
        $groups = $user->groups->find_all();
        $groupsArray = array();
        foreach ($groups as $group){
            $groupsArray[] = $group->code;
        }
        
        if ($user->login == 'anonymous'){
        	$this->setFlashNotice('User anonymous cant edit');
        	$this->redirect(URL::site(Route::url('admin', array('controller'=>'siteUsers', 'lang' => $this->getLanguage(), 'action'=>'index'))));
        }
        
        $roles = Model_Site_Group::factory('Site_Group')->where('code', '<>', 'everyone')->find_all()->as_array();
        $userData = $this->_initFormData($fields, array(
        'login' => $user->login,
        'group'  => $groupsArray,
        'disabled' => $user->is_disabled,
        'nickname' => $user->nickname,
        'firstname'	=> $user->firstname,
        'lastname'	=> $user->lastname,
        'birthday'	=> $user->birthday,
        'last_login' => $user->last_login,
        'last_ip'	 => $user->last_ip,
        'last_ip_forward'	 => $user->last_ip_forward,
        ));
        
        
        if (!isset($_REQUEST['disabled'])) $_REQUEST['disabled'] = 0;
        
        $data = $userData;
        $data = $this->_initFormData($fields, $_REQUEST, $data);
        
        
        
        if (isset($_REQUEST['save'])){
            $this->_checkAccess(Admin_Access::ACCESS_MODIFY);
                       
            $roleList = array();
            foreach ($roles as $role) $roleList[] = $role->code;
            
            
            $dataSave = array();
            foreach ($data as $key => $value){
                if ($value != $userData[$key]) $dataSave[$key] = $value;
            }

            
            $postValidator = Validation::factory($data);
            
            foreach ($dataSave as $key => $value){
                switch ($key){
                    case 'login' :
                         $postValidator->label('login', 'Login');
                         $postValidator->rule('login', 'not_empty');
                        break;
                
                    case 'group' :
                        $postValidator->label('group', 'Group');
                        $postValidator->rule('group', 'not_empty');
                        $postValidator->rule('group', 'in', array(':value', $roleList));
                        break;
                
                    case 'disabled' :
                        $postValidator->label('disabled', 'Disable account');
                        break;
                        
                    case 'password' :
                        $postValidator->label('password', 'Password');
                        $postValidator->rule('password', 'check_password', array(':value', $data['retype_password']));
                        break;
                }
            }
           
            
            if ($postValidator->check()){
            
                try {
                    foreach ($dataSave as $key => $value){
                        switch ($key){
                            case 'login' :
                                $user->login = $dataSave['login'];
                                break;
                    
                            case 'group' :
                                foreach ($groups as $group) $user->remove('groups', $group);
                                
                                $groupsNew = ORM::factory('Site_Group')->where('code', 'IN', $value)->find_all();
                                foreach ($groupsNew as $groupNew)
                                    if ($groupNew->loaded()){
                                    	$groupNew->add('users', $user);
                                    	if ($groupNew->code == 'user') $isUserGroupNew = true;
                                    }
                                break;
                    
                            case 'disabled' :
                                $user->is_disabled = $dataSave['disabled'] ? 1 : 0;
                                break;
                    
                            case 'password' :
                                $user->setPassword($dataSave['password']);
                                break;
                                
                            case 'nickname' :
                       	    	$user->nickname = $dataSave['nickname'];
                               	break;
                               	
                            case 'firstname' :
                            	$user->firstname = $dataSave['firstname'];
                               	break;
                               	
                           	case 'lastname' :
                               	$user->lastname = $dataSave['lastname'];
                               	break;
                               	
                            case 'birthday' :
                            	$user->birthday = $dataSave['birthday'];
                               	break;
                        }
                    }
                    
                    $user->save();
                    
                    $this->_addAudit(Admin_Audit::TYPE_EDIT, "SiteUsers {$user->login}");
                }
                catch (Database_Exception $e){
                    if ($e->getCode() == 23000) $errors['login'] = ___('Login exists');
                    else throw $e;
                }
                catch (ORM_Validation_Exception $e){
                    $errors = $e->errors('user');
                }
            
                if (!count($errors)){

                	if ($isPremoderateOld && $isUserGroupNew && Model_Setting::get('site.main.register_type') == 'premoderate'){
                		$model = Orm::factory('Site_EmailTemplate')->where('name', '=', 'site.register.premoderate.confirm')->find();
                		if (!$model->loaded()) throw new Admin_Exception('Site_EmailTemplate site.register.premoderate.confirm not found');
                		$params = Site_EmailTemplate::initParams(array(
                				'%receiver%' => $user->login,
                				'%login%' => $user->login,                				
                				'%username%' => $user->nickname,
                				 
                		));
                		Site_EmailTemplate::send($model, $params);
                	}
                	
                    $this->setFlashNotice('User edited');
                    $this->redirect(
                            URL::site(Route::url('admin', array('controller'=>'siteUsers', 'lang' => $this->getLanguage(), 'action'=>'index'))));
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
            'roles'  => $roles,
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
            $users = ORM::factory('Site_User')->where('id', 'in', $ids)->find_all();
            
            foreach ($users as $user){
            	if ($user->login == 'anonymous'){
            		$this->setFlashNotice('User anonymous cant edit');
            		continue;
            	}
            	
            	if ($this->getRights(Admin_Access::ACCESS_DELETE, 'delete', $user->id)->result){
	                $groups = $user->groups->find_all();
	                foreach ($groups as $group) $user->remove('groups', $group);
	                
	                $this->_addAudit(Admin_Audit::TYPE_DELETE, "SiteUSers {$user->login}");
	                $user->delete();
            	}
            }
            
            $this->setFlashNotice(($cnt == 1 ? 'User deleted' : 'Users deleted'));
            
        }
        else $this->setFlashNotice('User Id not found');
        
        $this->redirect(
                URL::site(Route::url('admin', array('controller'=>'siteUsers', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    }
    
    protected function _form($options = array()){
        extract($options);
        
        if (count($errors)) $this->setFlashError('Some fields were filled with error');
        $this->template->title[] = isset($data['id']) ? 'Edit User' : 'Create User';
        $this->template->content = View::factory('admin/siteusers_form');
        $this->template->content->errors = $errors;
        $this->template->content->roles = $roles;
        $this->template->content->data = $data;
        $this->_setDefaultVariablesToTemplate($this->template->content);
        
    }
    
    protected function _breadcrumbs(){
    	$lst = parent::_breadcrumbs();
    	$lst[] = array(
    			'icon' => 'fa fa-user',
    			'name' => 'SiteUsers',
    			'url'  => URL::site(Route::url('admin', array('controller'=>'siteUsers', 'lang' => $this->getLanguage(), 'action'=>'index')))
    	);
    	 
    	$action = $this->_getAction();
    	 
    	if ($action != 'index'){
    		$url = URL::site(Route::url('admin', array('controller'=>'siteUsers', 'lang' => $this->getLanguage(), 'action'=> $this->_getAction())));
    		if ($action == 'edit' && !empty($_REQUEST['checked'][0])) $url = Util_Url::addParameter($url, array('checked[]'=> $_REQUEST['checked'][0]));
    
    		$lst[] = array(
    				'icon' => 'fa fa-user',
    				'name' => ucfirst($this->_getAction()),
    				'url'  => $url,
    		);
    	}
    	 
    	return $lst;
    }
    
        
}
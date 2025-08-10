<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Admin_SiteGroups extends Controller_Admin {

    public function action_index(){

    	$search = !empty($_REQUEST['search']) ? $_REQUEST['search'] : ''; $search = trim($search);
    	
        $this->template->title[] = 'SiteGroups';
        $this->template->content = View::factory('admin/sitegroups');
        $this->template->content->pagination = '';
        
        $itemOnPage = Kohana::$config->load('admin.item_on_page');
        $page = Arr::get($_GET, 'page', 1);
        
        $modelWithRights = $this->getQueryRights(Admin_Access::ACCESS_VIEW, 'index');  
        if (!$modelWithRights) new Admin_Exception(500, 'Model for groups not found from access rights');

        if ($search) $modelWithRights->where('code', 'LIKE', "%{$search}%");
        
        $modelWithRights2 = clone $modelWithRights;
        $groupTotal = $modelWithRights->count_all();

        $widgetDataClass = new Admin_Widget_Data();
        $optUrl = URL::site(Route::url('admin', array('controller' => 'siteGroups', 'lang'=> $this->getLanguage())));
        if ($search) $optUrl = Util_Url::addParameter($optUrl, array('search' => $search));
        
        $options = array(
        'url' => $optUrl,
        'total' => $groupTotal,
        'page'  => $page,
        'pages' => 5,
        'data_class' => $widgetDataClass
        );
        
        $pagination = $this->getWidget('Pagination', $options);
        $this->template->content->pagination = $pagination->execute();
        $widgetData = $widgetDataClass->get();
        
        $page = Arr::get($widgetData, 'page', 1);
        
        
        $groups = $modelWithRights2->limit($itemOnPage);
        if ( ($page -1) >0) $groups->offset(($page -1) * $itemOnPage);
        $groups = $groups->find_all();
        
        
        $this->template->content->groups = $groups;
        
        $searchUrl = URL::site(Route::url('admin', array('controller' => 'siteGroups', 'lang'=> $this->getLanguage(), 'action'=> 'index' )));
        $searchUrlParams = array('search' => '');
        $searchUrl = Util_Url::addParameter($searchUrl, $searchUrlParams);
        
        $this->template->content->searchUrl = $searchUrl;
        $this->template->content->search = htmlspecialchars($search);

    }
    
    public function action_create(){
        $fields = array('code' => '', 'disabled' => '');
        $data = $this->_initFormData($fields, $_REQUEST);
        
        $errors = array();
        if (isset($_REQUEST['save'])){
            $this->_checkAccess(Admin_Access::ACCESS_CREATE);
            
            $roleList = array();
            
            
            $postValidator = Validation::factory($data);
            $postValidator->label('code', 'Code');
            
            $postValidator->label('disabled', 'Disable group');
            
            
            $postValidator->rule('code', 'not_empty');
            
            
            if ($postValidator->check()){
                
                try {
                    $group = new Model_Site_Group();
                    $group->code = $data['code'];
                    $group->is_disabled = $data['disabled'] ? 1 : 0;
                    $group->save();
                    $this->_addAudit(Admin_Audit::TYPE_ADD, "SiteGroup {$group->code} {$group->is_disabled}");
                }
                catch (Database_Exception $e){
                    if ($e->getCode() == 23000) $errors['login'] = ___('Group exists');
                    else throw $e;
                }
                catch (ORM_Validation_Exception $e){
                    $errors = $e->errors('group');
                }
                
                if (!count($errors)){
                                        
                    $this->setFlashNotice('Group added');
                    $this->redirect(
                        URL::site(Route::url('admin', array('controller'=>'siteGroups', 'lang' => $this->getLanguage(), 'action'=>'index'))));
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
        $redirectUrl = URL::site(Route::url('admin', array('controller'=>'siteGroups', 'lang' => $this->getLanguage(), 'action'=>'index')));
        
        if (!$id){
            $this->setFlashError('Group Id not found');
            $this->redirect($redirectUrl);
        }
        
        $group = ORM::factory('Site_Group')->where('id', '=', $id)->find();
        if (!$group->loaded()){
            $this->setFlashError('Group not found');
            $this->redirect($redirectUrl);
        }
        elseif ($group->loaded() && (in_array(strtolower($group->code), array('everyone', 'banned', 'premoderate', 'user')))){
            $this->setFlashError('Group '. $group->code .' can not edite');
            $this->redirect($redirectUrl);
        }
        else ;
        
        $errors = array();
        $fields = array('code' => '', 'disabled' => '');
        
        $groupData = $this->_initFormData($fields, array(
        'code' => $group->code,
        'disabled' => $group->is_disabled,
        ));
        
        
        if (!isset($_REQUEST['disabled'])) $_REQUEST['disabled'] = 0;
        
        $data = $groupData;
        $data = $this->_initFormData($fields, $_REQUEST, $data);
        
        
        
        if (isset($_REQUEST['save'])){
            $this->_checkAccess(Admin_Access::ACCESS_MODIFY);
                                   
            
            $dataSave = array();
            foreach ($data as $key => $value){
                if ($value != $groupData[$key]) $dataSave[$key] = $value;
            }

            
            $postValidator = Validation::factory($data);
            
            foreach ($dataSave as $key => $value){
                switch ($key){
                    case 'code' :
                         $postValidator->label('code', 'Login');
                         $postValidator->rule('code', 'not_empty');
                        break;
                
                    case 'disabled' :
                        $postValidator->label('disabled', 'Disable account');
                        break;

                }
            }
           
            
            if ($postValidator->check()){
            
                try {
                    foreach ($dataSave as $key => $value){
                        switch ($key){
                            case 'code' :
                                $group->code = $dataSave['code'];
                                break;
                    
                            
                    
                            case 'disabled' :
                                $group->is_disabled = $dataSave['disabled'] ? 1 : 0;
                                break;
                    
                           
                        }
                    }
                    
                    $group->save();
                    $this->_addAudit(Admin_Audit::TYPE_EDIT, "SiteGroup {$group->code} {$group->is_disabled}");
                }
                catch (Database_Exception $e){
                    if ($e->getCode() == 23000) $errors['login'] = ___('Group exists');
                    else throw $e;
                }
                catch (ORM_Validation_Exception $e){
                    $errors = $e->errors('group');
                }
            
                if (!count($errors)){
                                
                    $this->setFlashNotice('Group edited');
                    $this->redirect(URL::site($redirectUrl));
                }
            }
            else $errors = $postValidator->errors('valid');
            

        }
        else {
            $data = $this->_initFormData($fields, $groupData ,$_REQUEST);
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
            $groups = ORM::factory('Site_Group')->where('id', 'in', $ids)->find_all();
            
            $admDelGroup = false;
            
            foreach ($groups as $group){
                if (in_array(strtolower($group->code), array('everyone', 'banned', 'premoderate', 'user'))){
                    $this->setFlashError('Group '. $group->code .' can not delete');
                    $admDelGroup = true;
                    continue;
                }
                
                if ($this->getRights(Admin_Access::ACCESS_DELETE, 'delete', $group->id)->result){
	                $query = DB::delete('site_group_user')->where('site_group_id', '=', $group->id);
	                $query->execute();
	                
	                $query = DB::delete('site_group_access')->where('group_id', '=', $group->id);
	                $query->execute();
	
	                $this->_addAudit(Admin_Audit::TYPE_DELETE, "Group {$group->code} {$group->is_disabled}");
	                
	                $group->delete();
                } 
            }
            
            if (!($admDelGroup && $cnt == 1)) $this->setFlashNotice(($cnt == 1 ? 'Group deleted' : 'Groups deleted'));
            
        }
        else $this->setFlashNotice('Group Id not found');
        
        $this->redirect(
                URL::site(Route::url('admin', array('controller'=>'siteGroups', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    }
    
    protected function _form($options = array()){
        extract($options);
        
        if (count($errors)) $this->setFlashError('Some fields were filled with error');
        $this->template->title[] = isset($data['id']) ? 'Edit Group' : 'Create Group';
        $this->template->content = View::factory('admin/sitegroups_form');
        $this->template->content->errors = $errors;
        $this->template->content->data = $data;
        $this->_setDefaultVariablesToTemplate($this->template->content);
        
    }
    
    protected function _breadcrumbs(){
    	$lst = parent::_breadcrumbs();
    	$lst[] = array(
    		'icon' => 'fa fa-users',
    		'name' => 'SiteGroups',
    		'url'  => URL::site(Route::url('admin', array('controller'=>'siteGroups', 'lang' => $this->getLanguage(), 'action'=>'index')))
    	);
    	
    	$action = $this->_getAction();
    	
    	if ($action != 'index'){
    		$url = URL::site(Route::url('admin', array('controller'=>'siteGroups', 'lang' => $this->getLanguage(), 'action'=> $this->_getAction())));
    		if ($action == 'edit' && !empty($_REQUEST['checked'][0])) $url = Util_Url::addParameter($url, array('checked[]'=> $_REQUEST['checked'][0]));
    		
    		$lst[] = array(
    				'icon' => 'fa fa-users',
    				'name' => ucfirst($this->_getAction()),
    				'url'  => $url,
    		);
    	}
    	
    	return $lst;
    }    
}
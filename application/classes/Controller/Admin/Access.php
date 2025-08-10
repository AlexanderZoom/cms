<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Admin_Access extends Controller_Admin {

    public function action_index(){
        
        $id = !empty($_REQUEST['checked'][0]) ? $_REQUEST['checked'][0] : 0;
        if (!$id){
            $this->setFlashError('Group Id not found');
            $this->redirect(URL::site(Route::url('admin', array('controller'=>'groups', 'lang' => $this->getLanguage(), 'action'=>'index'))));
        }
        
        $group = ORM::factory('Admin_Group')->where('id', '=', $id)->find();
        if (!$group->loaded()){
            $this->setFlashError('Group not found');
            $this->redirect(URL::site(Route::url('admin', array('controller'=>'groups', 'lang' => $this->getLanguage(), 'action'=>'index'))));
        }
        elseif ($group->loaded() && (strtolower($group->code) == 'admin')){
            $this->setFlashError('Group Admin can not edit');
            $this->redirect(URL::site(Route::url('admin', array('controller'=>'groups', 'lang' => $this->getLanguage(), 'action'=>'index'))));
        }
        else ;
        
        $delim = '%';
        $emptyWord = 'EMPTY';
        $listAccessData = Admin_Access::getListAccess();
        
        
        if (isset($_POST['save'])){       	
            $this->_checkAccess(Admin_Access::ACCESS_MODIFY);
            
            $saveRight = array();
            foreach ($_POST as $row => $rowValues){
            	$rowData = explode($delim, $row);
            	
            	if (count($rowData) != 4) continue;
            	
            	$idxStr = "{$rowData[0]}{$delim}{$rowData[1]}{$delim}{$rowData[2]}";

            	if (!empty($listAccessData[$idxStr])){
            		$accessData = $listAccessData[$idxStr];
            		
            		if (empty($saveRight[$idxStr])){
            			$saveRight[$idxStr] = array(
            				'package' =>  $rowData[0],
            				'structure' => 	$rowData[1] != $emptyWord ? $rowData[1] : '',
            				'instance'	=> $rowData[2] != $emptyWord ? $rowData[2] : '',
            				'except' => 0,
            				'rights' => 0,	
            				'instance_inherit' => 0,
            				'instance_invert'  => 0,		
            			);
            		}
            		
            		if ($rowData[3] == 'EXCEPT'){
            			$saveRight[$idxStr]['except'] = 1;
            		}
            		elseif($rowData[3] == '_inherit_'){
            			$saveRight[$idxStr]['instance_inherit'] = 1;
            		}
            		elseif($rowData[3] == '_invert_'){
            			$saveRight[$idxStr]['instance_invert'] = 1;
            		}
            		elseif (!empty($accessData['rights'][$rowData[3]])){
            			$saveRight[$idxStr]['rights'] |= $accessData['rights'][$rowData[3]];
            		}
            		else ;
            	}
            }
            
            Admin_Access::deleteGroupAccessRight($id, '', '', 'EMPTY');
            
            if (count($saveRight)){            	
            	Admin_Access::setGroupAccessRight($id, $saveRight);
            	$this->_addAudit(Admin_Audit::TYPE_EDIT, "Access group id {$id} rights " . print_r($saveRight, true));
            }
            
        	
        }	
        
        
        $this->template->title[] = ___('Access for group :code', array(':code' => $group->code));
        $this->template->content = View::factory('admin/access_form');
        $this->template->content->listAccess = Modules::getAccessClasses();
        $this->template->content->delimName = $delim;
        $this->template->content->emptyWord = $emptyWord;
        $this->template->content->groupId = $id;
        

        $rights = array();
        $rowRights = Admin_Access::getGroupAccess($id);
        foreach ($rowRights as $idx => $data){
			if (!empty($data['instance'])) continue;
			
        	$instance = empty($data['instance']) ? $emptyWord : $data['instance'];
        	$structure = empty($data['structure']) ? $emptyWord : $data['structure'];
        
        	$rights["{$data['package']}{$delim}{$structure}{$delim}{$instance}"] = $data;
        }
        
        $this->template->content->rights = $rights;
        //print_r($rights);
    }
    
    public function action_instance(){
    
    	$isSelected = !empty($_REQUEST['selected']) ? $_REQUEST['selected'] : 0;
    	$search = !empty($_REQUEST['search']) ? $_REQUEST['search'] : ''; $search = trim($search);
    	
    	$id = !empty($_REQUEST['gid']) ? $_REQUEST['gid'] : 0;
    	$package = !empty($_REQUEST['package']) ? $_REQUEST['package'] : '';
    	$structure = !empty($_REQUEST['structure']) ? $_REQUEST['structure'] : '';
    	
    	if (!$id){
    		$this->setFlashError('Group Id not found');
    		$this->redirect(URL::site(Route::url('admin', array('controller'=>'groups', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    	}
    
    	$group = ORM::factory('Admin_Group')->where('id', '=', $id)->find();
    	if (!$group->loaded()){
    		$this->setFlashError('Group not found');
    		$this->redirect(URL::site(Route::url('admin', array('controller'=>'groups', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    	}
    	elseif ($group->loaded() && (strtolower($group->code) == 'admin')){
    		$this->setFlashError('Group Admin can not edit');
    		$this->redirect(URL::site(Route::url('admin', array('controller'=>'groups', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    	}
    	else ;
    
    	if (empty($package) || empty($structure)) {
    		$this->setFlashError('package or structure is empty');
    		$this->redirect(URL::site(Route::url('admin', array('controller'=>'groups', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    	}
    	
    	
    	
    	$delim = '%';
    	$emptyWord = 'EMPTY';
    	$listAccessData = Admin_Access::getListAccess();
    	
    	$idx = "{$package}{$delim}{$structure}{$delim}{$emptyWord}";
    	
    	
    	if (empty($listAccessData[$idx]['instance'])){
    		$this->setFlashError('instance not found');
    		$this->redirect(URL::site(Route::url('admin', array('controller'=>'groups', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    	}
    	
    	$instanceData = $listAccessData[$idx]['instance'];
    	
    	$instanceFileds = array('id', 'cols', 'model', 'search');
    	$instanceFiledsCheck = true;
    	
    	foreach ($instanceFileds as $field){
    		if (empty($instanceData[$field])){
    			$instanceFiledsCheck = false;
    			break;
    		}
    	}
    	
    	if (!$instanceFiledsCheck){
    		$this->setFlashError('instance structure is incorrect');
    		$this->redirect(URL::site(Route::url('admin', array('controller'=>'groups', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    	}
    	
    	$this->template->content = View::factory('admin/access_form_instance');
    	$this->template->content->pagination = '';
    	
    	$selectedIds = array();
    	if ($isSelected){
    		$rows = Admin_Access::getGroupAccessInstance($id, $package, $structure);
    		foreach ($rows as $row){
    			if ($row['instance']) $selectedIds[] = $row['instance'];
    		}
    	}
    	
    	$makeProcess = true;
    	if (count($selectedIds) == 0 && $isSelected) $makeProcess = false;
    	
    	if ($search && $makeProcess){
    		$searchData = ORM::factory($instanceData['model'])->
    						where($instanceData['search'], 'LIKE', "%{$search}%");
    		if (count($selectedIds)) $searchData->and_where($instanceData['id'], 'in', $selectedIds);
    		
    		$searchData = $searchData->find_all();
    		
    		if (count($searchData)) $selectedIds = array();
    		else $makeProcess = false;
    		
    		$idName = $instanceData['id'];
    		foreach ($searchData as $sIdx => $sData){
    			$selectedIds[] = $sData->$idName;
    		}
    	}
    	
    	$itemOnPage = Kohana::$config->load('admin.item_on_page');
    	$page = Arr::get($_GET, 'page', 1);
    	
    	$accessTotal = 0;
    	
    	if ($makeProcess){
    		$accessTotal = ORM::factory($instanceData['model']);
    		if (count($selectedIds)) $accessTotal->and_where($instanceData['id'], 'in', $selectedIds);
    		$accessTotal = $accessTotal->count_all();
    	}
    	
    	
    	$widgetDataClass = new Admin_Widget_Data();
    	$options = array(
    			'url' => URL::site(Route::url('admin', array('controller' => 'access', 'lang'=> $this->getLanguage(), 'action'=> 'instance', ))),
    			'total' => $accessTotal,
    			'page'  => $page,
    			'pages' => 5,
    			'data_class' => $widgetDataClass,
    			
    	);
    	$optUrlLst = array('gid' => $id, 'package' => $package, 'structure' => $structure);
    	if ($search) $optUrlLst['search'] = $search;
    	$options['url'] = Util_Url::addParameter($options['url'], $optUrlLst);
    	
    	$pagination = $this->getWidget('Pagination', $options);
    	$this->template->content->pagination = $pagination->execute();
    	$widgetData = $widgetDataClass->get();
    	
    	$page = Arr::get($widgetData, 'page', 1);
    	
    	$accessList = array();
    	
    	if ($makeProcess){
	    	$accessList = ORM::factory($instanceData['model'])->limit($itemOnPage);
	    	if (count($selectedIds)) $accessList->and_where($instanceData['id'], 'in', $selectedIds);
	    	if ( ($page -1) >0) $accessList->offset(($page -1) * $itemOnPage);
	    	$accessList = $accessList->find_all();
    	}
    	
    	$accessListIds = array();
    	$idName = $instanceData['id'];
    	foreach ($accessList as $a){
    		$accessListIds[] = $a->$idName;
    	}	
    	
    	
    	$accessListInstances = array();
    	if (count($accessListIds)){
    		$rows = Admin_Access::getGroupAccessInstance($id, $package, $structure, $accessListIds);
    		foreach ($rows as $row){
    			$accessListInstances[$row['instance']] = $row;
    		}
    	}
    	
    	if (isset($_POST['save'])){
    		$this->_checkAccess(Admin_Access::ACCESS_MODIFY);
    		
    		$saveData = array();
    		foreach ($_POST as $par => $parVal){
    			$parExp = explode($delim, $par);
    			
    			if (count($parExp) == 5){    				
    				$parIdx = "{$parExp[0]}{$delim}{$parExp[1]}{$delim}{$emptyWord}";
    				$saveIdx = "{$parExp[0]}{$delim}{$parExp[1]}{$delim}{$emptyWord}{$delim}{$parExp[3]}";
    				
    				
    				//echo "{$idx} {$parIdx} {$saveIdx} {$parExp[4]} {$parExp[3]}";
    				if ($parIdx == $idx && 
    					isset($listAccessData[$idx]['instance']['rights'][$parExp[4]]) && 
    					in_array($parExp[3], $accessListIds)){
    					
    					if (!isset($saveData[$saveIdx])){
    						$saveData[$saveIdx] = array(
    								'package' =>  $package,
    								'structure' => 	$structure,
    								'instance'	=> $parExp[3],
    								'except' => 0,
    								'rights' => 0,
    								'instance_inherit' => 0,
    								'instance_invert' => 0,
    								
    						);
    						
    					}
    					
    					
    					$saveData[$saveIdx]['rights'] |= $listAccessData[$idx]['instance']['rights'][$parExp[4]];
    				}
    			}
    		}
    		
    		Admin_Access::deleteGroupAccessRight($id, $package, $structure, $accessListIds);
    		
    		if (count($saveData)){		
    			Admin_Access::setGroupAccessRight($id, $saveData);
    			$this->_addAudit(Admin_Audit::TYPE_EDIT, "Access group id {$id} rights " . print_r($saveData, true));
    			$this->setFlashNotice('Access saved');
    		}
    		
    		$redirectUrl = URL::site(Route::url('admin', array('controller' => 'access', 'lang'=> $this->getLanguage(), 'action'=> 'instance' )));
    		$redirectUrlParams = array('gid' => $id, 'package' => $package, 'structure' => $structure);
    		if ($isSelected) $redirectUrlParams['selected'] = 1;
    		if ($search) $redirectUrlParams['search'] = $search;
    		$redirectUrl = Util_Url::addParameter($redirectUrl, $redirectUrlParams);
    		
    		$this->redirect($redirectUrl);
    		
    	}
    	
    	//print_r($accessListInstances);
    	
    	$this->template->title[] = ___('Instance access for group <i>:code</i> package <i>:package</i> structure <i>:structure</i>', array(':code' => $group->code, ':package' => $package, ':structure' => $structure));
    	$this->template->content->accessList = $accessList;
    	$this->template->content->accessListInstances = $accessListInstances;
    	$this->template->content->cols = $instanceData['cols'];
    	$this->template->content->instanceId = $instanceData['id'];
    	$this->template->content->rightsList = $instanceData['rights'];
    	$this->template->content->package = $package;
    	$this->template->content->structure = $structure;
    	$this->template->content->emptyWord = $emptyWord;
    	$this->template->content->delimName = $delim;
    	
    	
    	
    	$backUrl = URL::site(Route::url('admin', array('controller' => 'access', 'lang'=> $this->getLanguage(), 'action'=> 'index' )));
    	$backUrl = Util_Url::addParameter($backUrl, array('checked[]'=> $id));
    	
    	$resetUrl = URL::site(Route::url('admin', array('controller' => 'access', 'lang'=> $this->getLanguage(), 'action'=> 'instance' )));
    	$resetUrl = Util_Url::addParameter($resetUrl, array('gid' => $id, 'package' => $package, 'structure' => $structure));
    	
    	$selectedUrl = URL::site(Route::url('admin', array('controller' => 'access', 'lang'=> $this->getLanguage(), 'action'=> 'instance' )));
    	$selectedUrlParams = array('gid' => $id, 'package' => $package, 'structure' => $structure, 'selected' => 1);
    	if($search) $selectedUrlParams['search'] = htmlspecialchars($search);
    	$selectedUrl = Util_Url::addParameter($selectedUrl, $selectedUrlParams);
    	
    	$searchUrl = URL::site(Route::url('admin', array('controller' => 'access', 'lang'=> $this->getLanguage(), 'action'=> 'instance' )));
    	$searchUrlParams = array('gid' => $id, 'package' => $package, 'structure' => $structure);
    	if($isSelected) $searchUrlParams['selected'] = 1;
    	$searchUrl = Util_Url::addParameter($searchUrl, $searchUrlParams);
    	
    	$this->template->content->backUrl = $backUrl;
    	$this->template->content->resetUrl = $resetUrl;
    	$this->template->content->selectedUrl = $selectedUrl;
    	$this->template->content->searchUrl = $searchUrl;
    	$this->template->content->search = htmlspecialchars($search);
    }
    
    protected function _breadcrumbs(){
    	$lst = parent::_breadcrumbs();
    	$lst[] = array(
    			'icon' => 'fa fa-users',
    			'name' => 'Groups',
    			'url'  => URL::site(Route::url('admin', array('controller'=>'groups', 'lang' => $this->getLanguage(), 'action'=>'index')))
    	);
    	
    	$action = $this->_getAction();
    	
    	if ($action == 'index')$id = !empty($_REQUEST['checked'][0]) ? $_REQUEST['checked'][0] : 0;
    	else $id = !empty($_REQUEST['gid']) ? $_REQUEST['gid'] : 0;
    	
    	$url = URL::site(Route::url('admin', array('controller' => 'access', 'lang'=> $this->getLanguage(), 'action'=> 'index' )));
    	$url = Util_Url::addParameter($url, array('checked[]' => $id));
    	
    	$lst[] = array(
    			'icon' => 'fa fa-unlock-alt',
    			'name' => 'Access',
    			'url'  => $url
    	);
    	 
    	

    	if ($action == 'instance'){
    		$id = !empty($_REQUEST['gid']) ? $_REQUEST['gid'] : 0;
    		$package = !empty($_REQUEST['package']) ? $_REQUEST['package'] : '';
    		$structure = !empty($_REQUEST['structure']) ? $_REQUEST['structure'] : '';
    		
    		$url = URL::site(Route::url('admin', array('controller' => 'access', 'lang'=> $this->getLanguage(), 'action'=> 'instance' )));
    		$url = Util_Url::addParameter($url, array('gid' => $id, 'package' => $package, 'structure' => $structure));
    		
    		$lst[] = array(
    				'icon' => 'fa fa-unlock-alt',
    				'name' => 'Instance access',
    				'url'  => $url
    		);
    	}
    	 
    	return $lst;
    }
}
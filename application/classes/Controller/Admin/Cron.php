<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Admin_Cron extends Controller_Admin {

    public function action_index(){    	
    	
        $this->template->title[] = 'Cron';
        $this->template->content = View::factory('admin/cron');
        $this->template->content->pagination = '';
        
        $itemOnPage = Kohana::$config->load('admin.item_on_page');
        $page = Arr::get($_GET, 'page', 1);
        
        $model = ORM::factory('Admin_Cron');  
        if (!$model) new Admin_Exception(500, 'Model for cron not found');

        
        
        $model2 = clone $model;
        $cronTotal = $model->count_all();

        $widgetDataClass = new Admin_Widget_Data();
        $optUrl = URL::site(Route::url('admin', array('controller' => 'cron', 'lang'=> $this->getLanguage())));
        
        
        $options = array(
        'url' => $optUrl,
        'total' => $cronTotal,
        'page'  => $page,
        'pages' => 5,
        'data_class' => $widgetDataClass,
        'item_on_page' => $itemOnPage,
        );
        
        $pagination = $this->getWidget('Pagination', $options);
        $this->template->content->pagination = $pagination->execute();
        $widgetData = $widgetDataClass->get();
        
        $page = Arr::get($widgetData, 'page', 1);
        
        
        $crons = $model2->limit($itemOnPage);
        if ( ($page -1) >0) $crons->offset(($page -1) * $itemOnPage);
        $crons = $crons->find_all();
        
        
        $this->template->content->crons = $crons;

    }

    public function action_create(){
        $fields = array('minute' => '', 'hour' => '', 'mday' => '', 'month' => '', 'wday' => '', 'command' => '', 'comment' => '');
        $data = $this->_initFormData($fields, $_REQUEST);
        
        $errors = array();
        if (isset($_REQUEST['save'])){
            $this->_checkAccess(Admin_Access::ACCESS_CREATE);
            
            $roleList = array();
            
            
            $postValidator = Validation::factory($data);
            $postValidator->label('minute', 'Minute');            
            $postValidator->label('hour', 'Hour');
            $postValidator->label('mday', 'Mday');
            $postValidator->label('month', 'Month');
            $postValidator->label('wday', 'WDay');
            $postValidator->label('command', 'Command');
            
            $postValidator->rule('minute', 'not_empty');
            $postValidator->rule('hour', 'not_empty');
            $postValidator->rule('mday', 'not_empty');
            $postValidator->rule('month', 'not_empty');
            $postValidator->rule('wday', 'not_empty');
            $postValidator->rule('command', 'not_empty');
            
            
            if ($postValidator->check()){
                
                try {
                    $model = ORM::factory('Admin_Cron');  
                    $model->minute = $data['minute'];
                    $model->hour = $data['hour'];
                    $model->mday = $data['mday'];
                    $model->month = $data['month'];
                    $model->wday = $data['wday'];
                    $model->command = $data['command'];
                    $model->comment = $data['comment'];
                    
                    $model->save();
                    
                    $this->_addAudit(Admin_Audit::TYPE_ADD, "Cron {$model->minute} {$model->hour} {$model->mday} {$model->month} {$model->wday} {$model->command} {$model->comment}");
                }
                catch (Database_Exception $e){
                    if ($e->getCode() == 23000) $errors['command'] = ___('Command exists');
                    else throw $e;
                }
                catch (ORM_Validation_Exception $e){
                    $errors = $e->errors('cron');
                }
                
                if (!count($errors)){
                                        
                    $this->setFlashNotice('Cron added');
                    $this->redirect(
                        URL::site(Route::url('admin', array('controller'=>'cron', 'lang' => $this->getLanguage(), 'action'=>'index'))));
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
        $redirectUrl = URL::site(Route::url('admin', array('controller'=>'cron', 'lang' => $this->getLanguage(), 'action'=>'index')));
        
        if (!$id){
            $this->setFlashError('Cron Id not found');
            $this->redirect($redirectUrl);
        }
        
        $model = ORM::factory('Admin_Cron')->where('id', '=', $id)->find();
        if (!$model->loaded()){
            $this->setFlashError('Cron not found');
            $this->redirect($redirectUrl);
        }        
        else ;
        
        $errors = array();
        $fields = array('minute' => '', 'hour' => '', 'mday' => '', 'month' => '', 'wday' => '', 'command' => '', 'comment' => '');
        
        $cronData = $this->_initFormData($fields, array(
        'minute' => $model->minute,
        'hour' => $model->hour, 
        'mday' => $model->mday, 
        'month' => $model->month,
        'wday' => $model->wday, 
        'command' => $model->command,
        'comment' => $model->comment		
        ));
        
        
        
        
        $data = $cronData;
        $data = $this->_initFormData($fields, $_REQUEST, $data);
        
        
        
        if (isset($_REQUEST['save'])){
            $this->_checkAccess(Admin_Access::ACCESS_MODIFY);
                                   
            
            $dataSave = array();
            foreach ($data as $key => $value){
                if ($value != $cronData[$key]) $dataSave[$key] = $value;
            }

            
            $postValidator = Validation::factory($data);
            
            foreach ($dataSave as $key => $value){
                switch ($key){
                    case 'minute' :
						$postValidator->label ( 'minute', 'Minute' );
						$postValidator->rule ( 'minute', 'not_empty' );
						break;
					
					case 'hour' :
						$postValidator->label ( 'hour', 'Hour' );
						$postValidator->rule ( 'hour', 'not_empty' );
						break;
					
					case 'mday' :
						$postValidator->label ( 'mday', 'Mday' );
						$postValidator->rule ( 'mday', 'not_empty' );
						break;
					
					case 'month' :
						$postValidator->label ( 'month', 'Month' );
						$postValidator->rule ( 'month', 'not_empty' );
						break;
					
					case 'wday' :
						$postValidator->label ( 'wday', 'Wday' );
						$postValidator->rule ( 'wday', 'not_empty' );
						break;
					
					case 'command' :
						$postValidator->label ( 'command', 'Command' );
						$postValidator->rule ( 'command', 'not_empty' );
						break;
                    

                }
            }
           
            
            if ($postValidator->check()){
            
                try {
                    foreach ($dataSave as $key => $value){
                        switch ($key){
							case 'minute' :
								$model->minute = $dataSave ['minute'];
								break;
							
							case 'hour' :
								$model->hour = $dataSave ['hour'];
								break;
							
							case 'mday' :
								$model->mday = $dataSave ['mday'];
								break;
							
							case 'month' :
								$model->month = $dataSave ['month'];
								break;
							
							case 'wday' :
								$model->wday = $dataSave ['wday'];
								break;
							
							case 'command' :
								$model->command = $dataSave ['command'];
								break;
                            
							case 'comment' :
								$model->comment = $dataSave ['comment'];
								break;
                            
                    
                           
                        }
                    }
                    
                    $model->save();
                    
                    $this->_addAudit(Admin_Audit::TYPE_EDIT, "Cron {$model->minute} {$model->hour} {$model->mday} {$model->month} {$model->wday} {$model->command} {$model->comment}");
                }
                catch (Database_Exception $e){
                    if ($e->getCode() == 23000) $errors['command'] = ___('Cron exists');
                    else throw $e;
                }
                catch (ORM_Validation_Exception $e){
                    $errors = $e->errors('cron');
                }
            
                if (!count($errors)){
                                
                    $this->setFlashNotice('Cron edited');
                    $this->redirect(URL::site($redirectUrl));
                }
            }
            else $errors = $postValidator->errors('valid');
            

        }
        else {
            $data = $this->_initFormData($fields, $cronData ,$_REQUEST);
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
            $models = ORM::factory('Admin_Cron')->where('id', 'in', $ids)->find_all();
            
            
            
            foreach ($models as $model){
                
                
            	$this->_addAudit(Admin_Audit::TYPE_DELETE, "Cron {$model->minute} {$model->hour} {$model->mday} {$model->month} {$model->wday} {$model->command}");

                $model->delete();
            }
            
            if ($cnt == 1) $this->setFlashNotice(($cnt == 1 ? 'Cron deleted' : 'Crons deleted'));
            
        }
        else $this->setFlashNotice('Cron Id not found');
        
        $this->redirect(
                URL::site(Route::url('admin', array('controller'=>'cron', 'lang' => $this->getLanguage(), 'action'=>'index'))));
    }
    
    protected function _form($options = array()){
        extract($options);
        
        if (count($errors)) $this->setFlashError('Some fields were filled with error');
        $this->template->title[] = isset($data['id']) ? 'Edit Cron' : 'Create Cron';
        $this->template->content = View::factory('admin/cron_form');
        $this->template->content->errors = $errors;
        $this->template->content->data = $data;
        $this->_setDefaultVariablesToTemplate($this->template->content);
        
    }
    
    protected function _breadcrumbs(){
    	$lst = parent::_breadcrumbs();
    	$lst[] = array(
    		'icon' => 'fa fa-clock-o',
    		'name' => 'Cron',
    		'url'  => URL::site(Route::url('admin', array('controller'=>'cron', 'lang' => $this->getLanguage(), 'action'=>'index')))
    	);
    	
    	$action = $this->_getAction();
    	
    	if ($action != 'index'){
    		$url = URL::site(Route::url('admin', array('controller'=>'cron', 'lang' => $this->getLanguage(), 'action'=> $this->_getAction())));
    		if ($action == 'edit' && !empty($_REQUEST['checked'][0])) $url = Util_Url::addParameter($url, array('checked[]'=> $_REQUEST['checked'][0]));
    		
    		$lst[] = array(
    				'icon' => 'fa fa-clock-o',
    				'name' => ucfirst($this->_getAction()),
    				'url'  => $url,
    		);
    	}
    	
    	return $lst;
    }    
}
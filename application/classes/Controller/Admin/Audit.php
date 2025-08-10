<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Admin_Audit extends Controller_Admin {

    public function action_index(){    	
    	
        $this->template->title[] = 'Audit';
        $this->template->content = View::factory('admin/audit');
        $this->template->content->pagination = '';
        
        $itemOnPage = 100;
        $page = Arr::get($_GET, 'page', 1);
        
        
        $cParams = array(
        		'limit' => $itemOnPage,
        		'offset' => 0,        		
        		'count' => true,
        );
        
        $auditTotal = Admin_Audit::get($cParams);
        

        $widgetDataClass = new Admin_Widget_Data();
        $optUrl = URL::site(Route::url('admin', array('controller' => 'audit', 'lang'=> $this->getLanguage())));
        
        
        
        $options = array(
        'url' => $optUrl,
        'total' => $auditTotal,
        'page'  => $page,
        'pages' => 5,
        'data_class' => $widgetDataClass,
        'item_on_page' => $itemOnPage,		
        );
        
        $pagination = $this->getWidget('Pagination', $options);
        $this->template->content->pagination = $pagination->execute();
        $widgetData = $widgetDataClass->get();
        
        $page = Arr::get($widgetData, 'page', 1);
        
        
        $rParams = array(
        		'limit' => $itemOnPage,
        		'offset' => 0,        		
        		'count' => false,
        );
        

        if ( ($page -1) >0) $rParams['offset'] = ($page -1) * $itemOnPage;
        
        $audits = Admin_Audit::get($rParams);
        
        $this->template->content->audits = $audits;

    }

    
    
    protected function _breadcrumbs(){
    	$lst = parent::_breadcrumbs();
    	$lst[] = array(
    		'icon' => 'fa fa-info',
    		'name' => 'Audit',
    		'url'  => URL::site(Route::url('admin', array('controller'=>'audit', 'lang' => $this->getLanguage(), 'action'=>'index')))
    	);
    	
    	
    	
    	return $lst;
    }    
}
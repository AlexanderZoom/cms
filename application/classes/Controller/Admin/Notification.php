<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Admin_Notification extends Controller_Admin {

    public function action_index(){    	
    	
        $this->template->title[] = 'Notification';
        $this->template->content = View::factory('admin/notification');
        $this->template->content->pagination = '';
        
        $itemOnPage = 100;
        $page = Arr::get($_GET, 'page', 1);
        $isAll = isset($_GET['all']) ? true : false;
        
        $cParams = array(
        		'limit' => $itemOnPage,
        		'offset' => 0,
        		'user'	=> $this->getUser(),
        		'all'	=> $isAll,
        		'count' => true,
        );
        
        $notificationTotal = Admin_Notification::get($cParams);
        

        $widgetDataClass = new Admin_Widget_Data();
        $optUrl = URL::site(Route::url('admin', array('controller' => 'notification', 'lang'=> $this->getLanguage())));
        if ($isAll) $optUrl = Util_Url::addParameter($optUrl, array('all' => $isAll ? 1 : 0));
        
        
        $options = array(
        'url' => $optUrl,
        'total' => $notificationTotal,
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
        		'user'	=> $this->getUser(),
        		'all'	=> $isAll,
        		'count' => false,
        );
        
        
        
        
        if ( ($page -1) >0) $rParams['offset'] = ($page -1) * $itemOnPage;
        
        $notifications = Admin_Notification::get($rParams);
        
        $idV = array();
        foreach ($notifications as $notification){
        	if (!$notification['visit']) $idV[] = $notification['id'];
        }
        
        Admin_Notification::setVisit($idV, $this->getUser());
        
        $this->template->content->notifications = $notifications;

    }

    
    
    protected function _breadcrumbs(){
    	$lst = parent::_breadcrumbs();
    	$lst[] = array(
    		'icon' => 'fa fa-bell',
    		'name' => 'Notification',
    		'url'  => URL::site(Route::url('admin', array('controller'=>'notification', 'lang' => $this->getLanguage(), 'action'=>'index')))
    	);
    	
    	
    	
    	return $lst;
    }    
}
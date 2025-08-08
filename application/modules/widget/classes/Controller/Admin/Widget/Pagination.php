<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Admin_Widget_Pagination extends Controller_Admin_Widget {

    public function default_options_widget(){

        return $defaultOptions = array(
        'page' => 1,
        'page_name'   => 'page', //quantity files
        'item_on_page' => Kohana::$config->load('admin.item_on_page'),
        'total' => 0,
        'url' => '',
        'pages' => 5,
        );

    }

    protected function body_widget($options){
        if (!$options['url']) throw new Controller_Admin_Widget_Exception('url option required');
        
        $page = $options['page'];
        $pages = $options['pages'];
        $total_pages = ceil($options['total']/$options['item_on_page']);
        $start = 1;
        $end = $total_pages;
        
        if ($page > $total_pages) $page = $total_pages;
        if ($page < 1) $page = 1;
        
        if ($pages < $total_pages){
            $pages_right = floor($pages / 2);
            $pages_left = $pages - $pages_right;
            if (($page + $pages_right -1) > $total_pages){
                $pages_left += ($page + $pages_right -1) - $total_pages;
            }
            else $end = $page + $pages_right - 1;
        
            if ($page - $pages_left < 1){
                if (($end + ($pages_left-$page + 1)) < $total_pages) $end +=  ($pages_left - $page + 1);
                else $end = $total_pages;
            }
            else $start = $page - $pages_left;
        }
        
        
        $prev = $page - 1 > 1 ? $page - 1 : 1;
        $next = $page + 1 < $total_pages ? $page + 1 : $total_pages;
        
        $options['total_pages'] = $total_pages;
        $options['page'] = $page;
        $options['start'] = $start;
        $options['end'] = $end;
        $options['prev'] = $prev;
        $options['next'] = $next;

        $this->_data = $options;
    }

    protected function template_widget(){
        return 'admin/widget/pagination';
    }
}
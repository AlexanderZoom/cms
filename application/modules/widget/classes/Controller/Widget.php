<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Widget extends Controller {
    
    protected static  $_options = array();
    
    public function before()
    {
        if ($this->request->is_initial()){
            throw new HTTP_Exception_404('Widget only internal call');
        }
    }
    
    public static function setOptions($widgetName, $options){
        self::$_options[$widgetName] = $options;
    }
    
    public static function getOptions($widgetName){
        return Arr::get(self::$_options, $widgetName, array());
    }
    
    
    public function action_widget(){
        
        $widgetName = str_replace('Controller_', '', get_class($this));
        $options = array_merge($this->default_options_widget(), self::getOptions($widgetName));
        $this->body_widget($options);
    
        $view = View::factory($this->template_widget());
        foreach ($options as $optionKey => $optionValue){
            $view->set($optionKey, $optionValue);
        }
    
        $this->response->body($view->render());
        
    }
}
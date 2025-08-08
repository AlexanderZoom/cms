<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Admin_Widget extends Controller {

    protected static  $_options = array();
    protected $_data = array();

    public function before()
    {
        if ($this->request->is_initial()){
            throw new Admin_HTTP_Exception_404('Widget only internal call');
        }
    }

    public static function setOptions($widgetName, $options){
        self::$_options[$widgetName] = $options;
    }

    public static function getOptions($widgetName){
        return Arr::get(self::$_options, $widgetName, array());
    }


    public function action_widget(){

        $widgetName = str_replace('Controller_Admin_Widget_', '', get_class($this));
        $options = array_merge($this->default_options_widget(), self::getOptions($widgetName));
        $this->body_widget($options);

        if (isset($options['data_class']) && $options['data_class'] instanceof Admin_Widget_Data){
            $options['data_class']->set($this->getData());
        }
        
        $view = View::factory($this->template_widget());
        foreach ($this->getData() as $optionKey => $optionValue){
            $view->set($optionKey, $optionValue);
        }

        $this->response->body($view->render());

    }
    
    public function getData(){
        return $this->_data;
    }
}
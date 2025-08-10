<?php defined('SYSPATH') OR die('No direct script access.');

abstract class Controller extends Kohana_Controller {
    
    public function getWidget($name, $options = array()){
        Controller_Widget::setOptions($name, $options);
        $request = Request::factory($name, $options);
        return $request->execute();
    }
}
<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Widget_UploadFromSimple extends Controller_Widget {
    
    public function default_options_widget(){
        
        return $defaultOptions = array(
            'upload' => '', //url for action
            'files'   => 1, //quantity files
            'max_file_size' => 0,
        );
                
    }
    
    protected function body_widget($options){
        if (!$options['upload']) throw new Controller_Widget_Exception('Upload option required');
    }
    
    protected function template_widget(){
        return 'widget/upload_form_simple';
    }
}
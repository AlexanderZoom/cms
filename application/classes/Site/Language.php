<?php defined('SYSPATH') OR die('No direct script access.');
class Site_Language {
    static public function get(){
        $langConfig = Model_Setting::get('site.main.default_language');
        $langSession = Site_Session::instance()->get('LANG');
        $langParam = Request::initial() ? Request::initial()->param('lang') : '';
        
        $lang = '';
        
        if (!$langParam){
            if (!$langSession){
                self::set($langConfig);
                $lang = $langConfig;
            }
            else {
                self::set($langSession);
                $lang = $langSession;
            }
        }
        else {
            self::set($langParam);
            $lang = $langParam;
        }
        
        return $lang;
    }
    
    static public function set($lang){
        Site_Session::instance()->set('LANG', $lang);
        I18n::lang($lang);
    }
    
    static public function init($advFiles = array()){
        $lang = self::get(); // get and init current language
        
        //init i18n dict
        I18n_Core::getInstance()->addAdvFile('site');
        
        if (count($advFiles)){
            $obj = I18n_Core::getInstance();
            foreach ($advFiles as $advFile){
                $obj->addAdvFile($advFile);
            }
        }
    }
}
<?php defined('SYSPATH') or die('No direct script access.');
class Model_Site_User extends ORM {
    protected $_table_name = 'site_user';
    protected $_primary_key = 'id';
    protected $_created_column = array('column' => 'created_at', 'format' => 'Y-m-d H:i:s');
    protected $_updated_column = array('column' => 'updated_at', 'format' => 'Y-m-d H:i:s');
    
    protected $_groupCodes = array();
    protected $_groupsId = array();
    
    protected $_has_many = array(
        'groups' => array(
            'far_key' => 'site_group_id',
            'foreign_key' => 'site_user_id',
            'model' => 'Site_Group',
            'through' => 'site_group_user',
        ),
    );
    
    public function rules(){
        return array(
        'login' => array(
        array('not_empty'),
        array('min_length', array(':value', 2)),
        array('max_length', array(':value', 100)),
        ),
    
        'password' => array(
            array('not_empty'),
        ),
        
        'password_salt' => array(
        array('not_empty'),
        ),
    
        );
    }
    
    public function labels(){
        return array(
        'login' => ___('model.site_user.login'),
        'password' => ___('model.site_user.password'),
        'password_salt' => ___('model.site_user.password_salt'),
        'is_disabled' => ___('model.site_user.is_disabled'),
        'created_at' => ___('model.general.created_at'),
        'updated_at' => ___('model.general.updated_at'),
    
        );
    }
    
    public function isDisabled(){
        return (bool) $this->get('is_disabled');
    }
    
    public function getSalt(){
        if (!$this->get('password_salt')){
            $this->set('password_salt', substr(md5(microtime(true)), 0, 10));
        }
        
        return $this->get('password_salt');
    }
    
    public function checkPassword($plainPassword){
        return ( md5(md5($plainPassword . $this->getSalt())) == $this->get('password') );
    }
    
    public function setPassword($plainPassword){
        $this->set('password', md5(md5($plainPassword . $this->getSalt())));
    }
    
    public function hasGroup($group, $cache = true){
        if (!$this->loaded()) return false;
        
        
        $groupCodes = array();
        
        if($cache && count($this->_groupCodes)) $groupCodes = $this->_groupCodes;
        else {
            foreach ($this->groups->find_all() as $groupItem){
                $groupCodes[] = $groupItem->get('code');
            }
            
            if ($cache) $this->_groupCodes = $groupCodes;
        }

        
        if (!count($groupCodes)) return false;
        
        $isSuccess = true;
        
        if (is_array($group)){
            foreach ($group as $groupItem){
                if ($groupItem instanceof Model_Site_Group){
                    if (!in_array($groupItem->get('code'), $groupCodes)) { $isSuccess = false; break; }
                }
                elseif (is_string($groupItem)) {
                    if (!in_array($groupItem, $groupCodes)) { $isSuccess = false; break; }
                }
                else {
                    $isSuccess = false; break;
                }
            }
        }
        elseif ($group instanceof Model_Site_Group){
            if (!in_array($group->get('code'), $groupCodes)) { $isSuccess = false; }
        }
        elseif(is_string($group)) {
            if (!in_array($group, $groupCodes)) { $isSuccess = false; }
        }
        else { $isSuccess = false; }
        
        if ($isSuccess) return true;
        
        return false;
        
    }
    
    public function getGroupsId($cache = true){
        if ($cache && count($this->_groupsId)) return $this->_groupsId;
        else {
            $groupsId = array();
            foreach ($this->groups->find_all() as $groupItem){
                $groupsId[] = $groupItem->get('id');
            }
            
            if ($cache) $this->_groupsId = $groupsId;
            
            return $groupsId;
        }
    }
    
}
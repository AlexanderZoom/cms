<?php defined('SYSPATH') OR die('No direct script access.');
class Admin_Menu {
    protected $_name;
    protected $_label;
    protected $_position;
    protected $_controller;
    protected $_controller4Route;
    protected $_action;
    protected $_access;
    protected $_extra;
    protected $_child = array();
    protected $_parent;
    protected $_labelMenu = false;
    
    protected $_sorted = false;
    
    public $setParent = null;
    
    public function __construct($options = array()){
        foreach ($options as $optionName => $optionValue){
            switch ($optionName){
                case 'name':
                    $this->_name = $optionValue;
                    break;

                case 'position':
                    $this->_position = $optionValue;
                    break;
                    
                case 'controller':
                    $this->_controller = $optionValue;
                    $this->_controller4Route = lcfirst(str_replace('Controller_Admin_', '', $optionValue));
                    break;
                    
                case 'action':
                    $this->_action = $optionValue;
                    break;
                    
                case 'access':
                    $this->_access = $optionValue;
                    break;
                    
                case 'extra':
                    if (is_array($optionValue))
                        $this->_extra = $optionValue;
                    break;
                    
                case 'label-menu':                    
                    $this->_labelMenu = (bool) $optionValue;
                    break;
                    
               case 'set-parent':
               		$this->setParent = $optionValue;
                  	break;
                    
                case 'child':
                    if (is_array($optionValue))
                    foreach ($optionValue as $child){
                        $childContainer = new Admin_Menu($child);
                        $this->addChild($childContainer);
                    }
                    break;
            }
                    
        }
        
        $emptyPosition = 9999999;
        
        if (!$this->_position) $this->_position = $emptyPosition;
        if ($this->_position <  0) $this->_position = $emptyPosition + abs($this->_position);
                
        foreach (array($this->_name, $this->_controller, $this->_action, $this->_access) as $value){
            if (!$value) throw new Admin_Exception('Require property for admin menu is empty. options: ' . print_r($options, true));
        }
        
        Admin_Language::get();
        
        $this->_label = ___($this->_name);
        
    }
    
    public function addChild(Admin_Menu $child){
        $this->_sorted = false;
        if ($child->setParent){
        	foreach ($this->_child as $idx => $item){
        		if ($item->getName() == $child->setParent){
        			$child->setParent = null;
        			$item->addChild($child);
        		}
        	}
        }
        else{
        	$this->_child[] = $child;
        	$child->setParent($this);
        }
    }
    
    public function isLabelMenu(){
    	return $this->_labelMenu;
    }
    
    public function getName(){
        return $this->_name;
    }
    
    public function getLabel(){
        return $this->_label;
    }
    
    public function getPosition(){
        return $this->_position;
    }
    
    public function getController(){
        return $this->_controller;
    }
    
    public function getController4Route(){
        return $this->_controller4Route;
    }
    
    public function getAction(){
        return $this->_action;
    }
    
    public function getAccess(){
        return $this->_access;
    }
    
    public function getExtra(){
        return $this->_extra;
    }
    
    public function getParent(){
        return $this->_parent;
    }
    
    public function setParent(Admin_Menu $parent){
    	$this->_parent = $parent;
    }
    
    public function getChilds(){
        if ($this->_sorted) return $this->_child;
        elseif(count($this->_child)) {
            $sortList = array();
            foreach ($this->_child as $idx => $child){
                $newIdx = $child->getPosition() . '-' . $child->getLabel() . '-idx-' . $idx;
                $sortList[$newIdx] = $idx;
            }
            
            ksort($sortList, SORT_NATURAL);
            $newChilds = array();
            foreach ($sortList as $idx){
                $newChilds[] = $this->_child[$idx];
            }
            
            $this->_child = $newChilds;
            $this->_sorted = true;
        }
            
        return $this->_child;
    }
    
    public function hasChild(){
        return ((bool) count($this->_child));
    }
    
    
}
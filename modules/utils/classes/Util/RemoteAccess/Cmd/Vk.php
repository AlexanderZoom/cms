<?php defined('SYSPATH') or die('No direct script access.');
class Util_RemoteAccess_Cmd_Vk extends Util_RemoteAccess_Cmd{
    protected $_curlFile;
    
    public function __construct($curlFile=''){
        $this->_curlFile = $curlFile;
    }
    
    public function GetFriendsOnline($arguments = array()){
        if (empty($arguments['id'])) throw new Util_RemoteAccess_Exception('Argument Id not found');
        return $this->GetFriends(array('id' => $arguments['id'], 'section' => 'online'));
    
    }
    
    public function GetFriendsAll($arguments = array()){
        if (empty($arguments['id'])) throw new Util_RemoteAccess_Exception('Argument Id not found');
        return $this->GetFriends(array('id' => $arguments['id'], 'section' => 'all'));
    
    }
    
    public function GetFriends($arguments = array()){
        if (empty($arguments['id'])) throw new Util_RemoteAccess_Exception('Argument Id not found');
        if (empty($arguments['section'])) throw new Util_RemoteAccess_Exception('Argument Section not found');
    
        echo $url = "https://vk.com/friends?id={$arguments['id']}&section={$arguments['section']}";
        $cw = Util_RemoteAccess_Proto_Http::get($url, '', '', $this->_curlFile);
        $cw->setOption('CURLOPT_FOLLOWLOCATION', true);
        $cw->setOption('CURLOPT_MAXREDIRS', 5);
        $out = $cw->run();
    
        $result = new Util_RemoteAccess_Response();
    
        if (preg_match_all('/<a class="si_owner" href="(.*?)">(.*?)<\/a>/i', $out['data'], $matches)){
    
            $resData = array();
            foreach ($matches[1] as $k => $v){
                $resData[] = array('name' => $v, 'url' => $matches[2][$k]);
            }
            $result->data = $resData;
        }
    
    
        $result->plainData = $out;
    
        return $result;
    }
    
    public function checkAuthObj($auth){
        if ($auth instanceof Util_RemoteAccess_Auth_VkServerAuth) return true;
    
        return false;
    }
}
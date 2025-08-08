<?php defined('SYSPATH') or die('No direct script access.');
class Util_Curl_Wrapper
{
	protected $curlHandler;
	protected $options = array();
	protected $presetOptions = array(
	   'CURLOPT_RETURNTRANSFER' => true,
	   'CURLOPT_HEADER'         => true,
	   'CURLOPT_USERAGENT'      => 'PhpCurlWrapper v.1.0',
	   'CURLOPT_VERBOSE'        => 0
	);
	
    public function __construct(){
    	if (!extension_loaded('curl')) throw new Exception('Curl not loaded');
    	$this->init();
    }
    
    protected function init(){
    	$this->curlHandler = curl_init();
    	$this->setOptions($this->presetOptions);
    }
    
    /**
     * Reinit handler
     * @return self
     */
    public function clearOptions(){
    	$this->closeHandler();
    	$this->init();
    	$this->options = array();
    	return $this;
    }
    
    /**
     *
     * @param $name
     * @param $value
     * @return self
     */
    public function setOption($name, $value){
    	if (curl_setopt($this->curlHandler, constant($name), $value)){
    		$this->options[$name] = $value;
    	}
    	
    	return $this;
    }
    
    /**
     *
     * @param $list
     * @return self
     */
    public function setOptions(array $list){
    	foreach ($list as $name => $value){
    		$this->setOption($name, $value);
    	}
    	
    	return $this;
    }
    
    /**
     * @return array
     */
    public function getOptions(){
    	return $this->options;
    }
    
    public function issetOption($name){
    	$options = $this->getOptions();
        if (isset($options[$name])) return true;
        return false;
    }
    
    /**
     *
     * @param mixed $name
     */
    public function getOption($name){
    	$options = $this->getOptions();
    	if ($this->issetOption($name)) return $options[$name];
    	
    	return null;
    }
    
    protected function parseHeaders($str)
    {

        $out = array();
        $list = preg_split("/\r?\n/", $str);
        foreach ($list as $item)
        {
            $item = explode(":", $item, 2);
            if (count($item) > 1)
            {
                $item[0] = strtolower($item[0]);
                $item[1] = ltrim($item[1]);
                if ($item[0] == 'set-cookie') $out[$item[0]][] = $item[1];
                else $out[$item[0]] = $item[1];
            }
        }

        return $out;
    }

    protected function closeHandler(){
    	curl_close($this->curlHandler);
    }
    
    public function getErrNo(){
    	return curl_errno($this->curlHandler);
    }
    
    public function getError(){
    	return curl_error($this->curlHandler);
    }
    
    public function getInfo($option = null){
    	if (!is_null($option)) return curl_getinfo($this->curlHandler, $option);
    	return curl_getinfo($this->curlHandler);
    	
    }
    
    public function getVersion(){
    	return curl_version();
    }
    
    /**
     *
     * @param unknown_type $httpAcceptedCodes
     * @return array
     */
    public function run($httpAcceptedCodes = array(200)){
    	$data = curl_exec($this->curlHandler);
    	
    	if ($this->issetOption('CURLOPT_RETURNTRANSFER') &&
    	    !$this->getOption('CURLOPT_RETURNTRANSFER')) return;

        $header_size = $this->getInfo(CURLINFO_HEADER_SIZE);
        
        $header = '';
        $headerList = array();
        if ($this->getOption('CURLOPT_HEADER')){
            $header = substr($data, 0, $header_size);
            $data = trim(substr($data, $header_size ));
            $headerList = $this->parseHeaders($header);
        }
        
        $out = array(
            'header' => array(
                'str'  => $header,
                'list' => $headerList),
            'data'       => $data,
            'http_code'  => $this->getInfo(CURLINFO_HTTP_CODE),
            'curl_error' => $this->getError(),
            'curl_errno' => $this->getErrNo(),
            'curl_info'  => $this->getInfo(),
            'error'      => ''
        );

        if ($out['curl_errno'] > 0){
        	$out['error'] .=
        	   "Curl Error #{$out['curl_errno']}: {$out['curl_error']}";
        }
        elseif (!in_array($out['http_code'], $httpAcceptedCodes)){
        	$out['error'] .= "Http code is {$out['http_code']}. Accepted codes: "
        	                 . implode(", ", $httpAcceptedCodes);
        }
        else ;
                
        return $out;
    }
    
    public function __destruct(){
    	$this->closeHandler();
    }
}
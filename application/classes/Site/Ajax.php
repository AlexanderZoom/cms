<?php defined('SYSPATH') OR die('No direct script access.');
class Site_Ajax {
    
    const RESULT_CODE_OK = 'OK';
    const RESULT_CODE_ERROR = 'ERROR';
    
    const ERROR_CODE_NO_AUTH = 'ACCESS_NO_AUTH';
    const ERROR_CODE_ACCESS_DENIED = 'ACCESS_DENIED';
    const ERROR_CODE_ACCESS_DISABLED = 'ACCESS_DISABLED';
    const ERROR_CODE_HTTP_404 = 'HTTP_404';
    const ERROR_CODE_HTTP_500 = 'HTTP_500';
    
    protected $result;
    protected $errorCode;
    protected $data;
    protected $errorDescription = array(
        self::ERROR_CODE_NO_AUTH => 'You are not autorized',
        self::ERROR_CODE_ACCESS_DENIED => 'Access denied',
        self::ERROR_CODE_ACCESS_DISABLED => 'Access disabled',
        self::ERROR_CODE_HTTP_404 => 'Page not found',
        self::ERROR_CODE_HTTP_500 => 'Internal Server Error',
    );
    
    public function __construct(){
        $this->_addErrorDescription();
    }
    
    public function setResult($res){
        $this->result = $res;
    }
    
    public function setErrorCode($code){
        $this->errorCode = $code;
    }
    
    public function setData($data){
        $this->data = $data;
    }
    
    public function execute(){
        $out = array(
            'result' => $this->result,
            'error_code' => $this->errorCode,
            'error_description' => isset($this->errorDescription[$this->errorCode]) ? ___($this->errorDescription[$this->errorCode]) : '',
            'data' => $this->data,
        );
        
        return $out;
    }
    
    public function __toString(){
        return json_encode($this->execute());
    }
    
    protected function _addErrorDescription(){
        
    }
    
}
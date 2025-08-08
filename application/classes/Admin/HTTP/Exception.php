<?php defined('SYSPATH') OR die('No direct script access.');
class Admin_HTTP_Exception extends HTTP_Exception {
    
    protected $template = 'admin/errors/default';
    protected $templateDecorator = 'admin/main_error';
    protected $templateAjax = 'admin/main_ajax';
    public $wrapper;
    
    /**
     * Creates an HTTP_Exception of the specified type.
     *
     * @param   integer $code       the http status code
     * @param   string  $message    status message, custom content to display with error
     * @param   array   $variables  translation variables
     * @return  HTTP_Exception
     */
    public static function factory($code, $message = NULL, array $variables = NULL, Exception $previous = NULL)
    {
        $class = 'Admin_HTTP_Exception_'.$code;
    
        if (!class_exists($class)) $class = 'HTTP_Exception_'.$code;
        
        return new $class($message, $variables, $previous);
    }
    
    
    /**
     * Generate a Response for all Exceptions without a more specific override
     *
     * The user should see a nice error page, however, if we are in development
     * mode we should show the normal Kohana error page.
     *
     * @return Response
     */
    public function get_response()
    {
        // Lets log the Exception, Just in case it's important!
        Kohana_Exception::log($this);
        Admin_Language::init();
            
        if (Kohana::$environment >= Kohana::DEVELOPMENT)
        {
            return Kohana_Exception::response($this->wrapper ? $this->wrapper : $this);
            // Show the normal Kohana error page.
            //return parent::get_response();
        }
        else
        {
            if ($this->request()->is_ajax()){
                $container = new Admin_Ajax();
                $errorCode = 'ERROR_CODE_HTTP_' . $this->getCode();
                $container->setErrorCode(constant('Admin_Ajax::' . $errorCode));
                $container->setResult(Admin_Ajax::RESULT_CODE_ERROR);
                $view = View::factory($this->templateAjax);
                $view->content = $container;
                
            }
            else {
                // Generate a nicer looking "Oops" page.
                $view = View::factory($this->template);
                if ($this->templateDecorator){
                    $viewContent = $view;
                    $view = View::factory($this->templateDecorator);
                    $view->code = $this->getCode();
                    $view->exception = $this;
                    $view->content = $viewContent->render();
                }
            }
            
            $response = Response::factory()
            ->status($this->getCode())
            ->body($view->render());
            
            return $response;
        }
    }

}
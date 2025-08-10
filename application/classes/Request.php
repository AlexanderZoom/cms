<?php defined('SYSPATH') OR die('No direct script access.');

class Request extends Kohana_Request {
    /**
     * Returns whether this is an ajax request (as used by JS frameworks)
     *
     * @return  boolean
     */
    public function is_ajax()
    {
        return ($this->requested_with() === 'xmlhttprequest' || $this->param('extension') == 'ajax');
    }
    
}

<?php defined('SYSPATH') OR die('No direct script access.');
abstract class Admin_Auth_User {
    // Auth instances
    protected static $_instance;
    
    /**
     * Singleton pattern
     *
     * @return Auth
     */
    public static function instance()
    {
        if ( ! isset(self::$_instance))
        {
            // Load the configuration for this type
            $config = Kohana::$config->load('admin');
    
            if ( ! $class = $config->get('class_user_auth'))
            {
                throw new Admin_Exception('class_user_auth not defined in admin config');
            }
    
            
            // Create a new session instance
            self::$_instance = new $class();
        }
    
        return self::$_instance;
    }
    
    protected $_session;
    protected $_config;
    
    /**
     *
     * @var Model_Admin_User
     */
    protected $_user;
    
    
    /**
     * Loads Session
     *
     * @return  void
     */
    public function __construct()
    {
        // Save the config in the object
        $this->_config = array(
            'session_key' => 'session_admin_panel_user',
            'lifetime'    => 31536000,
            'cookie_name_autologin' => 'adminautologin',
        );
        $this->_session = Admin_Session::instance();
    }
    
    abstract protected function _login($username, $password, $remember);
    abstract protected function _loadUser($pk);
    
    /**
     * Gets the currently logged in user from the session.
     * Returns NULL if no user is currently logged in.
     *
     * @param   mixed  $default  Default value to return if the user is currently not logged in.
     * @return  mixed
    */
    public function get_user($default = NULL)
    {
        if ($this->_user) return $this->_user;
        else {
            if ($this->_session->get($this->_config['session_key'])){
                $this->_user = $this->_loadUser($this->_session->get($this->_config['session_key']));
                if ($this->_user) return $this->_user;
            }
        }
        return $default;
    }
    
    /**
     * Attempt to log in a user by using an ORM object and plain-text password.
     *
     * @param   string   $username  Username to log in
     * @param   string   $password  Password to check against
     * @param   boolean  $remember  Enable autologin
     * @return  boolean
     */
    public function login($username, $password, $remember = FALSE)
    {
        if (empty($password))
            return FALSE;
        
        return $this->_login($username, $password, $remember);
    }
    
    /**
     * Log out a user by removing the related session variables.
     *
     * @param   boolean  $destroy     Completely destroy the session
     * @param   boolean  $logout_all  Remove all tokens for user
     * @return  boolean
     */
    public function logout($destroy = FALSE, $logout_all = FALSE)
    {
        if ($destroy === TRUE)
        {
            // Destroy the session completely
            $this->_session->destroy();
        }
        else
        {
            // Remove the user from the session
            $this->_session->delete($this->_config['session_key']);
    
            // Regenerate session_id
            $this->_session->regenerate();
        }
        
        $this->_user = null;
    
        // Double check
        return ! $this->logged_in();
    }
    
    /**
     * Check if there is an active session. Optionally allows checking for a
     * specific role.
     *
     * @param   string  $role  role name
     * @return  mixed
     */
    public function logged_in($role = NULL)
    {
        return ($this->get_user() !== NULL);
    }
    
        
    protected function complete_login(Model_Admin_User $user)
    {
        $this->_user = $user;
        // Regenerate session_id
        $this->_session->regenerate();
    
        // Store username in session
        $this->_session->set($this->_config['session_key'], $this->_user->pk());
    
        return true;
    }
}
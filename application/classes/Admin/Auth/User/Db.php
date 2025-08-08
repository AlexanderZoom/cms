<?php defined('SYSPATH') OR die('No direct script access.');
class Admin_Auth_User_Db extends Admin_Auth_User{
        
    /**
     * Checks if a session is active.
     *
     * @param   mixed    $role Role name string, role ORM object, or array with role names
     * @return  boolean
     */
    public function logged_in($role = NULL)
    {
        // Get the user from the session
        $user = $this->get_user();
    
        if ( ! $user)
            return FALSE;
    
        if ($user instanceof Model_Admin_User AND $user->loaded())
        {
            // If we don't have a roll no further checking is needed
            if ( ! $role){
                return TRUE;
            }
            
            return $user->hasGroup($role);
        }
    
    }
    
    
    /**
     * Logs a user in.
     *
     * @param   string   $username
     * @param   string   $password
     * @param   boolean  $remember  enable autologin
     * @return  boolean
     */
    protected function _login($user, $password, $remember)
    {
        if (!($user instanceof Model_Admin_User)){
            $user = ORM::factory('Admin_User')->where('login', '=', $user)->find();
        }
        
        if ($user->loaded()){
            
            if (!$user->checkPassword($password))  return FALSE;
            
            $user->last_login = date('Y-m-d H:i:s', time());
            $user->last_ip = Arr::get($_SERVER, 'REMOTE_ADDR');
            $user->last_ip_forward = Arr::get($_SERVER, 'HTTP_X_FORWARDED_FOR');
            $user->save();
            
            if ($remember === true)
            {
                // Token data
                $data = array(
                'user_id'    => $user->pk(),
                'expires'    => time() + $this->_config['lifetime'],
                'user_agent' => sha1(Request::$user_agent),
                );
            
                // Create a new autologin token
                $token = ORM::factory('Admin_User_Token')
                ->values($data)
                ->create();
            
                // Set the autologin cookie
                Cookie::set($this->_config['cookie_name_autologin'], $token->token, $this->_config['lifetime']);
            }
            
            return $this->complete_login($user);
        }
        
        // Login failed
        return false;
    }
    
    /**
     * Forces a user to be logged in, without specifying a password.
     *
     * @param   mixed    $user                    username string, or user ORM object
     * @param   boolean  $mark_session_as_forced  mark the session as forced
     * @return  boolean
     */
    public function force_login($user, $mark_session_as_forced = FALSE)
    {
        if ( ! is_object($user))
        {
            $user = ORM::factory('Admin_User')->where('login', '=', $user)->find();
            
        }
    
        if ($mark_session_as_forced === TRUE)
        {
            // Mark the session as forced, to prevent users from changing account information
            $this->_session->set('auth_forced', TRUE);
        }
    
        // Run the standard completion
        $this->complete_login($user);
    }
    
    /**
     * Logs a user in, based on the authautologin cookie.
     *
     * @return  mixed
     */
    public function auto_login()
    {
        if ($token = Cookie::get($this->_config['cookie_name_autologin']))
        {
            // Load the token and user
            $token = ORM::factory('Admin_User_Token', array('token' => $token));
    
            if ($token->loaded() AND $token->user->loaded())
            {
                if ($token->user_agent === sha1(Request::$user_agent))
                {
                    // Save the token to create a new unique token
                    $token->save();
    
                    // Set the new token
                    Cookie::set($this->_config['cookie_name_autologin'], $token->token, $token->expires - time());
    
                    // Complete the login with the found data
                   
                    if ($this->complete_login($token->user)){
                        return $token->user;
                    }
                }
    
                // Token is invalid
                $token->delete();
            }
        }
    
        return FALSE;
    }
    
    protected function _loadUser($pk){
        $user = ORM::factory('Admin_User', array('id' => $pk));
        if ($user->loaded()) return $user;
        
        return null;
    }
    
    /**
     * Gets the currently logged in user from the session (with auto_login check).
     * Returns $default if no user is currently logged in.
     *
     * @param   mixed    $default to return in case user isn't logged in
     * @return  mixed
     */
    public function get_user($default = NULL)
    {
        $user = parent::get_user($default);
    
        if ($user === $default)
        {
            // check for "remembered" login
            if (($user = $this->auto_login()) === FALSE)
                return $default;
        }
    
        if (!$this->_user && $user) $this->_user = $user;
        
        return $user;
    }
    
    
    /**
     * Log a user out and remove any autologin cookies.
     *
     * @param   boolean  $destroy     completely destroy the session
     * @param	boolean  $logout_all  remove all tokens for user
     * @return  boolean
     */
    public function logout($destroy = FALSE, $logout_all = FALSE)
    {
        // Set by force_login()
        $this->_session->delete('auth_forced');
    
        if ($token = Cookie::get($this->_config['cookie_name_autologin']))
        {
            // Delete the autologin cookie to prevent re-login
            Cookie::delete($this->_config['cookie_name_autologin']);
    
            // Clear the autologin token from the database
            $token = ORM::factory('Admin_User_Token', array('token' => $token));
    
            if ($token->loaded() AND $logout_all)
            {
                // Delete all user tokens. This isn't the most elegant solution but does the job
                $tokens = ORM::factory('Admin_User_Token')->where('user_id','=',$token->user_id)->find_all();
    
                foreach ($tokens as $_token)
                {
                    $_token->delete();
                }
            }
            elseif ($token->loaded())
            {
                $token->delete();
            }
        }
    
        return parent::logout($destroy);
    }
    
}
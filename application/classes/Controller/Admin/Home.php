<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Admin_Home extends Controller_Admin {
    
    public function action_index(){
        $this->template->content = View::factory('admin/home');
        $this->template->title[] = 'Home';

//         $user = new Model_Admin_User();
//         $user->email = 'zoomerev@gmail.com';
//         $user->setPassword('123asd');
//         $user->save();
        
//         $group = new Model_Admin_Group();
//         $group->code = 'admin';
//         $group->save();
//         $group->add('users' , $user);
        
        
//         $user = new Model_Admin_User();
//         $user->email = 'geroyster@gmail.com';
//         $user->setPassword('123asd');
//         $user->save();
        
//         $group = new Model_Admin_Group();
//         $group->code = 'member';
//         $group->save();
        
//         $user->add('groups' , $group);
//         $group = ORM::factory('Admin_Group')->where('code', '=', 'member')->find();
//         $user = ORM::factory('Admin_User')->where('email', '=', 'zoomerev@gmail.com')->find();
//         if ($group->loaded() && $user->loaded()){
//             $group->add('users', $user);
//         }
        
//         foreach (ORM::factory('Admin_Group')->find_all() as $group){
//             foreach ($group->users->find_all() as $user){
//                 echo "group {$group->code} user {$user->email}<br/>";
//             }
//         }		
        
        $ctr = Admin_Session::instance()->get('count', 0);
        Admin_Session::instance()->set('count',  $ctr+1);
        
        Admin_Session::instance()->get('count');
        
        //throw new Admin_Exception('bla');
        
    }
}
<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Site_Profile extends Controller_Site {
	
	protected $_uploadFileFormat = array(IMAGETYPE_JPEG, IMAGETYPE_PNG); //for kohana_gd support
	protected $_width = 150;
	protected $_height = 150;
	protected $_maxWidthImgCrop = 580;
	
	public function action_index(){
		$this->_checkAccess(Site_Access::ACCESS_VIEWAUTH);
		$this->template->title[] = 'Profile';
		$this->template->content = View::factory('site/profile');
		
		
		$errors = array();
		$fields = array(
				'old_password' => '', 
				'password' => '', 
				'repassword' => '', 
				'nickname' => '',
				'firstname' => '',
				'lastname' => '',
				'birthday' => ''
				
		);
		
		$user = $this->getUser();
		
		$dataUser = $this->_initFormData($fields, array(
					'nickname' => $user->nickname,
					'firstname'  => $user->firstname,
					'lastname' => $user->lastname,
					'birthday' => $user->birthday ? date(Model_Setting::get('site.main.format_date'),strtotime($user->birthday)) : '',				
		));
		
		
		

		$avatar = Site_Avatar::get($this->getUser());
		$data = $dataUser;
		$data = $this->_initFormData($fields, $_REQUEST, $data);
		
		if (isset($_POST['pass'])){
			if(!$user->checkPassword($data['old_password'])){
				$errors['old_password'] = ___('Incorrect password');
			}
			
			if (!count($errors)){
				$postValidator = Validation::factory($data);
				$postValidator->label('password', 'password');
				$postValidator->label('repassword', 'retype password');
				
				$postValidator->rule('password', 'check_password', array(':value', $data['repassword']));
				$postValidator->rule('password','not_empty');
				
				if ($postValidator->check()){
					$user->setPassword($data['password']);
					$this->setFlashWarning('Password changed');
				}
				else $errors = $postValidator->errors('valid');
			}
			
			
			if (count($errors)) $this->setFlashWarning('Password not changed');
			
		}
		elseif (isset($_POST['info'])){
			$dataSave = array();
			foreach ($data as $key => $value){
				if ($value != $dataUser[$key]) $dataSave[$key] = $value;
			}
			
			$postValidator = Validation::factory($data);
			
			foreach ($dataSave as $key => $value){
				switch ($key){
					case 'nickname' :
						$postValidator->label('nickname', 'nickname');
						$postValidator->rule('nickname', 'not_empty');
						break;
								
				}
			}
			 
			
			if ($postValidator->check()){
				foreach ($dataSave as $key => $value){
					switch ($key){
						case 'nickname' :
							$user->nickname = $dataSave['nickname'];
							break;
				
						case 'firstname' :
							$user->firstname = $dataSave['firstname'];				
							break;
				
						case 'lastname' :
							$user->lastname = $dataSave['lastname'];	
							break;
				
						case 'birthday' :
							$user->birthday = date('Y-m-d', strtotime($dataSave['birthday']));
							break;
					}
				}
				
				$user->save();
				
			}
			else $errors = $postValidator->errors('valid');
		}
		else ;
		
		$data['old_password'] = $data['password'] = $data['repassword'] = '';
		
		$this->template->content->avatar = $avatar;
		$this->template->content->data = $data;
		$this->template->content->errors = $errors;
		$this->template->content->format_date = Model_Setting::get('site.main.format_date');
	}
	
	
	public function action_upload(){
		$this->_checkAccess(Site_Access::ACCESS_VIEWAUTH);
		$urlReturn = URL::site(Route::url('site', array('controller' => 'profile', 'lang'=> $this->getLanguage(), 'action'=> 'index' )));
		
		if (isset($_POST['upload'])){
			$error = false;
			
			
			if (!isset($_FILES['file']) || !is_uploaded_file($_FILES['file']['tmp_name'])){
				$error = true;
		
			}
		
			if (!$error){
				$info = getimagesize($_FILES['file']['tmp_name']);
				if (!in_array($info[2], $this->_uploadFileFormat)){
					$this->setFlashWarning('File format incorrect');
					$error = true;
				}
				else {
					if ($info[0] > $this->_maxWidthImgCrop){
						$img = Image::factory($_FILES['file']['tmp_name']);
						$img->resize($this->_maxWidthImgCrop);
						$img->save($_FILES['file']['tmp_name'], 100);
					}	
					Site_Avatar::addTemp($this->getUser(), $_FILES['file']['tmp_name']);
				}
			}
		
			if ($error){
				$this->redirect($urlReturn);
			}
			else {
				$tmpimg = Site_Avatar::get($this->getUser(), true);
				if (!$tmpimg){
					$this->setFlashWarning('Image for croping not found');
					$this->redirect($urlReturn);
				}
				
				$this->template->title[] = 'Image crop';
				$this->template->content = View::factory('site/profile_crop');
				$this->template->content->tmpimg = $tmpimg;
			}
		}
		elseif (isset($_POST['crop'])){
			$x1 = Arr::get($_POST, 'x1');
			$x2 = Arr::get($_POST, 'x2');
			
			$y1 = Arr::get($_POST, 'y1');
			$y2 = Arr::get($_POST, 'y2');
			
			$cropInfo = array(
				'x1' => (int) $x1,
				'x2' => (int) $x2,
				'y1' => (int) $y1,
				'y2' => (int) $y2,
			);
			
			$tmpimg = Site_Avatar::get($this->getUser(), true, true);
			Site_Avatar::add($this->getUser(), $tmpimg, $this->_width, $this->_height, $cropInfo);
			Site_Avatar::delete($this->getUser(), true);
			$this->redirect($urlReturn);
		}
		else $this->redirect($urlReturn);
		
	}
	
	protected function _js_bottom(){
		return array('/js/jquery.imgareaselect.min.js',
					 '/js/jquery.datetimepicker.full.js'
		);
	}
	
	protected function _css(){
		return array('/css/imgareaselect-default.css',
					 '/css/jquery.datetimepicker.min.css'
				
		);
	}
	
}
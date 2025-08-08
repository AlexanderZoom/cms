<?php defined('SYSPATH') OR die('No direct script access.');
class Controller_Admin_Media extends Controller_Admin {
    
    protected $ajaxMethods = array('control', 'cfgfm');
    
    protected $_mediaCategoryCode = 'files';
    
    public function before()
    {
    	if ($this->_getAction() == 'filemanager') $this->template = 'admin/main_plain';
    	if ($this->_getAction() == 'ind') $this->template = 'admin/media_plain';
    	
    	parent::before();
    }
    
    public function action_index(){
        $this->template->content = View::factory('admin/media');
        $this->template->title[] = 'Media';
        $this->template->content->url = URL::site(Route::url('admin', array('controller'=>'media', 'lang' => $this->getLanguage(), 'action'=>'ind')));
        
    }
    
    public function action_ind(){
    	$this->template->content = View::factory('admin/media2');
    	$this->template->title[] = 'Media';
    
    }
    
    public function action_filemanager(){
    	$this->template->content = View::factory('admin/media_filemanager');
    	
    	$cfgUrl = URL::site(Route::url('admin', array('controller'=>'media', 'lang' => $this->getLanguage(), 'action'=>'cfgfm', 'extension' => 'ajax')));
    	$this->template->content->cfgUrl = $cfgUrl;
    }
    
    public function action_cfgfm(){
    	$container = $this->template->content = new Admin_Ajax_MediaControl();
    	$language = 'en';
    	$languages = array('en', 'ru');
    	if (in_array($this->getLanguage(), $languages)) $language = $this->getLanguage();
    	$connector = URL::site(Route::url('admin', array('controller'=>'media', 'lang' => $this->getLanguage(), 'action'=>'control', 'extension' => 'ajax')));
    	
    	$mconfig = Kohana::$config->load('media_storage');
    	
    	$umfs = Util_System::returnBytesIniGet(ini_get('upload_max_filesize'));
    	$ums = Util_System::returnBytesIniGet(ini_get('post_max_size'));
    	$filesizelimit = $umfs;
    	if ($ums < $umfs) $filesizelimit = $ums;
    	
    	$cfg = array(
    		"_comment" => 'IMPORTANT : go to the wiki page to know about options configuration https://github.com/simogeo/Filemanager/wiki/Filemanager-configuration-file',
    		"options"  => array(
	    		"culture"            => $language,
	    		"lang" 	             => "php",
	    		"theme"              => "flat-dark",
	    		"defaultViewMode"    => "grid",
	    		"autoload"           => true,
	    		"showFullPath"       => false,
	    		"showTitleAttr"      => false,
	    		"browseOnly"         => false,
	    		"showConfirmation"   => true,
	    		"showThumbs"         => true,
	    		"generateThumbnails" => true,
	    		"cacheThumbnails"    => true,
	    		"searchBox"          => true,
	    		"listFiles"          => true,
	    		"fileSorting"        => "default",
	    		"quickSelect"        => false,
	    		"chars_only_latin"   => true,
	    		"splitterWidth"      => 200,
	    		"splitterMinWidth"   => 200,
	    		"dateFormat"         => "d M Y H:i",
	    		"serverRoot"         => true,
	    		"fileRoot"           => false,
	    		"baseUrl"            => false,
	    		"logger"             => true,
	    		"capabilities"       => array("select", "download", "rename", "delete"),
	    		"plugins"            => array(),
    			"fileConnector"		 => $connector	
    		),
    	"security"=> array(
	    	"allowFolderDownload"   => false,
	    	"allowChangeExtensions" => false,
	    	"allowNoExtension"      => false,
	    	"uploadPolicy"          => "DISALLOW_ALL",
	    	"uploadRestrictions"    => array(
	    		"jpg", "jpe", "jpeg", "gif", "png",	"svg", "txt", "pdf", "odp",	"ods", "odt",
	    		"rtf", "doc", "docx", "xls", "xlsx", "ppt", "pptx", "csv", "ogv", "mp4", "webm",
	    	    "m4v", "ogg", "mp3", "wav", "zip", "rar", "7z"
	    	)
    	),
    	"upload" => array(
	    	"multiple"      => true,
	    	"number"        => 25,
	    	"overwrite"     => false,
	    	"imagesOnly"    => false,
	    	"fileSizeLimit" => $filesizelimit / 1024 / 1024
    	),
    	"exclude" => array(
    		"unallowed_files"        => array(".htaccess", "web.config"),
    		"unallowed_dirs"         => array("_thumbs", ".CDN_ACCESS_LOGS", "cloudservers"),
    		"unallowed_files_REGEXP" => '/^\\./',
    		"unallowed_dirs_REGEXP"  => '/^\\./'
    	),
    	"images"=> array(
    		"imagesExt" => array("jpg", "jpe", "jpeg", "gif", "png", "svg"),
    		"resize"=> array(
    			"enabled"   => true,
    			"maxWidth"  => $mconfig->thumb_width,
    			"maxHeight" => $mconfig->thumb_height
    		)
    	),
    	"videos" => array(
    	    "showVideoPlayer"    => true,
	    	"videosExt"          => array("ogv", "mp4", "webm", "m4v"),
    		"videosPlayerWidth"  => 400,
    		"videosPlayerHeight" => 222
    	),
    	"audios" => array(
    		"showAudioPlayer" => true,
    		"audiosExt" => array("ogg", "mp3", "wav")
    	),
    	"pdfs" => array(
    		"showPdfReader"    => true,
    		"pdfsExt"          => array("pdf","odp"),
    		"pdfsReaderWidth"  => "640",
    		"pdfsReaderHeight" => "480"
    	),
    	"edit" => array(
	    	"enabled"       => true,
	    	"lineNumbers"   => true,
	    	"lineWrapping"  => true,
	    	"codeHighlight" => false,
	    	"theme"         => "elegant",
	    	"editExt"       => array("txt", "csv")
    	),
    	"customScrollbar" => array(
	    	"enabled" => true,
	    	"theme"   => "inset-2-dark",
	    	"button"  => true
    	),
    	"extras" => array(
	    	"extra_js" => array(),
	    	"extra_js_async" => true
    	),
    	"icons"=> array(
	    	"path"      => "/admin-content/images/fileicons/",
	    	"directory" => "_Open.png",
	    	"default"   => "default.png"
    	),
    	"url"=> "https://github.com/simogeo/Filemanager",
    	"version"=> "2.4.0"
    	);
    	
    	$container->setData($cfg);
    	$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_OK);
    }
    
    public function action_control(){
        if (!$this->_is_ajax()){
            throw Admin_HTTP_Exception::factory(404,
                    'The requested URL :uri was not found on this server.',
                    array(':uri' => $this->request->uri())
            )->request($this->request);
        }
        
        $container = $this->template->content = new Admin_Ajax_MediaControl();
        $catCode = 'media';
        
        try {
        	$cat = Media_Storage_Category::findByCode($catCode);
        }
        catch (Media_Storage_Exception_Category_NotFound $e){
        	$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_ERROR);
        	$container->setErrorCode(Admin_Ajax_MediaControl::ERROR_CODE_MEDIACONTROL_CATEGORY_NOT_FOUND);
        }
        
        
        $action = Arr::get($_REQUEST, 'mode');
        $currentPath = trim(Arr::get($_POST, 'currentpath'));
        $path = trim(Arr::get($_REQUEST, 'path'));
        
        if (!$path && $currentPath && $action == 'add') $path = $currentPath;
        
        $isThumb = trim(Arr::get($_GET, 'showThumbs'));
        if ($isThumb == 'true') $isThumb = true;
        else $isThumb = false;
        
        
        
        
        switch ($action){
        	case 'download':
        		$error = false;
        		 
        		if (!$path && !$error){
        			$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_ERROR);
        			$container->setErrorCode(Admin_Ajax_MediaControl::ERROR_CODE_MEDIACONTROL_PATH_EMPTY);
        			$error = true;
        		}
        		
        		if (!$error){
        			try {
        				$cat->downloadFile($path);
        			}
        			catch (Exception $e){
        				
        				$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_ERROR);
        				$container->setErrorCode(Admin_Ajax_MediaControl::ERROR_CODE_MEDIACONTROL_UNKNOWN_ERROR);
        				//$container->setData($e->getMessage().$e->getTraceAsString());
        				
        				$group = ORM::factory('Admin_Group')->where('code', '=', 'admin')->find();
        				$params = array(
        						'type' => Admin_Notification::TYPE_SYSTEM,
        						'level' => Admin_Notification::LEVEL_WARNING,
        						'subject' => 'Media download',
        						'message' => $e->getMessage(). ' ' .$e->getTraceAsString(),
        						'group'   => $group,
        				);
        				
        				Admin_Notification::add($params);
        			}
        		}
        		break;
        		
        	case 'savefile':
        		$content = trim(Arr::get($_REQUEST, 'content'));
        		$error = false;
        		 
        		if (!$path && !$error){
        			$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_ERROR);
        			$container->setErrorCode(Admin_Ajax_MediaControl::ERROR_CODE_MEDIACONTROL_PATH_EMPTY);
        			$error = true;
        		}
        		
        		if (!$error){
        			$res = $cat->setFileContent($path, $content);
        			$container->setData($res);
        			$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_OK);
        		}
        		break;
        		
        	case 'editfile':
        		$error = false;
        		 
        		if (!$path && !$error){
        			$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_ERROR);
        			$container->setErrorCode(Admin_Ajax_MediaControl::ERROR_CODE_MEDIACONTROL_PATH_EMPTY);
        			$error = true;
        		}
        		
        		if (!$error){
        			$res = $cat->getFileContent($path);
        			$container->setData($res);
        			$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_OK);
        		}
        		
        		break;
              
            case 'add':
            	$error = false;
            	
            	if (!$path && !$error){
            		$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_ERROR);
            		$container->setErrorCode(Admin_Ajax_MediaControl::ERROR_CODE_MEDIACONTROL_PATH_EMPTY);
            		$error = true;
            	}
            	
            	if (!isset($_FILES['newfile']) || !is_uploaded_file($_FILES['newfile']['tmp_name'])){
            		$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_ERROR);
            		$container->setErrorCode(Admin_Ajax_MediaControl::ERROR_CODE_MEDIACONTROL_UNKNOWN_ERROR);            		
            		
            		$error = true;
            	}
            	
            	if (!$error){
            		$res = $cat->add($path, $_FILES['newfile']['name'], $_FILES['newfile']['tmp_name']);
            		$container->setData($res);
            		$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_OK);
            	}
                break;

            case 'addfolder':
            	$error = false;
            	$name = trim(Arr::get($_GET, 'name'));
            	
            	if (!$name) {
            		$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_ERROR);
            		$container->setErrorCode(Admin_Ajax_MediaControl::ERROR_CODE_MEDIACONTROL_FOLDER_NAME_EMPTY);
            		$error = true;
            	}

            	if (!$path && !$error){
            		$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_ERROR);
            		$container->setErrorCode(Admin_Ajax_MediaControl::ERROR_CODE_MEDIACONTROL_PATH_EMPTY);
            		$error = true;
            	}
            	
            	if (!$error){            		
            		try {
            			$res = $cat->addfolder($path, $name);
            			$container->setData($res);
            			$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_OK);
            		}
            		catch (Media_Storage_Exception_Category_FolderNotFound $e){
            			$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_ERROR);
            			$container->setErrorCode(Admin_Ajax_MediaControl::ERROR_CODE_MEDIACONTROL_CATEGORY_FOLDER_NOT_FOUND);
            		}
            		catch (Media_Storage_Exception_Category_FolderExists $e){
            			$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_ERROR);
            			$container->setErrorCode(Admin_Ajax_MediaControl::ERROR_CODE_MEDIACONTROL_CATEGORY_FOLDER_EXISTS);
            		}	
            	}
                
                break;

            case 'rename':
            	$error = false;
            	$path = trim(Arr::get($_GET, 'old'));
            	$name = trim(Arr::get($_GET, 'new'));
            	
            	if (!$name) {
            		$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_ERROR);
            		$container->setErrorCode(Admin_Ajax_MediaControl::ERROR_CODE_MEDIACONTROL_FOLDER_NAME_EMPTY);
            		$error = true;
            	}
            	
            	if (!$path && !$error){
            		$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_ERROR);
            		$container->setErrorCode(Admin_Ajax_MediaControl::ERROR_CODE_MEDIACONTROL_PATH_EMPTY);
            		$error = true;
            	}
            	 
            	if (!$error){
            		try {
            			$res = $cat->rename($path, $name);
            			$container->setData($res);
            			$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_OK);
            		}
            		catch (Media_Storage_Exception_Category_FileNotFound $e){
            			$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_ERROR);
            			$container->setErrorCode(Admin_Ajax_MediaControl::ERROR_CODE_MEDIACONTROL_CATEGORY_FILE_NOT_FOUND);
            		}            		
            	}
                break;            

            case 'delete':
            	$error = false;
            	if (!$path && !$error){
            		$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_ERROR);
            		$container->setErrorCode(Admin_Ajax_MediaControl::ERROR_CODE_MEDIACONTROL_PATH_EMPTY);
            		$error = true;
            	}
            	
            	if (!$error){
            		
            			try {
            				$res = $cat->delete($path);
            				$container->setData($res);
            				$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_OK);
            			}
            			catch (Media_Storage_Exception_File_NotEmpty $e){
            				$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_ERROR);
            				$container->setErrorCode(Admin_Ajax_MediaControl::ERROR_CODE_MEDIACONTROL_CATEGORY_FOLDER_NOT_EMPTY);
            			}
            			
            		
            
            	}
            	
                break;

            case 'getinfo':
            	if ($path){
            		try {
	            		$res = $cat->getinfo($path, $isThumb);
	            		$container->setData($res);
	            		$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_OK);
            		}
            		catch (Media_Storage_Exception_Category_FileNotFound $e){
            			$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_ERROR);
            			$container->setErrorCode(Admin_Ajax_MediaControl::ERROR_CODE_MEDIACONTROL_CATEGORY_FILE_NOT_FOUND);
            		}
            	}
            	else {
            		$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_ERROR);
            		$container->setErrorCode(Admin_Ajax_MediaControl::ERROR_CODE_MEDIACONTROL_PATH_EMPTY);
            	}
                break;

            case 'getfolder':
                if ($path){
                	$res = $cat->getFolder($path, $isThumb);
                	$container->setData($res);
                	$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_OK);
                }
                else {
                	$container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_ERROR);
                	$container->setErrorCode(Admin_Ajax_MediaControl::ERROR_CODE_MEDIACONTROL_PATH_EMPTY);
                }
                break;

            default:
                $container->setResult(Admin_Ajax_MediaControl::RESULT_CODE_ERROR);
                $container->setErrorCode(Admin_Ajax_MediaControl::ERROR_CODE_MEDIACONTROL_UNKNOWN_ACTION);
        }
        
        
    }
    
    
    
    protected function _breadcrumbs(){
    	$lst = parent::_breadcrumbs();
    	$lst[] = array(
    			'icon' => 'fa fa-picture-o',
    			'name' => 'Media',
    			'url'  => URL::site(Route::url('admin', array('controller'=>'media', 'lang' => $this->getLanguage(), 'action'=>'index')))
    	);
    
    
    	return $lst;
    }

    protected function _js_bottom(){
    	if ($this->_getAction() == 'ind')
    	return array(
    		'/admin-content/js/filemanager/jquery-browser.js',
    		'/admin-content/js/filemanager/jquery.form-3.24.js',
    		'/admin-content/js/filemanager/jquery.splitter/jquery.splitter-1.5.1.js',
    		'/admin-content/js/filemanager/jquery.filetree/jqueryFileTree.js',
    		'/admin-content/js/filemanager/jquery.contextmenu/jquery.contextMenu-1.01.js',
    		'/admin-content/js/filemanager/jquery.impromptu-3.2.min.js',
    		'/admin-content/js/filemanager/jquery.tablesorter-2.7.2.min.js',
    		URL::site(Route::url('admin', array('controller'=>'media', 'lang' => $this->getLanguage(), 'action'=>'filemanager'))),
    	);
    	else return array();
    }
    
    protected function _css(){
    	if ($this->_getAction() == 'ind')
    	return array(
    		'/admin-content/js/filemanager/styles/reset.css',	
    		'/admin-content/js/filemanager/jquery.filetree/jqueryFileTree.css',
    		'/admin-content/js/filemanager/jquery.contextmenu/jquery.contextMenu-1.01.css',
    		'/admin-content/js/filemanager/custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css',
    	);
    	else return array();
    }
}
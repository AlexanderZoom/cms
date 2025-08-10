<?php defined('SYSPATH') OR die('No direct script access.');

$lang = Admin_Language::get();


    $menuList = array(
        'name' => 'ROOT',
        'position' => 0,
        'controller' => 'none',
        'action' => 'none',
        'access' => 'none',
        'child' => array(
            array(
                'name' => 'Home',
                'position' => 1,
                'controller' => 'Controller_Admin_Home',
                'action' => 'index',
                'access' => Admin_Access::ACCESS_VIEW,
                'extra' => array('icon' => '<i class="fa fa-home fa-fw"></i>'),
                'child' => array(),
            ),
        	array(
        		'name' => 'Site',
        		'position' => 2,
        		'controller' => 'none',
        		'action' => 'index',
        		'access' => Admin_Access::ACCESS_VIEW,
        		'extra' => array('icon' => ''),
        		'child' => array(
        				array(
        						'name' => 'Site Users',
        						'position' => -1,
        						'controller' => 'Controller_Admin_SiteUsers',
        						'action' => 'index',
        						'access' => Admin_Access::ACCESS_VIEW,
        						'extra' => array('icon' => '<i class="fa fa-user fa-fw"></i>'),
        						'child' => array(),
        				),
        				
        				array(
        						'name' => 'Site Groups',
        						'position' => -2,
        						'controller' => 'Controller_Admin_SiteGroups',
        						'action' => 'index',
        						'access' => Admin_Access::ACCESS_VIEW,
        						'extra' => array('icon' => '<i class="fa fa-users fa-fw"></i>'),
        						'child' => array(),
        				),
        				
        				array(
        						'name' => 'Notification',
        						'position' => -5,
        						'controller' => 'Controller_Admin_Notification',
        						'action' => 'index',
        						'access' => Admin_Access::ACCESS_VIEW,
        						'extra' => array('icon' => '<i class="fa fa-bell fa-fw"></i>'),
        						'child' => array(),
        				),
        		),
        		'label-menu' => true,	
            ),
        		
        	array(
        		'name' => 'Partner',
        		'position' => 3,
        		'controller' => 'none',
        		'action' => 'index',
        		'access' => Admin_Access::ACCESS_VIEW,
        		'extra' => array('icon' => ''),
        		'child' => array(),
        		'label-menu' => true,
        	),

        	array(
        		'name' => 'Billing',
        		'position' => 4,
        		'controller' => 'none',
        		'action' => 'index',
        		'access' => Admin_Access::ACCESS_VIEW,
        		'extra' => array('icon' => ''),
        		'child' => array(),
        		'label-menu' => true,
        	),        		
        
            array(
            'name' => 'Admin',
            'position' => -5,
            'controller' => 'none',
            'action' => 'index',
            'access' => Admin_Access::ACCESS_VIEW,
            'extra' => array('icon' => ''),
            'label-menu' => true,
            'child' => array(
                array(
                'name' => 'Users',
                'position' => -1,
                'controller' => 'Controller_Admin_Users',
                'action' => 'index',
                'access' => Admin_Access::ACCESS_VIEW,
                'extra' => array('icon' => '<i class="fa fa-user fa-fw"></i>'),
                'child' => array(),
            	),
        
	            array(
	                'name' => 'Groups',
	                'position' => -2,
	                'controller' => 'Controller_Admin_Groups',
	                'action' => 'index',
	                'access' => Admin_Access::ACCESS_VIEW,
	                'extra' => array('icon' => '<i class="fa fa-users fa-fw"></i>'),
	                'child' => array(),
	            ),
        
	            array(
	                'name' => 'Modules',
	                'position' => -3,
	                'controller' => 'Controller_Admin_Modules',
	                'action' => 'index',
	                'access' => Admin_Access::ACCESS_VIEW,
	                'extra' => array('icon' => '<i class="fa fa-cubes fa-fw"></i>'),
	                'child' => array(),
	            ),
            		
            	array(
           			'name' => 'Cron',
       				'position' => -4,
       				'controller' => 'Controller_Admin_Cron',
       				'action' => 'index',
       				'access' => Admin_Access::ACCESS_VIEW,
       				'extra' => array('icon' => '<i class="fa fa-clock-o fa-fw"></i>'),
       				'child' => array(),
            		),
            		
            	
            		
            		array(
            				'name' => 'Audit',
            				'position' => -5,
            				'controller' => 'Controller_Admin_Audit',
            				'action' => 'index',
            				'access' => Admin_Access::ACCESS_VIEW,
            				'extra' => array('icon' => '<i class="fa fa-info fa-fw"></i>'),
            				'child' => array(),
            		),
        
	            array(
	            'name' => 'Settings',
	            'position' => -6,
	            'controller' => 'Controller_Admin_Settings',
	            'action' => 'index',
	            'access' => Admin_Access::ACCESS_VIEW,
	            'extra' => array('icon' => '<i class="fa fa-cogs fa-fw"></i>'),
	            'child' => array(),
	            ),
            ),
            ),
        )
    );
    
    $menu = new Admin_Menu($menuList);
    foreach (Modules::getListAdminMenu() as $child){
        $menu->addChild($child);
    }
    
    $menuHtml = menuBuilder($menu);

    // временное место админской меню из-за redeclare menuBuilder()
    function menuBuilder(Admin_Menu $menu){
    	$html = '';
    	$lang = Admin_Language::get();
    	$user = Admin_Auth::getInstance()->getAuthUser()->get_user();
    	$access = false;
    	$htmlParent = '';
    	$htmlChild = '';
    
    	$isLabel = $menu->isLabelMenu();
    	if ($menu->getName() != 'ROOT'){
    		$link = 'javascript:;';
    		if($menu->getController() == 'none'){
    			$access = new stdClass();
    			if ( $menu->hasChild()){
    				$access->result = true;
    			}
    
    			if (!$menu->hasChild() && $menu->getParent()->getName() == 'ROOT') $access->result = false;
    		}
    		else {
    			$access = Admin_Auth_Access::getInstance()->check(array(
    					'controller' => $menu->getController(),
    					'action' =>     $menu->getAction(),
    					'user'   =>     $user
    			), $menu->getAccess());
    
    			$link = URL::site(Route::url('admin', array('controller'=>$menu->getController4Route(), 'action' => $menu->getAction(), 'lang' => $lang)));
    		}
    
    
    		if ($access->result){
    			if ($isLabel){
    				ob_start();
    				?>
                		<li class="nav-divider"></li>
                		<li class="nav-header"><?php echo $menu->getLabel(); ?></li>
    	           		<?php
                  		$htmlParent .= ob_get_clean();
                	}
                	else {
                		$extra = $menu->getExtra();
                		ob_start();
                		?>
                		<li class="">
                			<a href="<?php echo $link;?>">
                  				<?php if (isset($extra['icon'])) echo $extra['icon'] . '&nbsp;'; ?><span class="link-title"><?php echo $menu->getLabel(); ?></span> 
                			</a> 
              			<?php if(!$menu->hasChild()): ?> </li><?php endif; ?>            		
                		<?php
                		$htmlParent .= ob_get_clean();
                		if (!$menu->hasChild()) $html .= $htmlParent;
                	}
                    
                }
            }
            else $access = true;
            
            if ($access && $menu->hasChild()){
                if ($menu->getName() != 'ROOT' && !$isLabel){
                    ob_start();
                    ?>
                    <ul>
                    <?php
                    $htmlParent .= ob_get_clean();
                }
                
                foreach ($menu->getChilds() as $child){
                    $htmlChild .= menuBuilder($child);
                }
                
                if ($menu->getName() != 'ROOT' && !$isLabel){
    				if ($htmlChild){
    	                ob_start();
    	                ?>
    	                </ul></li>
    	                <?php
    	                $html .= $htmlParent . $htmlChild . ob_get_clean();	                
                    }
               }
               
               if ($menu->getName() == 'ROOT' || $isLabel){
    				if ($htmlChild) $html .= $htmlParent . $htmlChild;
    			}
            }
            
            return $html;
        }
    
?>
<!-- #menu -->
        <ul id="menu" class="bg-dark dker">
          <?php echo $menuHtml ;?>
        </ul><!-- /#menu -->
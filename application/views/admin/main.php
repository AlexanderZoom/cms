<?php defined('SYSPATH') OR die('No direct script access.');

$warning = Admin_Session::instance()->get_once('FLASH_WARNING');
$error = Admin_Session::instance()->get_once('FLASH_ERROR');
$notice = Admin_Session::instance()->get_once('FLASH_NOTICE');
$lang = Admin_Language::get();

$title_page = $title;
if (is_array($title)){
    foreach ($title as $idx => $item)    $title[$idx] = ___($item);
    $title = array_reverse($title);
    $title_page = $title[0];
    $title = implode(' ' . $title_separator . ' ', $title);
}
?>
<!doctype html>
<html class="no-js">
  <head>
    <meta charset="UTF-8">
    <title><?php echo HTML::entities($title); ?></title>

    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/admin-content/lib/bootstrap/css/bootstrap.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin-content/lib/components-font-awesome/css/font-awesome.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="/admin-content/css/main.css">

    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="/admin-content/lib/metisMenu/metisMenu.css">
    
    <link rel="stylesheet" href="/admin-content/lib/jquery-inputlimiter/jquery.inputlimiter.1.0.css">
    <link rel="stylesheet" href="/admin-content/lib/bootstrap-daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="/admin-content/lib/jquery.uniform/themes/default/css/uniform.default.css">
    <link rel="stylesheet" href="/admin-content/lib/chosen/chosen.css">
    <link rel="stylesheet" href="/admin-content/lib/jquery.tagsinput/src/jquery.tagsinput.css">
    <link rel="stylesheet" href="/admin-content/lib/jasny-bootstrap/css/jasny-bootstrap.css">
    <link rel="stylesheet" href="/admin-content/lib/bootstrap-switch/css/bootstrap3/bootstrap-switch.css">
    <link rel="stylesheet" href="/admin-content/lib/bootstrap-datepicker/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/admin-content/lib/bootstrap-colorpicker/css/bootstrap-colorpicker.css">
    <link rel="stylesheet" href="/admin-content/lib/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css">
    
    <?php foreach ($_css as $item):?>
        <link href="<?php echo $item; ?>" rel="stylesheet" type="text/css" />
    <?php endforeach;?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
      <script src="/admin-content/lib/html5shiv/html5shiv.js"></script>
      <script src="/admin-content/lib/respond/dest/respond.min.js"></script>
      <![endif]-->

    <!--For Development Only. Not required -->
    <script>
      less = {
        env: "development",
        relativeUrls: false,
        rootpath: "/admin-content/"
      };
    </script>

    <link rel="stylesheet/less" type="text/css" href="/admin-content/less/theme.less">
    <script src="/admin-content/lib/less.js/less.js"></script>

    <!--Modernizr-->
    <script src="/admin-content/lib/modernizr/modernizr.min.js"></script>
    
    <!--jQuery -->
    <script src="/admin-content/lib/jquery/jquery.min.js"></script>
    
    <?php foreach ($_js as $item):?>
        <script src="<?php echo $item; ?>"></script>
    <?php endforeach;?>
        
  </head>
  <body class="  ">
    <div class="bg-dark dk" id="wrap">
      <div id="top">

        <!-- .navbar -->
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->
            <header class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
              </button>
              
              <a href="<?php echo URL::site(Route::url('admin', array('lang' => $lang)));?>" class="navbar-brand">
                <?php echo ___('Admin panel');?>
              </a> 
            </header>
            <div class="topnav">
              <div class="btn-group">
                <a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip" class="btn btn-default btn-sm" id="toggleFullScreen">
                  <i class="glyphicon glyphicon-fullscreen"></i>
                </a> 
              </div>
               <div class="btn-group">
               <!-- <a data-placement="bottom" data-original-title="E-mail" data-toggle="tooltip" class="btn btn-default btn-sm">
                  <i class="fa fa-envelope"></i>
                  <span class="label label-warning">5</span> 
                </a> -->
                <?php if (Admin_Auth_Access::getInstance()->check(array(
    					'controller' => 'Controller_Admin_Notification',
    					'action' =>     'index',
    					'user'   =>     $current_user
    			), Admin_Access::ACCESS_VIEW)):
                
    			$rParams = array(
    					'limit' => 0,
    					'offset' => 0,
    					'user'	=> $current_user,
    					'all'	=> false,
    					'count' => true,
    			);
                
				$res =  Admin_Notification::get($rParams);
				if ($res):
                ?>
                <a data-placement="bottom" data-original-title="<?php echo ___('Notifications');?>" href="<?php echo URL::site(Route::url('admin', array('controller' => 'notification', 'lang'=> $lang)));?>" data-toggle="tooltip" class="btn btn-default btn-sm">
                  <i class="fa fa-bell"></i>
                  <span class="label label-danger"><?php echo $res;?></span> 
                </a>
                <?php endif;?> 
                <?php endif;?>
              <!--   <a data-toggle="modal" data-original-title="Help" data-placement="bottom" class="btn btn-default btn-sm" href="#helpModal">
                  <i class="fa fa-question"></i>
                </a>  -->
              </div>
              <div class="btn-group">
                <a href="<?php echo URL::site(Route::url('admin', array('controller'=>'logout', 'lang' => $lang)));?>" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom" class="btn btn-metis-1 btn-sm">
                  <i class="fa fa-power-off"></i>
                </a> 
              </div>
              <div class="btn-group">
                <a data-placement="bottom" data-original-title="Show / Hide Left" data-toggle="tooltip" class="btn btn-primary btn-sm toggle-left" id="menu-toggle">
                  <i class="fa fa-bars"></i>
                </a> 
                <a data-placement="bottom" data-original-title="Show / Hide Right" data-toggle="tooltip" class="btn btn-default btn-sm toggle-right"> <span class="glyphicon glyphicon-comment"></span>  </a> 
              </div>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">

              <!-- .nav -->
              <!-- <ul class="nav navbar-nav">
                <li> <a href="dashboard.html">Dashboard</a>  </li>
                <li> <a href="table.html">Tables</a>  </li>
                <li> <a href="file.html">File Manager</a>  </li>
                <li class='dropdown '>
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Form Elements
                    <b class="caret"></b>
                  </a> 
                  <ul class="dropdown-menu">
                    <li> <a href="form-general.html">General</a>  </li>
                    <li> <a href="form-validation.html">Validation</a>  </li>
                    <li> <a href="form-wysiwyg.html">WYSIWYG</a>  </li>
                    <li> <a href="form-wizard.html">Wizard &amp; File Upload</a>  </li>
                  </ul>
                </li>
              </ul> --><!-- /.nav -->
            </div>
          </div><!-- /.container-fluid -->
        </nav><!-- /.navbar -->
        <header class="head">
          <div class="search-bar">
            <form class="main-search" action="">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Live Search ...">
                <span class="input-group-btn">
                      <button class="btn btn-primary btn-sm text-muted" type="button">
                          <i class="fa fa-search"></i>
                      </button>
                  </span> 
              </div>
            </form><!-- /.main-search -->
          </div><!-- /.search-bar -->
          <div class="main-bar">
            <?php if (count($breadcrumbs)):?>
            <h5 id="breadcrumbs">
            <?php foreach ($breadcrumbs as $idx => $crumb):?>
            
            <i class="<?php echo $crumb['icon']; ?>"></i>  <a href="<?php echo $crumb['url']; ?>"><?php echo ___($crumb['name']); ?></a>
            <?php if ($idx < count($breadcrumbs) -1 ): ?>&nbsp;/&nbsp;<?php endif;?>
            <?php endforeach;?>
            </h5>
            <?php endif;?>
          </div><!-- /.main-bar -->
        </header><!-- /.head -->
      </div><!-- /#top -->
      <div id="left">
        <!--<div class="media user-media bg-dark dker">
          <div class="user-media-toggleHover">
            <span class="fa fa-user"></span> 
          </div>
           <div class="user-wrapper bg-dark">
            <a class="user-link" href="">
              <img class="media-object img-thumbnail user-img" alt="User Picture" src="/admin-content/img/user.gif">
              <span class="label label-danger user-label">16</span> 
            </a> 
            <div class="media-body">
               <h5 class="media-heading">Archie</h5>
              <ul class="list-unstyled user-info">
                <li> <a href=""><?php echo Admin_Auth::getInstance()->getAuthUser()->get_user()->login;?></a>  </li>
                <li>Last Access :
                  <br>
                  <small>
                    <i class="fa fa-calendar"></i>&nbsp;16 Mar 16:32</small> 
                </li> 
              </ul>
            </div>
          </div> 
        </div>-->
		<?php echo $sidebar; ?>
        
      </div><!-- /#left -->
      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter">     
          <h2><?php echo $title_page;?> <?php if ($title_description): ?><small><?php echo $title_description?></small><?php endif;?></h2>       
                        
            <?php if ($error || $warning || $notice) :?>
            
            <?php if ($error): ?>
            <div class="alert alert-success">
                </p><?php echo ___($error); ?></p>
            </div>
            <?php endif;?>
            
            <?php if ($warning): ?>
            <div class="alert alert-warning">
                </p><?php echo ___($warning); ?></p>
            </div>
            <?php endif;?>
            
            <?php if ($notice): ?>
            <div class="alert alert-info">
                
                </p><?php echo ___($notice); ?></p>
            </div>
            <?php endif;?>
            
            <?php endif; ?>
            
            <?php echo $content; ?>
            
            
          </div><!-- /.inner -->
        </div><!-- /.outer -->
      </div><!-- /#content -->
      <div id="right" class="bg-light lter">
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Warning!</strong>  Best check yo self, you're not looking too good.
        </div>

        <!-- .well well-small -->
        <div class="well well-small dark">
          <ul class="list-unstyled">
            <li>Visitor <span class="inlinesparkline pull-right">1,4,4,7,5,9,10</span> </li>
            <li>Online Visitor <span class="dynamicsparkline pull-right">Loading..</span> </li>
            <li>Popularity <span class="dynamicbar pull-right">Loading..</span> </li>
            <li>New Users <span class="inlinebar pull-right">1,3,4,5,3,5</span> </li>
          </ul>
        </div><!-- /.well well-small -->

        <!-- .well well-small -->
        <div class="well well-small dark">
          <button class="btn btn-block">Default</button>
          <button class="btn btn-primary btn-block">Primary</button>
          <button class="btn btn-info btn-block">Info</button>
          <button class="btn btn-success btn-block">Success</button>
          <button class="btn btn-danger btn-block">Danger</button>
          <button class="btn btn-warning btn-block">Warning</button>
          <button class="btn btn-inverse btn-block">Inverse</button>
          <button class="btn btn-metis-1 btn-block">btn-metis-1</button>
          <button class="btn btn-metis-2 btn-block">btn-metis-2</button>
          <button class="btn btn-metis-3 btn-block">btn-metis-3</button>
          <button class="btn btn-metis-4 btn-block">btn-metis-4</button>
          <button class="btn btn-metis-5 btn-block">btn-metis-5</button>
          <button class="btn btn-metis-6 btn-block">btn-metis-6</button>
        </div><!-- /.well well-small -->

        <!-- .well well-small -->
        <div class="well well-small dark">
          <span>Default</span> <span class="pull-right"><small>20%</small> </span> 
          <div class="progress xs">
            <div class="progress-bar progress-bar-info" style="width: 20%"></div>
          </div>
          <span>Success</span> <span class="pull-right"><small>40%</small> </span> 
          <div class="progress xs">
            <div class="progress-bar progress-bar-success" style="width: 40%"></div>
          </div>
          <span>warning</span> <span class="pull-right"><small>60%</small> </span> 
          <div class="progress xs">
            <div class="progress-bar progress-bar-warning" style="width: 60%"></div>
          </div>
          <span>Danger</span> <span class="pull-right"><small>80%</small> </span> 
          <div class="progress xs">
            <div class="progress-bar progress-bar-danger" style="width: 80%"></div>
          </div>
        </div>
      </div><!-- /#right -->
    </div><!-- /#wrap -->
    <footer class="Footer bg-dark dker">
      <p><?php echo date('Y');?></p>
    </footer><!-- /#footer -->

    <!-- #helpModal -->
    <div id="helpModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Modal title</h4>
          </div>
          <div class="modal-body">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
              in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal --><!-- /#helpModal -->

    
    <script src="/admin-content/lib/moment/moment.js"></script>
    <script src="/admin-content/lib/jquery.uniform/dist/jquery.uniform.min.js"></script>
    <script src="/admin-content/lib/chosen/chosen.jquery.js"></script>
    <script src="/admin-content/lib/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <script src="/admin-content/lib/autosize/dist/autosize.js"></script>
    <script src="/admin-content/lib/jasny-bootstrap/js/jasny-bootstrap.js"></script>
    <script src="/admin-content/lib/bootstrap-switch/js/bootstrap-switch.js"></script>
    <script src="/admin-content/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="/admin-content/lib/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script src="/admin-content/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    

    <!--Bootstrap -->
    <script src="/admin-content/lib/bootstrap/js/bootstrap.js"></script>

    <!-- MetisMenu -->
    <script src="/admin-content/lib/metisMenu/metisMenu.js"></script>

    <!-- Screenfull -->
    <script src="/admin-content/lib/screenfull.js/screenfull.js"></script>
    <script src="/admin-content/lib/jquery-inputlimiter/jquery.inputlimiter.1.3.1.js"></script>
    <script src="/admin-content/lib/jQuery.validVal/js/jquery.validVal.js"></script>
    <script src="/admin-content/lib/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Metis core scripts -->
    <script src="/admin-content/js/core.js"></script>

    <!-- Metis demo scripts -->
    <script src="/admin-content/js/app.js"></script>

    <script type="text/javascript">

function handleResize() {
var h = $(window).height() - 160;
        $('.inner').css({'min-height':h+'px'});
}
$(function(){
        handleResize();

        $(window).resize(function(){
        handleResize();
    });
});
</script>
    
<script>
      $(function() {
        Metis.formGeneral();
      });
</script>    
    
    <?php foreach ($_js_bottom as $item):?>
    <script src="<?php echo $item; ?>"></script>
   <?php endforeach;?>
 </body>
</html>
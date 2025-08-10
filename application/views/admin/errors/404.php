<?php defined('SYSPATH') OR die('No direct script access.'); $lang = I18n::lang();?>
      <div class="col-lg-8 col-lg-offset-2 text-center">
        <div class="logo">
          <h1>404</h1>
        </div>
        <p class="lead text-muted"><?php echo ___('Page not found'); ?></p>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <br>
        <div class="col-lg-6 col-lg-offset-3">
          <div class="btn-group btn-group-justified">            
            <a href="<?php echo URL::site(Route::url('admin', array('lang' => $lang)));?>" class="btn btn-warning"><?php echo ___('Go to home'); ?></a> 
          </div>
        </div>
      </div><!-- /.col-lg-8 col-offset-2 -->
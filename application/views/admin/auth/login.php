<?php defined('SYSPATH') OR die('No direct script access.');
$warning = Admin_Session::instance()->get_once('FLASH_WARNING');
?>
<body class="login">
    <div class="form-signin">
      <div class="text-center">
        <?php echo ___('Admin panel');?>
      </div>
      <hr>
      <div class="tab-content">
        <?php if ($warning): ?>
            <div class="alert alert-dismissable alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                </p><?php echo ___($warning); ?></p>
            </div>
            <?php endif;?>
        <div id="login" class="tab-pane active">
          <form method="POST">
            <p class="text-muted text-center">
              &nbsp;
            <input type="text" name="login" placeholder="<?php echo ___('Login');?>" class="form-control top">
            <input type="password" name="password" placeholder="<?php echo ___('Password');?>" class="form-control bottom">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="1" name="remember"> <?php echo ___('Remember me');?>
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="check_auth"><?php echo ___('Enter');?></button>
          </form>
        </div>
       <!-- <div id="forgot" class="tab-pane">
          <form action="index.html">
            <p class="text-muted text-center">Enter your valid e-mail</p>
            <input type="email" placeholder="mail@domain.com" class="form-control">
            <br>
            <button class="btn btn-lg btn-danger btn-block" type="submit">Recover Password</button>
          </form>
        </div>
        <div id="signup" class="tab-pane">
          <form action="index.html">
            <input type="text" placeholder="username" class="form-control top">
            <input type="email" placeholder="mail@domain.com" class="form-control middle">
            <input type="password" placeholder="password" class="form-control middle">
            <input type="password" placeholder="re-password" class="form-control bottom">
            <button class="btn btn-lg btn-success btn-block" type="submit">Register</button>
          </form>
        </div>
      </div>
      <hr>
      <div class="text-center">
        <ul class="list-inline">
          <li> <a class="text-muted" href="#login" data-toggle="tab">Login</a>  </li>
          <li> <a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a>  </li>
          <li> <a class="text-muted" href="#signup" data-toggle="tab">Signup</a>  </li>
        </ul>
      </div> --> 
    </div>

    
    <script type="text/javascript">
      (function($) {
        $(document).ready(function() {
          $('.list-inline li > a').click(function() {
            var activeForm = $(this).attr('href') + ' > form';
            //console.log(activeForm);
            $(activeForm).addClass('animated fadeIn');
            //set timer to 1 seconds, after that, unload the animate animation
            setTimeout(function() {
              $(activeForm).removeClass('animated fadeIn');
            }, 1000);
          });
        });
      })(jQuery);
    </script>
</body>
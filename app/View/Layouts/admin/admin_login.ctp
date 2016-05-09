<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title_for_layout; ?></title>
    <?php 
      echo $this->Html->css(array(
        '/admin_assets/css/bootstrap.min.css',
        '/admin_assets/Admin-lte/AdminLTE.min.css',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        
       
        '/admin_assets/Admin-lte/plugins/iCheck/square/blue.css',
        ));
     // echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');
      echo $this->Html->script('/admin_assets/Admin-lte/plugins/jQuery/jQuery-2.1.4.min.js');
     ?>
      <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php 
          $app = array();
          $app['basePath'] = Router::url('/');
          $app['params'] = array(
            'controller' => $this->params['controller'],
            'action' => $this->params['action'],
            'named' => $this->params['named'],
          );
          echo $this->Html->scriptBlock('var App = ' . $this->Js->object($app) . ';');
     ?>
  </head>

 <body class="hold-transition login-page">
    <div class="login-box">
	<div class="">
		<?php echo $this->Session->flash(); ?>
	</div>
	
      <div class="login-logo">
        <a href="<?php echo $this->webroot; ?>/admin"><b>Admin</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
      
       <?php  echo $this->Form->create('User', array('role' => 'form', 'class' => 'form-signin')); ?>
          <div class="form-group has-feedback">
            <?php echo $this->Form->input('username', array(
						'label' => false,
						'div' => false,
						'class' => 'form-control',
						'placeholder' => __d('admin', 'Username')
					));?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
		  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              <?php echo $this->Form->input('password', array(
							'label' =>false,
							'div' => false,
							'class' => 'form-control',
							'placeholder' => __d('admin', 'Password'),
							'type' => 'password'
						));?>
            
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
       <?php echo $this->Form->end(); ?>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-primary btn-block btn-flat">Sign Up</a>
          
        </div><!-- /.social-auth-links -->

        <a href="#">I forgot my password</a><br>
        

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

      <?php 
      echo $this->Html->script( array(
     // '/admin_assets/js/bootstrap.min.js',

	  '/admin_assets/Admin-lte/bootstrap/js/bootstrap.min.js',
	 
	  '/admin_assets/Admin-lte/plugins/iCheck/icheck.min.js',
	
	  )
	  );
    ?>
      <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>


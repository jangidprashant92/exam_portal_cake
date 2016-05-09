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
        'font-awesome.css',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        '/admin_assets/Admin-lte/skins/_all-skins.min.css',
        '/admin_assets/Admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        ));



    echo $this->Html->script(array(
        'jquery.min.js',
        "/Froala/froala_editor.min",
        "/Froala/plugins/align.min",
        "/Froala/plugins/char_counter.min",
        "/Froala/plugins/code_beautifier.min",
        "/Froala/plugins/code_view.min",
        "/Froala/plugins/colors.min",
        "/Froala/plugins/draggable.min",
        "/Froala/plugins/emoticons.min",
        "/Froala/plugins/entities.min",
        "/Froala/plugins/file.min",
        "/Froala/plugins/font_size.min",
        "/Froala/plugins/font_family.min",
        "/Froala/plugins/fullscreen.min",
        "/Froala/plugins/image.min",
        "/Froala/plugins/image_manager.min",
        "/Froala/plugins/line_breaker.min",
        "/Froala/plugins/inline_style.min",
        "/Froala/plugins/link.min",
        "/Froala/plugins/lists.min",
        "/Froala/plugins/paragraph_format.min",
        "/Froala/plugins/paragraph_style.min",
        "/Froala/plugins/quick_insert.min",
        "/Froala/plugins/quote.min",
        "/Froala/plugins/table.min",
        "/Froala/plugins/save.min",
        "/Froala/plugins/url.min",
        "/Froala/plugins/video.min"), array('toolbarInline' => false));
    echo $this->Html->css(array(
            "/Froala/css/froala_editor.css",
            "/Froala/css/froala_style.css",
            "/Froala/css/plugins/code_view.css",
            "/Froala/css/plugins/colors.css",
            "/Froala/css/plugins/emoticons.css",
            "/Froala/css/plugins/image_manager.css",
            "/Froala/css/plugins/image.css",
            "/Froala/css/plugins/line_breaker.css",
            "/Froala/css/plugins/table.css",
            "/Froala/css/plugins/char_counter.css",
            "/Froala/css/plugins/video.css",
            "/Froala/css/plugins/fullscreen.css",
            "/Froala/css/plugins/file.css",
            "/Froala/css/plugins/quick_insert.css"
        )
    );
    echo $this->Html->script(array('jQuery.Validation','jquery.metadata','relCopy','script.js'));
     ?>
      <link rel="stylesheet" href="<?php echo $this->webroot; ?>/css/jquery-duration-picker.css">
      <link rel="stylesheet" href="<?php echo $this->webroot; ?>/css/jquery-ui.css">
      <script src="<?php echo $this->webroot; ?>/js/jquery-duration-picker.js"></script>
      <script src="<?php echo $this->webroot; ?>/js/jquery-ui.js"></script>
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

  <body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
	  <?php echo $this->element('admin/header');?>
	  
	  <?php echo $this->element('admin/left');?>
	  
	    <div class="content-wrapper">
		 <?php echo $this->element('admin/breadcumb');?>
		<section class="content">
		 <?php echo $this->fetch('content'); ?>

		</div>
		 <?php echo $this->element('admin/footer');?>
	</div>
  
  <?php
      echo $this->Html->script( array(


	  '/admin_assets/Admin-lte/bootstrap/js/bootstrap.min.js',
	  '/admin_assets/Admin-lte/plugins/slimScroll/jquery.slimscroll.min.js',
	  '/admin_assets/Admin-lte/plugins/fastclick/fastclick.min.js',
	  '/admin_assets/Admin-lte/app.min.js',
	  '/admin_assets/Admin-lte/demo.js',
	  '/admin_assets/js/custom-script.js',

	  )
	  );

    ?>
  

  <?php /*
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo $this->webroot; ?>/admin">CakePHP Admin Plugin</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><?php echo $this->Html->link(__d('admin', 'Dashboard'), '/admin'); ?></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __d('admin', 'Languages'); ?> <b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <?php
                   echo $this->Html->image("Admin.flags/por.png", array(
                       "alt" => __d('admin', "Brazilian"),
                       'url' => '/admin/languages/pt-br',
                       'class' => 'lang-flag'
                   ));
                   ?>
                </li>
                <li>
                  <?php 
                    echo $this->Html->image("Admin.flags/eng.png", array(
                        "alt" => __d('admin', "English"),
                        'url' => '/admin/languages/eng',
                        'class' => 'lang-flag'
                    ));
                   ?>
                </li>                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __d('admin', 'User control'); ?> <b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <?php echo $this->Html->link(__d('admin', 'Users'), array('plugin' => 'admin', 'controller' => 'users', 'action' => 'index', 'admin' => true)); ?>
                </li>
                <li class="divider"></li>
                <li>
                  <?php echo $this->Html->link(__d('admin', 'Logout'), array('plugin' => 'admin', 'controller' => 'users', 'action' => 'logout', 'admin' => true)); ?>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 col-md-12 main">
          <!-- <h1 class="page-header">Dashboard</h1> -->

          <div class="row-fluid">
            <?php 
              echo $this->Session->flash();
              echo $this->Session->flash('auth');
              ?>
            <h2 class="sub-header"><?php echo $title_for_layout; ?></h2>
            <?php echo $this->fetch('content'); ?>
          </div>
      </div>
    </div>
    <?php 
      echo $this->Html->script('/admin/js/bootstrap.min.js');
     ?>*/ ?>
     <script type="text/javascript">
      $(function(){
        $('.lang-flag').each(function(i, val){
          $alt = val.alt;
          $(this).parent('a').append(' '+$alt);
        });
      });
     </script>
  </body>
</html> 

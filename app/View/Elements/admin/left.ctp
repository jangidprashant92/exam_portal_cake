 <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <?php

            $left_menu=[
                ['name'=>'Dashboard',
                 'url'=> $this->webroot."admin",
                 'icon'=>' <i class="fa fa-dashboard"></i>'],
                ['name'=>'Users',
                'url'=> $this->webroot."admin/users",
                'icon'=>' <i class="fa fa-user"></i>'],
                ['name'=>'Subjects',
                    'url'=> $this->webroot."admin/subjects",
                    'icon'=>' <i class="fa fa-book"></i>'],
                ['name'=>'Tests',
                    'url'=> $this->webroot."admin/tests",
                    'icon'=>' <i class="fa fa-file-code-o"></i>'],
               /* ['name'=>'Questions',
                    'url'=> $this->webroot."admin/questions",
                    'icon'=>' <i class="fa fa-question-circle-o"></i>']*/
            ];

            ?>

            <?php foreach($left_menu as $menu){ ?>
            <li class="<?php if( ucfirst($this->params->controller)==$menu['name']){?>active<?php } ?>">
              <a href="<?php echo $menu['url']; ?>">
                <?php echo $menu['icon']; ?> <span><?php echo $menu['name']; ?></span>
              </a>
            </li>
            <?php } ?>


          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
    <section class="content-header">
          <h1>
					<?php echo $title_for_layout; ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
    </section>
    <?php
    echo $this->Session->flash();
    echo $this->Session->flash('auth');
    ?>
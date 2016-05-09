<div class="container">

  <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
      <div class="panel-heading clearfix">
        <div class="panel-title pull-left">Sign Up</div>
        <div class="pull-right"><?php echo $this->Html->link(
                'Sign In',
                array('controller'=>'users','action'=>'login'),
                array( 'escape' => false, 'id' => '')
            );
            ?></div>
      </div>
      <div class="panel-body" >

          <?php  echo $this->Form->create('User', array('role' => 'form', 'id' => 'signupform','class'=>'form-horizontal')); ?>
          <div id="signupalert" style="display:none" class="alert alert-danger">
            <p>Error:</p>
            <span></span> </div>
          <div class="form-group">
            <label for="email" class="col-md-3 control-label">Email</label>
            <div class="col-md-9">

                <?php echo $this->Form->input('email', array(
                    'label' => false,
                    'div' => false,
                    'id'=>"login-username",
                    'class' => 'form-control',
                    'placeholder' => __d('admin', 'Email Address'),
                    'type'=>'email'
                ));?>
              
            </div>
          </div>
          <div class="form-group">
            <label for="firstname" class="col-md-3 control-label">First Name</label>
            <div class="col-md-9">
                <?php echo $this->Form->input('name', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'form-control',
                    'placeholder' => __d('admin', 'First Name')
                ));?>
            </div>
          </div>
          <div class="form-group">
            <label for="lastname" class="col-md-3 control-label">Last Name</label>
            <div class="col-md-9">
                <?php echo $this->Form->input('last_name', array(
                    'label' => false,
                    'div' => false,
                    'class' => 'form-control',
                    'placeholder' => __d('admin', 'Last Name')
                ));?>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-md-3 control-label">Password</label>
            <div class="col-md-9">
                <?php echo $this->Form->input('password', array(
                    'label' =>false,
                    'div' => false,
                    'class' => 'form-control',
                    'placeholder' => __d('admin', 'Password'),
                    'type' => 'password'
                ));?>
            </div>
          </div>
         <?php /* <div class="form-group">
            <label for="icode" class="col-md-3 control-label">Invitation Code</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="icode" placeholder="">
            </div>
          </div>*/ ?>
          <div class="form-group"> 
            <!-- Button -->
            <div class="col-md-offset-3 col-md-9">
              <button id="btn-signup" type="submit" class="btn btn-info">Sign Up</button>
              <span>&nbsp; or &nbsp;</span>
              <button id="btn-fbsignup" type="button" class="btn btn-primary">Sign Up with Facebook</button>
            </div>
          </div>
          <?php echo $this->Form->end(); ?>
      </div>
    </div>
  </div>
</div>

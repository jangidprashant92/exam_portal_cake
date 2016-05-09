<div class="container">
  <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info" >
      <div class="panel-heading clearfix">
        <div class="panel-title pull-left">Sign In</div>
        <div class="pull-right"><small><a href="javascript:void();" data-target="#pwdModal" data-toggle="modal">Forgot password?</a></small></div>
      </div>
      <div class="panel-body" >
      <div class="col-sm-12">

<?php echo $this->Session->flash(); ?>
          <?php  echo $this->Form->create('User', array('role' => 'form', 'id' => 'loginform','class'=>'form-horizontal')); ?>
        <div class="form-group ">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>

            <?php echo $this->Form->input('username', array(
                'label' => false,
                'div' => false,
                'id'=>"login-username",
                'class' => 'form-control',
                'placeholder' => __d('admin', 'username or email')
            ));?>
          </div>
          </div>
          <div class="form-group ">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

            <?php echo $this->Form->input('password', array(
                'label' =>false,
                'div' => false,
                'id'=>"login-password",
                'class' => 'form-control',
                'placeholder' => __d('admin', 'Password'),
                'type' => 'password'
            ));?>
          </div>
          </div>
          <div class="form-group"> 
          <div class="input-group">
            <div class="checkbox">
              <label>
                <input id="login-remember" type="checkbox" name="remember" value="1">
                Remember me </label>
            </div>
          </div>
          </div>
          <div class="form-group"> 
            <!-- Button -->
            
            <div class="controls">   <button  id="btn-login"  type="submit" class="btn btn-success">Login</button> <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a> </div>
          </div>
          <div class="form-group">
            <div class="control">
              <div style="border-top: 1px solid#888; padding-top:15px;" > <small>Don't have an account!      <?php echo $this->Html->link(
                          'Sign Up here',
                          array('controller'=>'users','action'=>'register'),
                          array( 'escape' => false, 'id' => '')
                      );
                      ?> </small></div>
            </div>
          </div>
        <?php echo $this->Form->end(); ?>
		</div>
      </div>
    </div>
  </div>
  </div>


<!--modal-->
<div id="pwdModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="text-center" style="margin:0px;">What's My Password?</h3>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-md-12">
                <div class="panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                          
                          <p>If you have forgotten your password you can reset it here.</p>
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail Address" name="email" type="email">
                                    </div>
                                    <input class="btn btn-primary" value="Send My Password" type="submit">
                                </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            </div>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
</div>

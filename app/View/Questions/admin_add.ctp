
<div class="row">
    <div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
			<h3 class="box-title"><?php echo __('Add Question'); ?></h3>
			</div>
			<div class="box-body table-responsive">
		
			<?php echo $this->Form->create('Question', array('role' => 'form')); ?>

				<fieldset>

										<div class="form-group">
						<?php echo $this->Form->input('test_id', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('description', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<div id="01" class="phone col-xs-offset-1">Option :
							<?php echo $this->Form->input('option.', array('class' => 'chkbox','label'=>false,'type'=>'checkbox','onclick'=>'add_attr(this);','hiddenField'=>false)); ?>
							<?php echo $this->Form->input('optionValue.', array('class' => '','label'=>false)); ?>
						</div>
					</div>
					<p><a href="#" class="copy" rel=".phone">Add Options</a></p>

					<div class="form-group">
						<?php echo $this->Form->input('multichoice', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('status', array('class' => 'form-control','options'=>$status_array)); ?>
					</div><!-- .form-group -->

					<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

						<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
</div><!-- /#page-container .row-fluid -->
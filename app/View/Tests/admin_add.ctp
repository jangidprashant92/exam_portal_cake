<div class="row">
    <div class="col-xs-12 ">
		<div class="box box-primary">
			<div class="box-header">
			<h3 class="box-title"><?php echo __('Add Exam'); ?></h3>
			</div>
			<div class="box-body table-responsive">
		
			<?php echo $this->Form->create('Test', array('role' => 'form')); ?>

				<fieldset>


					<div class="form-group">
						<?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<label>Description</label>
						<?php echo $this->Form->textarea('description', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('start_date', array('class' => 'form-control','type'=>'text')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('end_date', array('class' => 'form-control','type'=>'text')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('duration', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<label>Subjects</label>
						<?php echo $this->Form->input('sub_id.', array('class' => 'form-control','options'=>$subjects,'multiple')); ?>
					</div><!-- .form-group -->



					<?php echo $this->Form->submit('Next', array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

						<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
	</div>


<script>
	jQuery(function () {
		jQuery('#TestDuration').durationPicker();
		// $('#duration2').durationPicker({ showSeconds: true });
	});
</script>
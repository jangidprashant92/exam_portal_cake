<div class="row">
    <div class="col-xs-12 ">
		<div class="box box-primary">
			<div class="box-header">
			<h3 class="box-title"><?php echo __('Add No. of Question to Test'); ?></h3>
			</div>
			<div class="box-body table-responsive">
		
			<?php echo $this->Form->create('TestSubject', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group">
						<?php $n=0; foreach($subjects as $subject){ ?>
							<label><?php echo $subject['Subject']['name']; ?></label>
						<?php echo $this->Form->input('no_of_question.', array('class' => 'form-control','name'=>'data[TestSubject]['.$n.'][no_of_question]','type'=>'text','label'=>false,'value'=>$subject['TestSubject']['no_of_question'])); ?>
						<?php echo $this->Form->hidden('sub_id.', array('class' => 'form-control','name'=>'data[TestSubject]['.$n.'][sub_id]','value'=>$subject['TestSubject']['sub_id'],'type'=>'text','label'=>false)); ?>

						<?php $n++; } ?>
						<?php echo $this->Form->hidden('test_id', array('class' => 'form-control','name'=>'data[test_id]','value'=>$test_id,'type'=>'text','label'=>false)); ?>
					</div><!-- .form-group -->



					<?php echo $this->Form->submit('Next', array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

						<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
	</div>


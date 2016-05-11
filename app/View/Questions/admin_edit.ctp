
<div class="row">
    <div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
			<h3 class="box-title"><?php echo __('Edit Question'); ?></h3>
			</div>
			<div class="box-body table-responsive">
		
			<?php /*pr($this->request->data);die;*/ echo $this->Form->create('Question', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->

					<div class="form-group">
						<?php echo $this->Form->hidden('test_id', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->

					<div class="form-group">
						<?php   echo  $this->Froala->editor('textarea#QuestionDescription', array('imageUploadURL' => $this->webroot."app/editor_image_upload/",'imageUploadMethod'=>'POST','imageUploadParam'=>'image_param','height'=>'200px','remove'=>$this->webroot."app/delete_editor_image"));	?>
						<?php echo $this->Form->textarea('description', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<?php /*<div class="form-group">
						<?php echo $this->Form->input('multichoice', array('class' => 'form-control')); ?>
					</div><!-- .form-group --> */ ?>

					<div class="form-group add_clone">
						<?php if(!empty($this->request->data['QuestionOption'])){?>
						<?php $i=0; $count=0; foreach($this->request->data['QuestionOption'] as $option){
								$checked="";

								if(searchId($option['id'],$option['QuestionAnswer'])){  $checked="checked"; }
								?>
						<div id="0<?php echo $i+1; ?>" class="phone col-xs-offset-1">Option :
							<?php echo  $this->Froala->editor('textarea#QuestionOptionValue', array('imageUploadURL' => $this->webroot."app/editor_image_upload/",'imageUploadMethod'=>'POST','imageUploadParam'=>'image_param','height'=>'150px','width'=>'500px','remove'=>$this->webroot."app/delete_editor_image"));	?>
							<?php echo $this->Form->input('option.', array('class' => 'chkbox','label'=>false,'type'=>'checkbox','onclick'=>'add_attr(this);','hiddenField'=>false,'checked'=>$checked)); ?>
							<?php echo $this->Form->textarea('optionValue.', array('name' => 'data[QuestionOption]['.$i.'][value]','label'=>false,'value'=>$option['value'])); ?>
							<?php echo $this->Form->hidden('id.', array('name' => 'data[QuestionOption]['.$i.'][id]','label'=>false,'value'=>$option['id'])); ?>
						</div>
						<?php  $i++;$count+=$i; } } ?>
					</div>
					<p><a href="javascript:void(0);" data-count="<?php echo $count; ?>" id="addScnt" class="copy12" rel=".phone1">Add Options</a></p>


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
<?php
function searchId($id,$array)
{
	foreach ($array as $key=>$val)
	{
		if($val['option_id']==$id)
		{
			return true;
		}
	}
return false;
}

?>
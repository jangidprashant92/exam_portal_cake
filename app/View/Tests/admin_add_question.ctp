
<?php echo $this->Form->create('Question',array('url'=>array('controller'=>'tests', 'action'=>'add_question/'.$id)),array('role' => 'form')); ?>

<fieldset>


        <?php echo $this->Form->hidden('test_id', array('class' => 'form-control','value'=>$id)); ?>

    <div class="form-group">
        <?php   echo  $this->Froala->editor('textarea#QuestionDescription', array('imageUploadURL' => $this->webroot."app/editor_image_upload/",'imageUploadMethod'=>'POST','imageUploadParam'=>'image_param','height'=>'200px','remove'=>$this->webroot."app/delete_editor_image"));	?>

        <?php echo $this->Form->textarea('description', array('class' => '{required:true, maxlength:100, messages:{required:\'This field is required.\', maxlength:\'This field can contain maximum 100 characters.\'}}')); ?>
    </div><!-- .form-group -->
    <div class="form-group add_clone">
        <div id="01" class="phone col-xs-offset-1">Option :
            <?php echo  $this->Froala->editor('textarea#QuestionOptionValue', array('imageUploadURL' => $this->webroot."app/editor_image_upload/",'imageUploadMethod'=>'POST','imageUploadParam'=>'image_param','height'=>'150px','width'=>'500px','remove'=>$this->webroot."app/delete_editor_image"));	?>
            <?php echo $this->Form->input('option.', array('class' => 'chkbox','label'=>false,'type'=>'checkbox','onclick'=>'add_attr(this);','hiddenField'=>false)); ?>
            <?php echo $this->Form->textarea('optionValue.', array('class' => '','label'=>false)); ?>
        </div>
    </div>
    <p><a href="javascript:void(0);" id="addScnt" class="copy12" rel=".phone1">Add Options</a></p>

   <?php /* <div class="form-group">
        <?php echo $this->Form->input('multichoice', array('class' => 'form-control')); ?>
    </div><!-- .form-group --> */ ?>
    <div class="form-group">
        <?php echo $this->Form->input('status', array('class' => 'form-control','options'=>$status_array)); ?>

    </div><!-- .form-group -->
<?php if($curpage==$page){ $next="Finish"; }else{$next="Next"; }?>
    <?php echo $this->Form->submit($next, array('class' => 'btn btn-large btn-primary','id'=>'next')); ?>

</fieldset>

<?php echo $this->Form->end(); ?>

<script>
   jQuery("#QuestionAdminAddQuestionForm").validate({
       rules: {
           // simple rule, converted to {required:true}
           "data[Question][description]": "required",
       }

   } );
</script>
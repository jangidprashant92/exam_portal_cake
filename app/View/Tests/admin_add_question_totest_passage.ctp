
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <?php echo $this->Form->create('Question', array('role' => 'form')); ?>

            <div class="box-header">
                <h3 class="box-title"><?php echo __('Add Question No. ')." ".$Q_no; ?></h3>
                <div class="pull-right"><?php echo $this->Form->input('type', array('class' => 'form-control','label'=>false,'options'=>$question_type_option,'selected'=>$question_type)); ?></div>
            </div>
            <div class="box-body table-responsive">
                <ul class="list-inline testSubjct">
                    <?php  foreach($subjects as $subject){ ?>

                        <li <?php echo $sub_id==$subject['Subject']['id'] ? "class='active'" : "class=''";?>><h4><?php echo $subject['Subject']['name']; ?></h4></li>|
                    <?php } ?>
                </ul>

                <fieldset>
                    <div class="form-group">
                        <label>Passage</label>
                        <?php   echo  $this->Froala->editor('textarea#QuestionPassage', array('imageUploadURL' => $this->webroot."app/editor_image_upload/",'imageUploadMethod'=>'POST','imageUploadParam'=>'image_param','height'=>'200px','remove'=>$this->webroot."app/delete_editor_image"));	?>
                        <?php echo $this->Form->textarea('passage', array('class' => 'form-control','style'=>'visibility: hidden !important;display:block !important;','value'=>$this->Session->read('QuestionPssage'),'required')); ?>
                    </div><!-- .form-group -->

                <div class="passage-question" id="passage-question">
                    <div class="form-group">
                        <?php echo $this->Form->hidden('test_id', array('class' => 'form-control','value'=>$test_id)); ?>
                        <?php echo $this->Form->hidden('sub_id', array('class' => 'form-control','value'=>$sub_id)); ?>
                        <?php echo $this->Form->hidden('Q_no', array('class' => 'form-control','value'=>$Q_no)); ?>
                    </div><!-- .form-group -->
                    <div class="form-group col-xs-offset-1">
                        <label>Question</label>
                        <?php   echo  $this->Froala->editor('textarea#QuestionDescription', array('imageUploadURL' => $this->webroot."app/editor_image_upload/",'imageUploadMethod'=>'POST','imageUploadParam'=>'image_param','width'=>'900px','height'=>'200px','remove'=>$this->webroot."app/delete_editor_image"));	?>
                        <?php echo $this->Form->textarea('description', array('class' => 'form-control','style'=>'visibility: hidden !important;display:block !important;','required')); ?>
                    </div><!-- .form-group -->
                    <div class="form-group add_clone">
                        <div id="01" class="phone col-xs-offset-1">Option :
                            <?php echo  $this->Froala->editor('textarea#QuestionOptionValue', array('imageUploadURL' => $this->webroot."app/editor_image_upload/",'imageUploadMethod'=>'POST','imageUploadParam'=>'image_param','height'=>'150px','width'=>'500px','remove'=>$this->webroot."app/delete_editor_image"));	?>
                            <?php echo $this->Form->input('option.', array('class' => 'chkbox','label'=>false,'type'=>'checkbox','onclick'=>'add_attr(this);','hiddenField'=>false)); ?>
                            <?php echo $this->Form->textarea('optionValue.', array('name' => 'data[QuestionOption][][value]','style'=>'visibility: hidden !important;display:block !important;','required','label'=>false)); ?>
                        </div>
                    </div>
                    <p><a href="javascript:void(0);" id="addScnt" class="copy12" rel=".phone1">Add Options</a></p>


                    <div class="form-group">
                        <?php echo $this->Form->input('status', array('class' => 'form-control','options'=>$status_array)); ?>
                    </div><!-- .form-group -->
</div>
                    <?php echo $this->Form->submit('Next', array('class' => 'btn btn-large btn-primary')); ?>

                </fieldset>



            </div><!-- /.form -->

        </div><!-- /#page-content .col-sm-9 -->
        <?php echo $this->Form->end(); ?>
    </div><!-- /#page-container .row-fluid -->
</div><!-- /#page-container .row-fluid -->
<style>
    #QuestionDescription,#QuestionOptionValue{display: block !important;}
</style>
<script>
    jQuery("#QuestionAdminAddQuestionsTotestForm").validate({errorElement: "span"});
    jQuery("#QuestionType").change(function(){
        if(jQuery(this).val()=='passage')
        {
            window.location=App.basePath+"admin/tests/addQuestionsTotest/<?php echo $test_id."/".$Q_no."/passage"; ?>";
        }else{
            window.location=App.basePath+"admin/tests/addQuestionsTotest/<?php echo $test_id."/".$Q_no.""; ?>";
        }
    });
</script>
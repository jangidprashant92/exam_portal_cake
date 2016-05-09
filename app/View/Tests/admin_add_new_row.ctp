<?php if($edit == 0){?>
<div id="0<?php echo $i; ?>" class="phone col-xs-offset-1">Option :
    <?php echo  $this->Froala->editor('textarea#optionValue'.$i, array('imageUploadURL' => $this->webroot."app/editor_image_upload/",'imageUploadMethod'=>'POST','imageUploadParam'=>'image_param','height'=>'150px','width'=>'500px','remove'=>$this->webroot."app/delete_editor_image"));	?>
    <?php echo $this->Form->input('option.', array('class' => 'chkbox','label'=>false,'type'=>'checkbox','onclick'=>'add_attr(this);','hiddenField'=>false)); ?>
    <?php echo $this->Form->textarea('optionValue.', array('class' => '','name' => 'data[QuestionOption][][value]','required','label'=>false,'id'=>'optionValue'.$i)); ?>
    <a class="remove" href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove() }); return false">remove</a>
</div>
<?php } else{ ?>
    <div id="0<?php echo $i; ?>" class="phone col-xs-offset-1">Option :
        <?php echo  $this->Froala->editor('textarea#optionValue'.$i, array('imageUploadURL' => $this->webroot."app/editor_image_upload/",'imageUploadMethod'=>'POST','imageUploadParam'=>'image_param','height'=>'150px','width'=>'500px','remove'=>$this->webroot."app/delete_editor_image"));	?>
        <?php echo $this->Form->input('option.', array('class' => 'chkbox','label'=>false,'type'=>'checkbox','onclick'=>'add_attr(this);','hiddenField'=>false)); ?>
        <?php echo $this->Form->textarea('optionValue.', array('class' => '','name'=>'data[QuestionOption]['.$i.'][value]','required','label'=>false,'id'=>'optionValue'.$i)); ?>
        <a class="remove" href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove() }); return false">remove</a>
    </div>
<?php } ?>

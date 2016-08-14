<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */


$url = Yii::app()->theme->baseUrl; 
?>
<!-- Main Content -->
      <section class="main-content col-lg-9 col-md-9 col-sm-9">
<?php $this->renderPartial('/products/left');?> 
        <div class="row">
		
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>
          <div class="col-lg-12 col-md-12 col-sm-12 register-account">

            <div class="carousel-heading no-margin">
              <h4><?php echo $nav;?></h4>
            </div>

            <div class="page-content">
			<div class="row">
				<p class="note">Fields with <span class="required">*</span> are required.</p>
			<div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <p><?php echo $form->labelEx($model,'photo'); ?></p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
					<?php echo $form->fileField($model,'photo'); ?>
					<?php echo $form->error($model,'photo'); ?>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <p><?php echo $form->labelEx($model,'question_id'); ?></p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
					<?php echo $form->dropDownList($model,'question_id',Question::getQuestion(),array('empty'=>'select')); ?>
					<?php echo $form->error($model,'question_id'); ?>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <p><?php echo $form->labelEx($model,'answer'); ?></p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
					<?php echo $form->textField($model,'answer'); ?>
					<?php echo $form->error($model,'answer'); ?>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <p><?php echo $form->labelEx($model,'contact_no'); ?></p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
					<?php echo $form->textField($model,'contact_no',array('size'=>20,'maxlength'=>20)); ?>
					<?php echo $form->error($model,'contact_no'); ?>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <p><?php echo $form->labelEx($model,'address'); ?></p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
					<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
					<?php echo $form->error($model,'address'); ?>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <p><?php echo $form->labelEx($model,'post_code'); ?></p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
					<?php echo $form->textField($model,'post_code'); ?>
					<?php echo $form->error($model,'post_code'); ?>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <p><?php echo $form->labelEx($model,'password'); ?></p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
					<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>200)); ?>
					<?php echo $form->error($model,'password'); ?>
                </div>
              </div>			  
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <p><?php echo $form->labelEx($model,'business_name'); ?></p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
					<?php echo $form->textField($model,'business_name',array('size'=>60,'maxlength'=>200)); ?>
					<?php echo $form->error($model,'business_name'); ?>
                </div>
              </div>			  
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <p><?php echo $form->labelEx($model,'solution'); ?></p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
					<?php echo $form->textField($model,'solution',array('size'=>60,'maxlength'=>200)); ?>
					<?php echo $form->error($model,'solution'); ?>
                </div>
              </div>			  
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <p><?php echo $form->labelEx($model,'company'); ?></p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
					<?php echo $form->textField($model,'company',array('size'=>60,'maxlength'=>200)); ?>
					<?php echo $form->error($model,'company'); ?>
                </div>
              </div>
			  
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12" style="text-align:right">
                 <?php echo CHtml::submitButton('Submit',array('class'=>'button')); ?>
                </div>

              </div>
            </div>

          </div>
<?php $this->endWidget(); ?>
        </div>


      </section>
<!-- /Main Content -->
<script>
	$('#Users_photo').change(function()
    {
		var fileUpload = $(this)[0];
 
        //Check whether the file is valid Image.
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif|.jpeg)$");
        if (regex.test(fileUpload.value.toLowerCase())) {
            //Check whether HTML5 is supported.
            if (typeof (fileUpload.files) != "undefined") {
                //Initiate the FileReader object.
                var reader = new FileReader();
                //Read the contents of Image File.
                reader.readAsDataURL(fileUpload.files[0]);
                reader.onload = function (e) {
                    //Initiate the JavaScript Image object.
                    var image = new Image();
                    //Set the Base64 string return from FileReader as source.
                    image.src = e.target.result;
                    image.onload = function () {
                        //Determine the Height and Width.
                        var height = this.height;
                        var width = this.width;
                        if (height == 300 || width == 750 ) {
							//$('#projects-form').submit();
                            //alert("Height and Width must not exceed 100px."+height+'X'+width);
                            return true;
                        }
                        alert("Height and Width must be 300 X 750.");
                        return false;
                    };
                }
            } else {
                alert("This browser does not support HTML5.");
                return false;
            }
        } else {
            alert("Please select a valid Image file.");
            return false;
        }
	});
</script>
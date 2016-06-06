<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */


$url = Yii::app()->theme->baseUrl; 
?>
<script src="<?php echo Yii::app()->baseUrl;?>/themes/back/vendors/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/bootstrap.min.css" media="screen"/>
<style>
.grid-view {
    padding: 15px 0;
    width: 98%;
}
</style>
  <div id="container">
   <?php $this->renderPartial('/products/left');?>
    <!--Middle Part Start-->
    <div id="content">
      <!--Featured Product Part Start-->
      <div class="box">
	  <div class="box-heading"><?php echo $nav;?></div>
       <?php //$this->renderPartial('/products/menu');?>
        <div class="box-content">
          <div class="box-product"> 



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<!--
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'user_type'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'user_type',array(''=>'select','1'=>'Customer','2'=>'Dealer')); ?>
		<?php echo $form->error($model,'user_type'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'first_name'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'first_name'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'last_name'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'last_name'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'full_name'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'full_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'full_name'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'email'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div>
	</div>

		<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'area_id'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'area_id',Area::getArea(),array('empty'=>'select')); ?>
		<?php echo $form->error($model,'area_id'); ?>
		</div>
	</div>

		<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'status'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'status',Products::getStatus()); ?>
		<?php echo $form->error($model,'status'); ?>
		</div>
	</div>


	-->


	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'photo'); ?>
		</label>
		<div class="controls">
		<?php echo $form->fileField($model,'photo'); ?>
		<?php echo $form->error($model,'photo'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'question_id'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'question_id',Question::getQuestion(),array('empty'=>'select')); ?>
		<?php echo $form->error($model,'question_id'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'answer'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'answer'); ?>
		<?php echo $form->error($model,'answer'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'contact_no'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'contact_no',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'contact_no'); ?>
		</div>
	</div>
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'address'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'address'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'post_code'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'post_code'); ?>
		<?php echo $form->error($model,'post_code'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'password'); ?>
		</label>
		<div class="controls">
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'password'); ?>
		</div>
	</div>

	




	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'business_name'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'business_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'business_name'); ?>
		</div>
	</div>

	<!--<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'business_type'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'business_type'); ?>
		<?php echo $form->error($model,'business_type'); ?>
		</div>
	</div>-->

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'solution'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'solution',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'solution'); ?>
		</div>
	</div>





	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'company'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'company',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'company'); ?>
		</div>
	</div>














	<div class="row buttons">
		<div class="controls">
		<?php echo CHtml::submitButton('Submit',array('class'=>'button')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>





</div>
        </div>
      </div>
      <!--Featured Product Part End-->
    </div>
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>
  </div>
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
<!--
<script src="<?php echo Yii::app()->baseUrl;?>/themes/back/vendors/jquery-1.9.1.min.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/themes/back/vendors/tinymce/js/tinymce/tinymce.min.js">
</script>
<script>
  tinymce.init({
    selector: ".tinymce_full",
     plugins: [
      "advlist autolink lists link image charmap preview hr anchor pagebreak",
      "searchreplace visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "template paste textcolor"
    ],
  
    toolbar1: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image preview media | forecolor backcolor ",
  });
</script>-->
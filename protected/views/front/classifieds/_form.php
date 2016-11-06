
 <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'classifieds-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
)); ?>

 <!-- Main Content -->
<section class="main-content col-lg-12 col-md-12 col-sm-12  col-xs-12">
	
	<div class="row">
		
		<div class="col-lg-12 col-md-12 col-sm-12  col-xs-12 register-account">
			
			<div class="page-content">
				<div class="row">                                	
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<p><strong>Fields with * are required.</strong></p>
					</div>                                    
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<p><?php echo $form->labelEx($model,'classified_id'); ?></p>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<?php echo $form->dropDownList($model,'classified_id',Classifiedtype::getTypes(),array('empty'=>'-- select --')); ?>
						<?php echo $form->error($model,'classified_id'); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<p><?php echo $form->labelEx($model,'title'); ?></p>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>200)); ?>
						<?php echo $form->error($model,'title'); ?>
					</div>
				</div>								
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<p><?php echo $form->labelEx($model,'description'); ?></p>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<?php echo $form->textArea($model,'description',array('size'=>60,'maxlength'=>200)); ?>
						<?php echo $form->error($model,'description'); ?>
					</div>	
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<p><?php echo $form->labelEx($model,'from_date'); ?></p>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
							<?php //$model->from_date = date("d-m-Y",strtotime($model->from_date )); ?>
							<?php echo $form->textField($model,'from_date',array('size'=>60,'maxlength'=>200,'class'=>'datepicker_disable_past')); ?>
							
							<?php echo $form->error($model,'from_date'); ?>
					</div>
				</div>	
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<?php echo $form->labelEx($model,'to_date'); ?>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<?php echo $form->textField($model,'to_date',array('size'=>60,'maxlength'=>200,'class'=>'datepicker_disable_past')); ?>
						
						<?php echo $form->error($model,'to_date'); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<p><?php echo $form->labelEx($model,'image'); ?></p>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<?php echo $form->fileField($model,'image'); ?>
						<?php echo $form->error($model,'image'); ?>
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:right">
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
					</div>
				</div>
			</div>
		</div>	
	</div>	
		
	
</section>
<!-- /Main Content -->
<?php $this->endWidget(); ?>

<script>
	$('#Classifieds_image').change(function()
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
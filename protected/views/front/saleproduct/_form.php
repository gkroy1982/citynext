<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'products-form',
	'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>


	<!-- Main Content -->
<section class="main-content col-lg-12 col-md-12 col-sm-12  col-xs-12 content">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12  col-xs-12 register-account">
			
			<div class="page-content">
				<div class="row">                                	
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<p><strong>Fields with <span class="required">*</span> are required.</strong></p>
						<p class="note" style="color:red;">This product will be visible only for one month.</p>
					</div>                                    
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<p><?php echo $form->labelEx($model,'main_category_id'); ?></p>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<?php echo $form->dropDownList($model,'main_category_id',MainCategoryUsed::getMainCategory(),

							array(
								'empty'=>'Select ',
								'ajax' => array(
									'type'=>'POST',
									'url'=>CController::createUrl('site/subcategory'),
									'data'=> array('pid'=>'js:this.value'),
									'update'=>"#Product_sub_category_id",
									)
								));?>
						
						<?php echo $form->error($model,'main_category_id'); ?>
					</div>
				</div>
				<!--div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<p><?php echo $form->labelEx($model,'sub_category_id'); ?></p>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<?php echo $form->dropDownList($model,'sub_category_id',SubCategory::getSubCategory(),array('empty'=>'select')); ?>

						<?php echo $form->error($model,'sub_category_id'); ?>
					</div>
				</div-->								
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<p><?php echo $form->labelEx($model,'product'); ?></p>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<?php echo $form->textField($model,'product',array('size'=>60,'maxlength'=>200)); ?>
						<?php echo $form->error($model,'product'); ?>
					</div>	
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<p><?php echo $form->labelEx($model,'price'); ?></p>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<?php echo $form->textField($model,'price',array('size'=>60,'maxlength'=>200)); ?>
						<?php echo $form->error($model,'price'); ?>
					</div>
				</div>	
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<p><?php echo $form->labelEx($model,'quantity'); ?></p>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<?php echo $form->textField($model,'quantity',array('size'=>60,'maxlength'=>200)); ?>
						<?php echo $form->error($model,'quantity'); ?>
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
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<p><?php echo $form->labelEx($model,'image2'); ?></p>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<?php echo $form->fileField($model,'image2'); ?>
						<?php echo $form->error($model,'image2'); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<p><?php echo $form->labelEx($model,'image3'); ?></p>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<?php echo $form->fileField($model,'image3'); ?>
						<?php echo $form->error($model,'image3'); ?>
					</div>	
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<p><?php echo $form->labelEx($model,'description'); ?></p>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<?php echo $form->textArea($model,'description',array( 'class'=>'tinymce_full', 'rows'=>6, 'cols'=>50)); ?>
						<?php echo $form->error($model,'description'); ?>
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
	$('#Product_image').change(function()
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
	$('#Product_image2').change(function()
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
	
	$('#Product_image3').change(function()
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

<?php

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'ads-form',
	'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>
<!-- Main Content -->
<section class="main-content col-lg-12 col-md-12 col-sm-12  col-xs-12">
	
	<div class="row">
		
		<div class="col-lg-12 col-md-12 col-sm-12  col-xs-12 register-account">
			<div class="page-content">
				<h4> Packages </h4>
				<table class="table">
				  <thead>
					<tr>
					  <th>Slide Type</th>
					  <th>Days</th>
					  <th>Price(in INR)</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php
	
					if(!empty($price_model)){
						foreach($price_model as $price_model_row){
							if(!empty($price_model_row)){
					?>
					<tr>
						<td>
							<?php 
							if($price_model_row->slide_type==0)
								echo "Big Home Page Slider"; 
							else if($price_model_row->slide_type==1)
								echo "Small Home Page Slider"; 
							?>
						</td>
						<td><?php echo $price_model_row->days.' Days'; ?></td>
						<td><?php echo 'Rs '.$price_model_row->amount; ?></td>
					  </tr>
				<?php }}
					} ?>
				  </tbody>
				</table>
			

					<div class="row">                                	
						<div class="col-lg-12 col-md-12 col-sm-12">
							<p><strong>Fields with * are required.</strong></p>
							<p style="color:red;"><?php echo $err; ?></p>
						</div>                                    
					</div>	
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<p><?php echo $form->labelEx($model,'show_in'); ?></p>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8">
							<?php echo $form->dropDownList($model,'show_in',array('0'=>'Big Slider on main page','1'=>'Small Slider on main page')); ?>
							<?php echo $form->error($model,'show_in'); ?>
						</div>
					</div>		
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<p><?php echo $form->labelEx($model,'image'); ?></p>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8">
							<?php echo $form->fileField($model,'image',array('size'=>60,'maxlength'=>200)); ?>
							<?php echo $form->error($model,'image'); ?>
						</div>
					</div>					
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<p><?php echo $form->labelEx($model,'description'); ?></p>
						</div>
						<div class=" col-lg-8 col-md-8 col-sm-8 ">
							<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
							<?php echo $form->error($model,'description'); ?>
						</div>	
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4">
						  <p><?php echo $form->labelEx($model,'url'); ?></p>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8">
						 <?php echo $form->textField($model,'url'); ?>
							<?php echo $form->error($model,'url'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4">
						  <p><?php echo $form->labelEx($model,'start_date'); ?></p>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8">
						 <?php echo $form->textField($model,'start_date',array('class'=>'datepicker')); ?>
						<?php echo $form->error($model,'start_date'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4">
						  <p><?php echo $form->labelEx($model,'validity_days'); ?></p>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8">
						 <?php 
		
							// $homePageSlidePriceSetting=CHtml::listData(HomePageSlidePriceSetting::model()->findAll(array('condition'=>"status='Active'","order"=>"days")),'id',function($price_setting) { return $price_setting->days . ' Days'; });		
							echo $form->dropDownList($model,'home_page_slide_price_setting_id',$homePageSlidePriceSetting,array('empty'=>'select')); 		
							// echo $form->dropDownList($model,'home_page_slide_price_setting_id','',array('empty'=>'select'));
							?>	
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4">
						  <p><?php echo CHtml::label('Enter no of days you want to display your slider in home page','start_date'); ?>
							<span class="required">*</span></p>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8">
							<?php echo $form->textField($model,'validity_days',array('placeholder'=>'Enter no of days to check availability')); ?>
							<?php echo $form->error($model,'validity_days'); ?>
							<?php echo CHtml::Button('Check Availabilty',array('class'=>'btn btn-primary check_availability')); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12" style="text-align:right">
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
	$('#Ads_image').change(function()
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
                        if (height == 300 || width == 920 ) {
							//$('#projects-form').submit();
                            //alert("Height and Width must not exceed 100px."+height+'X'+width);
                            return true;
                        }
                        alert("Height and Width must be 300 X 920.");
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
	
	
	$('#Ads_show_in').change(function(){
		// alert('in');
		var show_in=$('#Ads_show_in').val();
			
		  $.ajax({
			  type: "POST",
			  url: "<?php echo Yii::app()->createUrl('ads/getsliderpackage');?>",
			  data: {'show_in':show_in},
			  success: function(response){
				  // alert(response);
				  if(response=='err'){
					alert('No Area available.');exit;
				  }
				$('#Ads_home_page_slide_price_setting_id').html(response);
			  }
		  });
	});
	
	$('.check_availability').click(function()
    {
		var start_date = $('#Ads_start_date').val();
		var validity_days = $('#Ads_validity_days').val();
		var show_in = $('#Ads_show_in').val();
		
		if(start_date==''){
			alert('Select start date');
			$('#Ads_start_date').focus();
			return false;
		}
		if(validity_days==''){
			alert('Select validity days');
			$('#Ads_validity_days').focus();
			return false;
		}		
		
		  $.ajax({
			  type: "POST",
			  url: "<?php echo Yii::app()->createUrl('ads/adsavailability');?>",
			  data: {'start_date':start_date,'validity_days':validity_days,'show_in':show_in},
			  success: function(response){
				  // alert(response);
				  if(response!=='')
					$('.slider_availability').replaceWith(response);
			  }
		  });
	});
	
	$('#btn_create').click(function(e) {
		getNonAvailableCount();
	});
	function getNonAvailableCount(){
		var start_date = $('#Ads_start_date').val();
		var validity_days = $('#Ads_validity_days').val();
		var show_in = $('#Ads_show_in').val();
		
		if(start_date=='') {
			alert('Select start date');
			$('#Ads_start_date').focus();
			return false;
		}
		if(validity_days=='') {
			alert('Select validity days');
			$('#Ads_validity_days').focus();
			return false;
		}
		$.ajax({
			  type: "POST",
			  url: "<?php echo Yii::app()->createUrl('ads/countnonadsavailability');?>",
			  data: {'start_date':start_date,'validity_days':validity_days,'show_in':show_in},
			  async:false,
			  success: function(data){
				$('#count_response').val(data);
			}
		});
	}
</script>


<?php
/* @var $this ProductOffersController */
/* @var $model ProductOffers */
/* @var $form CActiveForm */
?>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-offers-form',
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
					  <th>Days</th>
					  <th>Price(In INR)</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php
					if(!empty($price_model)){
						foreach($price_model as $price_model_row){
					?>
					<tr>
					  <td><?php echo $price_model_row->days.' Days'; ?></td>
					  <td><?php echo 'Rs '.$price_model_row->amount; ?></td>
					</tr>
				<?php }
					} ?>
				  </tbody>
				</table>
			

					<div class="row">                                	
						<div class="col-lg-12 col-md-12 col-sm-12">
							<p><strong>Fields with * are required.</strong></p>
						</div>                                    
					</div>	
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<p><?php echo $form->labelEx($model,'product_id'); ?></p>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8">
							<?php 

							$products=CHtml::listData(Products::model()->findAll(array('condition'=>'status="active" and user_id='.Yii::app()->user->getState('uid'), "order"=>"product")),'pid', 'product');
							 ?>
							
							<?php echo $form->dropDownList($model,'product_id',$products,array('empty'=>'select')); ?>
							
							<?php echo $form->error($model,'product_id'); ?>
						</div>
					</div>		
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<p><?php echo $form->labelEx($model,'offer_id'); ?></p>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8">
							<?php echo $form->dropDownList($model,'offer_id',Offer::getOffer(),array('empty'=>'select')); ?>
							<?php echo $form->error($model,'offer_id'); ?>
						</div>
					</div>					
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<p><?php echo 'Amount'; ?></p>
						</div>
						<div class="offer_amt col-lg-8 col-md-8 col-sm-8 ">
							
						</div>	
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4">
						  <p><?php echo $form->labelEx($model,'description'); ?></p>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8">
						  <?php echo $form->textArea($model,'description',array('class'=>'tinymce_full','rows'=>6, 'cols'=>50)); ?>
							<?php echo $form->error($model,'description'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4">
						  <p><?php echo $form->labelEx($model,'start_date'); ?></p>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8">
						  <?php 
							if(!empty($model->start_date))
								$model->start_date=date('d-m-Y',strtotime($model->start_date));
							
							echo $form->textField($model,'start_date',array('class'=>'datepicker')); ?>
							<?php echo $form->error($model,'start_date'); ?>
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

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.7.1.min.js"></script>
<script>
 $(document).ready(function(){

	offer_price();
	$('#ProductOffers_offer_id').change(function(){
		offer_price();
	});
	
	$('#ProductOffers_product_id').change(function(){
		displayProductImage();
	});
	
	function offer_price(){
		  var offer_id = $('#ProductOffers_offer_id').val();
		  $.ajax({
			  type: "POST",
			  url: "<?php echo Yii::app()->createUrl('productOffers/Getprice');?>",
			  data: {'offer_id':offer_id},
			  success: function( response ) {
				  if(response!=='')
					$('.offer_amt').html('Rs. <b>' + response + '</b>');
			  }
		  });
	}
	
	function displayProductImage(){
		  var product_id = $('#ProductOffers_product_id').val();
		  $.ajax({
			  type: "POST",
			  url: "<?php echo Yii::app()->createUrl('productOffers/getproductimage');?>",
			  data: {'product_id':product_id},
			  success: function( response ) {
				  if(response=='no_image')
					  alert('No image found of seleceted product');
				  else
					$('#product_image').html(response);
			  }
		  });
	}	
});
</script>
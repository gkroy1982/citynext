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


<p>Packages</p>            
  <table class="table table-hover"  style="width:40%;">
	<thead>
	  <tr>
		<th>Days</th>
		<th>Price(in INR)</th>
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


	<p class="note">Fields with <span class="required">*</span> are required.</p>


	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'product_id'); ?>
		</label>
		<div class="controls">
		<?php 

		$products=CHtml::listData(Products::model()->findAll(array('condition'=>'status="active" and user_id='.Yii::app()->user->getState('uid'), "order"=>"product")),'pid', 'product');
		 ?>
		
		<?php echo $form->dropDownList($model,'product_id',$products,array('empty'=>'select')); ?>
		<br>
		<span id="product_image"></span>
		<?php echo $form->error($model,'product_id'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'offer_id'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'offer_id',Offer::getOffer(),array('empty'=>'select')); ?>
		<?php echo $form->error($model,'offer_id'); ?>
		</div>
	</div>
	
	<div class="row">
		<label class="control-label">
		<?php echo 'Amount'; ?>
		</label>
		<div class="controls offer_amt"></div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'description'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textArea($model,'description',array('class'=>'tinymce_full','rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'start_date'); ?>
		</label>
		<div class="controls">
		
		<?php 
		if(!empty($model->start_date))
			$model->start_date=date('d-m-Y',strtotime($model->start_date));
		
		echo $form->textField($model,'start_date',array('class'=>'datepicker')); ?>
		<?php echo $form->error($model,'start_date'); ?>
		</div>
	</div>


	<div class="row buttons">
		<div class="controls">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
		</div>
	</div>

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
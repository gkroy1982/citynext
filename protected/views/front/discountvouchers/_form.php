
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'discountvouchers-form',
	'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
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
						<?php echo $form->labelEx($model,'total'); ?>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<?php echo $form->textField($model,'total'); ?>
						<?php echo $form->error($model,'total'); ?>
						<?php 
							if(!empty($price_model)){
								echo '<strong>'.$price_model->voucher_unit.' Discount Voucher Cost Rs. '.$price_model->voucher_unit_rate.'.</strong>';
							}
						?>
						<input type="hidden" name="voucher_unit" id="voucher_unit" value="<?php echo $price_model->voucher_unit; ?>">
						<input type="hidden" name="voucher_unit_rate" id="voucher_unit_rate" value="<?php echo $price_model->voucher_unit_rate; ?>">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<?php echo 'Amount'; ?>
					</div>
					<div class="lbl_amount col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<?php echo $form->hiddenField($model,'amount',array('type'=>"hidden")); ?>
					</div>
				</div>								
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<?php echo $form->labelEx($model,'description'); ?>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<?php echo $form->textField($model,'description'); ?>
						<?php echo $form->error($model,'description'); ?>
					</div>	
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<?php echo $form->labelEx($model,'from_date'); ?>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<?php echo $form->textField($model,'from_date',array('class'=>'datepicker_disable_past')); ?>
						<?php echo $form->error($model,'from_date'); ?>
					</div>
				</div>	
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<?php echo $form->labelEx($model,'to_date'); ?>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<?php echo $form->textField($model,'to_date',array('class'=>'datepicker_disable_past')); ?>
						<?php echo $form->error($model,'to_date'); ?>
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
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.7.1.min.js"></script>
<script>
 $(document).ready(function(){

 voucher_price();
	$('#Discountvouchers_total').change(function(){
		voucher_price();
	});
	function voucher_price(){
		var voucher_val = $('#Discountvouchers_total').val();
		var voucher_unit = $('#voucher_unit').val();
		var voucher_unit_rate = $('#voucher_unit_rate').val();

		if(voucher_val!="" && voucher_unit!="")
			var total_amt=Math.round((voucher_val/voucher_unit)*voucher_unit_rate);
		 
		 if(total_amt){
			$('.lbl_amount').html('Rs. <b>'+total_amt+'</b>');
			$('#Discountvouchers_amount').val(total_amt);
			 
		 }
	}
});
</script>
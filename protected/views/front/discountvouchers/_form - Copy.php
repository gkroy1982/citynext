
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'discountvouchers-form',
	'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>


	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'total'); ?>
		</label>
		<div class="controls">
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
		<label class="control-label"><?php echo 'Amount'; ?></label>
		<div class="controls lbl_amount" ></div>
		<?php echo $form->hiddenField($model,'amount',array('type'=>"hidden")); ?>
		
	</div>
	
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'description'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
		</div>
	</div>
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'from_date'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'from_date',array('class'=>'datepicker')); ?>
		<?php echo $form->error($model,'from_date'); ?>
		</div>
	</div>
	
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'to_date'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'to_date',array('class'=>'datepicker')); ?>
		<?php echo $form->error($model,'to_date'); ?>
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
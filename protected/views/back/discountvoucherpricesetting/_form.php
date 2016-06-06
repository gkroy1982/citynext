<?php
/* @var $this DiscountvoucherpricesettingController */
/* @var $model DiscountVoucherPriceSetting */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'discount-voucher-price-setting-form',
	'htmlOptions'=>array('class'=>'form-horizontal'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<label class="control-label">
			<?php echo $form->labelEx($model,'voucher_unit'); ?>
		</label>
		<div class="controls">
			<?php echo $form->textField($model,'voucher_unit'); ?>
			<?php echo $form->error($model,'voucher_unit'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
			<?php echo $form->labelEx($model,'voucher_unit_rate'); ?>
		</label>
		<div class="controls">
			<?php echo $form->textField($model,'voucher_unit_rate'); ?>
			<?php echo $form->error($model,'voucher_unit_rate'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
			<?php echo $form->labelEx($model,'status'); ?>
		</label>
		<div class="controls">
			<?php echo $form->dropDownList($model,'status',array('Inactive'=>'Inactive','Active'=>'Active')); ?>
			<?php echo $form->error($model,'status'); ?>
		</div>
	</div>

	<div class="row buttons">
		<div class="controls">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
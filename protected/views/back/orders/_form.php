<?php
/* @var $this OrdersController */
/* @var $model Orders */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'orders-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'order_no'); ?>
		<?php echo $form->textField($model,'order_no',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'order_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_types_id'); ?>
		<?php echo $form->textField($model,'service_types_id'); ?>
		<?php echo $form->error($model,'service_types_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_ids'); ?>
		<?php echo $form->textField($model,'item_ids',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'item_ids'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_rates'); ?>
		<?php echo $form->textField($model,'item_rates',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'item_rates'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_amount'); ?>
		<?php echo $form->textField($model,'total_amount'); ?>
		<?php echo $form->error($model,'total_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ordered_by'); ?>
		<?php echo $form->textField($model,'ordered_by'); ?>
		<?php echo $form->error($model,'ordered_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ordered_date'); ?>
		<?php echo $form->textField($model,'ordered_date'); ?>
		<?php echo $form->error($model,'ordered_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_status'); ?>
		<?php echo $form->textField($model,'payment_status',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'payment_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invoice_pdf'); ?>
		<?php echo $form->textField($model,'invoice_pdf',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'invoice_pdf'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receipt_pdf'); ?>
		<?php echo $form->textField($model,'receipt_pdf',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'receipt_pdf'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
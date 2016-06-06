<?php
/* @var $this OrdersController */
/* @var $model Orders */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<!--div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div-->

	<div class="row">
		<?php echo $form->label($model,'order_no'); ?>
		<?php echo $form->textField($model,'order_no',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'service_types_id'); ?>
		<?php //echo $form->textField($model,'service_types_id'); ?>
		<?php echo $form->dropDownList($model,'service_types_id',ServiceTypes::getServiceTypes(),array('empty'=>'Select')); ?>
	</div>

	<!--div class="row">
		<?php echo $form->label($model,'item_ids'); ?>
		<?php echo $form->textField($model,'item_ids',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'item_rates'); ?>
		<?php echo $form->textField($model,'item_rates',array('size'=>60,'maxlength'=>250)); ?>
	</div-->

	<div class="row">
		<?php echo $form->label($model,'total_amount'); ?>
		<?php echo $form->textField($model,'total_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ordered_by'); ?>
		<?php //echo $form->textField($model,'ordered_by'); ?>
		<?php echo $form->dropDownList($model,'ordered_by',Users::getUsers(),array('empty'=>'All')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ordered_date'); ?>
		<?php echo $form->textField($model,'ordered_date',array('placeholder'=>'YYYY-MM-DD')); ?>
	</div>

	<!--div class="row">
		<?php echo $form->label($model,'payment_status'); ?>
		<?php echo $form->textField($model,'payment_status',array('size'=>1,'maxlength'=>1)); ?>
	</div-->

	<!--div class="row">
		<?php echo $form->label($model,'invoice_pdf'); ?>
		<?php echo $form->textField($model,'invoice_pdf',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'receipt_pdf'); ?>
		<?php echo $form->textField($model,'receipt_pdf',array('size'=>60,'maxlength'=>255)); ?>
	</div-->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
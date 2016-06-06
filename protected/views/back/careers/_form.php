<?php
/* @var $this CareersController */
/* @var $model Careers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'careers-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'job_profile'); ?>
		<?php echo $form->textField($model,'job_profile',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'job_profile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'key_responsibility'); ?>
		<?php echo $form->textArea($model,'key_responsibility',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'key_responsibility'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'qualification'); ?>
		<?php echo $form->textField($model,'qualification',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'qualification'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_of_vacancy'); ?>
		<?php echo $form->textField($model,'no_of_vacancy'); ?>
		<?php echo $form->error($model,'no_of_vacancy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'experience'); ?>
		<?php echo $form->textField($model,'experience',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'experience'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
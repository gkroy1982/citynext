<?php
/* @var $this ClassifiedsController */
/* @var $model Classifieds */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'classifieds-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>
	
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'status'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'status',Products::getStatus()); ?>
		<?php echo $form->error($model,'status'); ?>
		</div>
	</div>
<!--
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'classified_id'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'classified_id'); ?>
		<?php echo $form->error($model,'classified_id'); ?>
	</div>
	</div>
	

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'user_id'); ?>
		</label>
		<div class="controls">
		
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'title'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
		</div>
	</div>


	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'image'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>
	</div>-->
	
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'description'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
		</div>
	</div>
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'from_date'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'from_date'); ?>
		<?php echo $form->error($model,'from_date'); ?>
	</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'to_date'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'to_date'); ?>
		<?php echo $form->error($model,'to_date'); ?>
	</div>
	</div>

	<!--<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'created_on'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'created_on'); ?>
		<?php echo $form->error($model,'created_on'); ?>
	</div>
	</div>-->

	

	<div class="row buttons">
		<div class="controls">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>
	</div>

<?php $this->endWidget(); ?>


	</div><!-- form -->
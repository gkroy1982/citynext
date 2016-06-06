<?php
/* @var $this DiscountvouchersController */
/* @var $model Discountvouchers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'discountvouchers-form',
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
		<?php echo $form->labelEx($model,'vender_id'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'vender_id',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'vender_id'); ?>
		</div>
	</div>
	
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'code'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'code',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'code'); ?>
		</div>
	</div>


	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'from_date'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'from_date',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'from_date'); ?>
		</div>
	</div>
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'to_date'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'to_date',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'to_date'); ?>
		</div>
	</div>

	
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'status'); ?>
		</label>
		<div class="controls">
		
		<?php echo $form->dropDownList($model,'status',Products::getStatus()); ?>
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
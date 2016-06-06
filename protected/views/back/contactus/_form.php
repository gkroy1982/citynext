<?php
/* @var $this ContactusController */
/* @var $model Contactus */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contactus-form',
	'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'name'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'phone_no'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'phone_no',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'phone_no'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'email'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'enquiry'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textArea($model,'enquiry',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'enquiry'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'read'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'read',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'read'); ?>
		</div>
	</div>



	<div class="row buttons">
		<div class="controls">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
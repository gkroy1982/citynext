<?php
/* @var $this CardController */
/* @var $model Card */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'card-form',
	'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'users_id'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'users_id'); ?>
		<?php echo $form->error($model,'users_id'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'product_id'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'product_id'); ?>
		<?php echo $form->error($model,'product_id'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'quantity'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'quantity'); ?>
		<?php echo $form->error($model,'quantity'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'unit_price'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'unit_price',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'unit_price'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'offer'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'offer',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'offer'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'created_on'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'created_on'); ?>
		<?php echo $form->error($model,'created_on'); ?>
		</div>
	</div>

	<div class="row buttons">
		<div class="controls">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
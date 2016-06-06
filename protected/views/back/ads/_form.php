<?php
/* @var $this AdsController */
/* @var $model Ads */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ads-form',
	'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'user_id'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'user_id',Users::getUsers(),array('empty'=>'select')); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'show_in'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'show_in',array('0'=>'Big Slider on main page','1'=>'Small Slider on main page')); ?>
		<?php echo $form->error($model,'show_in'); ?>
		</div>
	</div>
	
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'image'); ?>
		</label>
		<div class="controls">
		<?php echo $form->fileField($model,'image',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'image'); ?>
		</div>
	</div>

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
		<?php echo $form->labelEx($model,'validity_days'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'validity_days'); ?>
		<?php echo $form->error($model,'validity_days'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'start_date'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'start_date'); ?>
		<?php echo $form->error($model,'start_date'); ?>
		</div>
	</div>
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'status'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'status',Products::getStatus(),array('empty'=>'select')); ?>
		<?php echo $form->error($model,'status'); ?>
		</div>		
	</div>
	
	<!--div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'amount'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
		</div>		
	</div-->
	
	
	
	<div class="row buttons">
		<div class="controls">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
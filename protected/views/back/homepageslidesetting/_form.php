<?php
/* @var $this HomepageslidesettingController */
/* @var $model HomePageSlideSetting */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'home-page-slide-setting-form',
	'htmlOptions'=>array('class'=>'form-horizontal'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
			
	<div class="row">
		<label class="control-label">
			<?php echo $form->labelEx($model,'f_slide_limit'); ?>
			</label>
		<div class="controls">
			<?php echo $form->textField($model,'f_slide_limit'); ?>
			<?php echo $form->error($model,'f_slide_limit'); ?>
		</div>
	</div>
	
	<div class="row">
		<label class="control-label">
			<?php echo $form->labelEx($model,'s_slide_limit'); ?>
			</label>
		<div class="controls">
			<?php echo $form->textField($model,'s_slide_limit'); ?>
			<?php echo $form->error($model,'s_slide_limit'); ?>
		</div>
	</div>

	<div class="row buttons">
		<div class="controls">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
		</div>		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
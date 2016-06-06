<?php
/* @var $this HomepageslidepricesettingController */
/* @var $model HomePageSlidePriceSetting */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'home-page-slide-price-setting-form',
	'htmlOptions'=>array('class'=>'form-horizontal'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	
	<div class="row">
		<label class="control-label">
			<?php echo $form->labelEx($model,'slide_type'); ?>
		</label>
		<div class="controls">
			<?php echo $form->dropDownList($model,'slide_type',array('0'=>'Big Home Page Slider','1'=>'Small Home Page Slider')); ?>
			
			<?php echo $form->error($model,'slide_type'); ?>
		</div>
	</div>
	
	<div class="row">
		<label class="control-label">
			<?php echo $form->labelEx($model,'days'); ?>
		</label>
		<div class="controls">
			<?php echo $form->textField($model,'days'); ?>
			<?php echo $form->error($model,'days'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
			<?php echo $form->labelEx($model,'amount'); ?>
		</label>
		<div class="controls">
			<?php echo $form->textField($model,'amount',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'amount'); ?>
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
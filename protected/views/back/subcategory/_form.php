<?php
/* @var $this SubCategoryController */
/* @var $model SubCategory */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sub-category-form',
	'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'main_category_id'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'main_category_id',MainCategory::getMainCategory(),array('empty'=>'select')); ?>
		<?php echo $form->error($model,'main_category_id'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'sub_category'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'sub_category',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'sub_category'); ?>
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
		<?php echo $form->labelEx($model,'icon'); ?>
		</label>
		<div class="controls">
		<?php echo $form->fileField($model,'icon',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'icon'); ?>
		</div>
	</div>

	<div class="row buttons">
		<div class="controls">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
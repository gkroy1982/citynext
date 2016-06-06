<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>



	<div class="row">
		<?php echo $form->label($model,'sub_category_id'); ?>
		<?php echo $form->dropDownList($model,'sub_category_id',SubCategory::getSubCategory(),array('empty'=>'select')); ?>
		
	</div>

	<div class="row">
		<?php echo $form->label($model,'version_id'); ?>
		<?php echo $form->dropDownList($model,'version_id',Version::getVersion(),array('empty'=>'select')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product'); ?>
		<?php echo $form->textField($model,'product'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
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
		<?php echo $form->label($model,'main_category_id'); ?>
		<?php echo $form->dropDownList($model,'main_category_id',MainCategoryUsed::getMainCategory(),array('empty'=>'All')); ?>
		
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
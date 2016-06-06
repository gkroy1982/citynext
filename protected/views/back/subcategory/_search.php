<?php
/* @var $this SubCategoryController */
/* @var $model SubCategory */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>



	<div class="row">
		<?php echo $form->label($model,'main_category_id'); ?>

		<?php echo $form->dropDownList($model,'main_category_id',MainCategory::getMainCategory(),array('empty'=>'All')); ?>
		
	</div>

	<div class="row">
		<?php echo $form->label($model,'sub_category'); ?>
		<?php echo $form->textField($model,'sub_category',array('size'=>60,'maxlength'=>200)); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
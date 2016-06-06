<?php
/* @var $this HomepageslidepricesettingController */
/* @var $model HomePageSlidePriceSetting */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

 
				
				
	<div class="row">
		<?php echo $form->label($model,'slide_type'); ?>
		
		<?php echo $form->dropDownList($model,'slide_type',array('0'=>'Big Home Page Slider','1'=>'Small Home Page Slider')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'days'); ?>
		<?php echo $form->textField($model,'days'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',array('Inactive'=>'Inactive','Active'=>'Active')); ?>
	</div>

 
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
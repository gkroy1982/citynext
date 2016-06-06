<?php
/* @var $this ProductOffersController */
/* @var $model ProductOffers */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>



	<div class="row">
		<?php echo $form->label($model,'offer_id'); ?>
		<?php echo $form->dropDownList($model,'offer_id',Offer::getOffer(),array('empty'=>'All')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->dropDownList($model,'user_id',Users::getUsers(),array('empty'=>'All')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_id'); ?>
		<?php echo $form->dropDownList($model,'product_id',Products::getProducts(),array('empty'=>'All')); ?>
	</div>



	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',Products::getStatus(),array('empty'=>'All')); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
<?php
/* @var $this ProductOffersController */
/* @var $model ProductOffers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-offers-form',
	'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'offer_id'); ?>
		</label>
		<div class="controls">
		
		<?php echo $form->dropDownList($model,'offer_id',Offer::getOffer(),array('empty'=>'select')); ?>
		<?php echo $form->error($model,'offer_id'); ?>
		</div>
	</div>

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
		<?php echo $form->labelEx($model,'product_id'); ?>
		</label>
		<div class="controls">
	
		<?php echo $form->dropDownList($model,'product_id',Products::getProducts(),array('empty'=>'select')); ?>
		<?php echo $form->error($model,'product_id'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'description'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50, "class"=>"tinymce_full")); ?>
		<?php echo $form->error($model,'description'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'start_date'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'start_date',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'start_date'); ?>
		</div>
	</div>
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'end_date'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'end_date',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'end_date'); ?>
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



	<div class="row buttons">
		<div class="controls">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sms-form',
	'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	

	<div class="row">
		<label class="control-label">
			Send SMS To All Customer
		</label>		
		<label class="control-label">
			Send SMS To All Vendor
		</label>
	</div>
	
	<div class="row">
		<label class="control-label">
			Enter 10 digit mobile numbers with comma(,) separated
		</label>
		<div class="controls">
		<?php echo CHtml::textArea('mobile_nos',array('rows'=>6, 'cols'=>80)); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
			Enter message
			<span class="required">*</span>
		</label>
		<div class="controls">
		<?php echo CHtml::textArea('sms_content',array('rows'=>6, 'cols'=>80)); ?>
		
		</div>
	</div>

	<div class="row buttons">
		<div class="controls">
		<?php echo CHtml::submitButton('Send',array('class'=>'btn btn-primary')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
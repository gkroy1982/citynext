<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	

	<div class="row">
		<?php echo $form->labelEx($model,'firstName',array("class"=>"control-label"));	?>
		<div class="controls">
			<?php echo $form->textField($model,'firstName'); ?>
			<?php echo $form->error($model,'firstName'); ?>
		</div>
	</div>
	

		
	<div class="row">
		<?php echo $form->labelEx($model,'email',array("class"=>"control-label"));	?>
		<div class="controls">
			<?php echo $form->textField($model,'email'); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
	</div>
		

		
	<div class="row">
		<?php echo $form->labelEx($model,'lastName',array("class"=>"control-label"));	?>
		<div class="controls">
			<?php echo $form->textField($model,'lastName'); ?>
			<?php echo $form->error($model,'lastName'); ?>
		</div>
	</div>
	
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'username',array("class"=>"control-label"));	?>
		<div class="controls">
			<?php echo $form->textField($model,'username'); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>
	</div>	-->
		
		
		
	<div class="row">
		<?php echo $form->labelEx($model,'mobile_no',array("class"=>"control-label"));	?>
		<div class="controls">
			<?php echo $form->textField($model,'mobile_no',array("maxlength"=>10)); ?>
			<?php echo $form->error($model,'mobile_no'); ?>
		</div>
	</div>
		
	<div class="row">
		<?php echo $form->labelEx($model,'city',array("class"=>"control-label"));	?>
		<div class="controls">
			<?php echo $form->textField($model,'city'); ?>
			<?php echo $form->error($model,'city'); ?>
		</div>
	</div>
		
	<div class="row">
		<?php echo $form->labelEx($model,'address',array("class"=>"control-label"));	?>
		<div class="controls">
			<?php echo $form->textArea($model,'address'); ?>
			<?php echo $form->error($model,'address'); ?>
		</div>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'photo',array("class"=>"control-label"));	?>
		<div class="controls">
			<?php echo $form->fileField($model,'photo'); ?>
			<?php echo $form->error($model,'photo'); ?>
		</div>
	</div>

	<div class="row buttons">
		<div class="controls">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
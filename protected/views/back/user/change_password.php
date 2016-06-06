<?php
/* @var $this User InformationController */
/* @var $model User Information */
/* @var $form CActiveForm */

$this->menu=array(
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->userId)),
);

$this->title="Change Password";
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'change-password-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
)); 

?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
<?php //echo $model->ui_password;	?>
	<div class="row">
		<label class="control-label"> 
			<?php echo $form->labelEx($model,'old_password'); ?>
		</label>
		<div class="controls">
			<?php echo $form->textField($model,'old_password',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'old_password'); ?>
		</div>
	</div>
	
	<div class="row">
		<label class="control-label"> 
			<?php echo $form->labelEx($model,'new_password'); ?>
		</label>
		<div class="controls">
			<?php echo $form->textField($model,'new_password',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'new_password'); ?>
		</div>
	</div>
	
	<div class="row">
		<label class="control-label"> 
			<?php echo $form->labelEx($model,'passwordCompare'); ?>		
		</label>
		<div class="controls">
			<?php echo CHtml::textField('User[passwordCompare]','', array('size'=>60,'maxlength'=>200)); ?>  
			<?php echo $form->error($model,'passwordCompare'); ?>
		</div>
	</div>

	<div class="controls">
		<?php echo CHtml::submitButton("Update",array("class"=>"btn btn-primary")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
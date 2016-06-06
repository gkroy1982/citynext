<?php 


	$form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array('validateOnSubmit'=>true),
			'htmlOptions'=>array("class"=>"form-signin"),
		)
	);
?>

<h3 style="text-align:center">ADMIN PANEL</h3>
<div class="alert alert-info">Please login with your Username and Password.</div>
<hr/>
<?php echo $form->textField($model,'username',array('class'=>'input-block-level','placeholder'=>'User Name')); ?>
<?php echo $form->error($model,'username'); ?>
							
<?php echo $form->passwordField($model,'password',array('class'=>'input-block-level', 'placeholder'=>'Password')); ?>
<?php echo $form->error($model,'password'); ?>

<label class="checkbox">
	<?php echo $form->checkBox($model,'rememberMe'); ?>
	<?php echo $form->error($model,'rememberMe'); ?>
	Remember me
</label>

<hr/>
<?php echo CHtml::submitButton('Sign in',array("class"=>"btn  btn-primary")); ?>



<?php $this->endWidget(); ?>
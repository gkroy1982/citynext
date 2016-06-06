<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'user_type'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'user_type',array(''=>'select','1'=>'Customer','2'=>'Dealer')); ?>
		<?php echo $form->error($model,'user_type'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'first_name'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'first_name'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'last_name'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'last_name'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'full_name'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'full_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'full_name'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'email'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'contact_no'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'contact_no',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'contact_no'); ?>
		</div>
	</div>

		<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'address'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'address'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'post_code'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'post_code'); ?>
		<?php echo $form->error($model,'post_code'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'password'); ?>
		</label>
		<div class="controls">
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'password'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'business_name'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'business_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'business_name'); ?>
		</div>
	</div>

	<!--<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'business_type'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'business_type'); ?>
		<?php echo $form->error($model,'business_type'); ?>
		</div>
	</div>-->

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'solution'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'solution',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'solution'); ?>
		</div>
	</div>





	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'company'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'company',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'company'); ?>
		</div>
	</div>


	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'area_id'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'area_id',Area::getArea(),array('empty'=>'select')); ?>
		<?php echo $form->error($model,'area_id'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'country'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'country',States::getStates(),
                     array(
                    'class'=>'large-field',
                    'empty'=>'Select ',
                    'ajax' => array(
                        'type'=>'POST',
                        'url'=>CController::createUrl('site/cities'),
                        'data'=> array('state_id'=>'js:$(this).val()'),
                        'update'=>"#Users_city",
                        ) )); ?>
		<?php echo $form->error($model,'country'); ?>
		</div>
	</div>


	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'city'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'city',City::getCity(),array('empty'=>'Select','class'=>'large-field')); ?>
		<?php echo $form->error($model,'city'); ?>
		</div>
	</div>





	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'status'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'status',Products::getStatus()); ?>
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
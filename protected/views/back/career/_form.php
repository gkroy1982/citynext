<?php
/* @var $this CareerController */
/* @var $model Career */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'career-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'name'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div>
	</div>

	<div class="row"><label class="control-label">
		<?php echo $form->labelEx($model,'b_date'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'b_date'); ?>
		<?php echo $form->error($model,'b_date'); ?>
	</div></div>

	<div class="row"><label class="control-label">
		<?php echo $form->labelEx($model,'address'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div></div>

	<div class="row"><label class="control-label">
		<?php echo $form->labelEx($model,'fax'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'fax',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'fax'); ?>
	</div></div>

	<div class="row"><label class="control-label">
		<?php echo $form->labelEx($model,'email'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div></div>

	<div class="row"><label class="control-label">
		<?php echo $form->labelEx($model,'quilification'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textArea($model,'quilification',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'quilification'); ?>
	</div></div>

	<div class="row"><label class="control-label">
		<?php echo $form->labelEx($model,'experience'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'experience'); ?>
		<?php echo $form->error($model,'experience'); ?>
	</div></div>

	<div class="row"><label class="control-label">
		<?php echo $form->labelEx($model,'last_org'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'last_org'); ?>
		<?php echo $form->error($model,'last_org'); ?>
	</div></div>

	<div class="row"><label class="control-label">
		<?php echo $form->labelEx($model,'current_position'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textArea($model,'current_position',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'current_position'); ?>
	</div></div>

	<div class="row"><label class="control-label">
		<?php echo $form->labelEx($model,'status'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'status',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div></div>

	<div class="row buttons">
		<div class="controls">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
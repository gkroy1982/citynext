<?php
/* @var $this CompanyadsController */
/* @var $model Companyads */
/* @var $form CActiveForm */
?>

<div class="form">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'companyads-form',
	'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'image',array("class"=>"control-label"));	?>
		<div class="controls">
			<?php echo $form->fileField($model,'image'); ?>
			<?php echo $form->error($model,'image'); ?>
		</div>
		<div class="controls">
		<?php 
			if(!empty($model->image))
				echo "<img src=".Yii::app()->baseUrl.'/upload/company_advertisement/'.$model->image. ">";  
		?>
		</div>
		
	</div>

	<div class="row buttons">
		<div class="controls">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
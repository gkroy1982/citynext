
<!-- search-form -->

 <div class="page-content">
 
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4">
			<p><?php echo $form->label($model,'product'); ?></p>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8">
			<?php echo $form->textField($model,'product'); ?>
		</div>	
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12" style="text-align:right">
			<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-primary')); ?>
		</div>
	</div>
	
<?php $this->endWidget(); ?>


</div>
                            
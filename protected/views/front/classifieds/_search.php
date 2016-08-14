<!-- search-form -->

 <div class="page-content">
 
 <?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4">
			<p><?php echo $form->label($model,'id'); ?>
		</p>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8">
			<?php echo $form->textField($model,'id'); ?>
		</div>	
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4">
			<p><?php echo $form->label($model,'classified_id'); ?>
		</p>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8">
			<?php echo $form->textField($model,'classified_id'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4">
			<p><?php echo $form->label($model,'user_id'); ?>
		</p>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8">
			<?php echo $form->textField($model,'user_id'); ?>
		</div>	
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4">
			<p><?php echo $form->label($model,'title'); ?>
		</p>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8">
			<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		</div>	
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4">
			<p><?php echo $form->label($model,'description'); ?>
		</p>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8">
			<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		</div>	
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4">
			<p><?php echo $form->label($model,'image'); ?>
		</p>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8">
			<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>200)); ?>
		</div>	
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4">
			<p><?php echo $form->label($model,'from_date'); ?>
		</p>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8">
			<?php echo $form->textField($model,'from_date'); ?>
		</div>	
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4">
			<p><?php echo $form->label($model,'to_date'); ?>
		</p>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8">
			<?php echo $form->textField($model,'to_date'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4">
			<p><?php echo $form->label($model,'created_on'); ?>
		</p>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8">
			<?php echo $form->textField($model,'created_on'); ?>
		</div>	
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4">
			<p><?php echo $form->label($model,'status'); ?>
		</p>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8">
			<?php echo $form->textField($model,'status',array('size'=>60,'maxlength'=>100)); ?>
		</div>	
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12" style="text-align:right">
			<?php echo CHtml::submitButton('Search'); ?>
		</div>
	</div>
	
<?php $this->endWidget(); ?>


</div>
                            
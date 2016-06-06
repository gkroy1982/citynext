<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>

<div class="wide form" style="display:inline;">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


<br><br>

	<table width="99%">
	<tr>
		<!--<th>
	
		<?php echo $form->label($model,'sub_category_id'); ?>
		</th>
		<td>
		<?php echo $form->dropDownList($model,'sub_category_id',SubCategory::getSubCategory(),array('empty'=>'select')); ?>
		<td>-->
	
		
		<th>
		<?php echo $form->label($model,'product'); ?>
		</th>
		<td>
		<?php echo $form->textField($model,'product'); ?>
	<td>
	</tr>
	</table>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
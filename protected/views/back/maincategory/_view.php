<?php
/* @var $this MainCategoryController */
/* @var $data MainCategory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('mcid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->mcid), array('view', 'id'=>$data->mcid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>
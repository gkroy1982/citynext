<?php
/* @var $this SubCategoryController */
/* @var $data SubCategory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('scid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->scid), array('view', 'id'=>$data->scid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('main_category_id')); ?>:</b>
	<?php echo CHtml::encode($data->main_category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_category')); ?>:</b>
	<?php echo CHtml::encode($data->sub_category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>
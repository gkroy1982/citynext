<?php
/* @var $this VersionController */
/* @var $data Version */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('vid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->vid), array('view', 'id'=>$data->vid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('version')); ?>:</b>
	<?php echo CHtml::encode($data->version); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>
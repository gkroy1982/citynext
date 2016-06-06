<?php
/* @var $this DiscountvouchersController */
/* @var $data Discountvouchers */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vender_id')); ?>:</b>
	<?php echo CHtml::encode($data->vender_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_date')); ?>:</b>
	<?php echo CHtml::encode($data->from_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_date')); ?>:</b>
	<?php echo CHtml::encode($data->to_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_on')); ?>:</b>
	<?php echo CHtml::encode($data->created_on); ?>
	<br />


</div>
<?php
/* @var $this OrdersController */
/* @var $data Orders */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_no')); ?>:</b>
	<?php echo CHtml::encode($data->order_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_types_id')); ?>:</b>
	<?php echo CHtml::encode($data->service_types_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_ids')); ?>:</b>
	<?php echo CHtml::encode($data->item_ids); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_rates')); ?>:</b>
	<?php echo CHtml::encode($data->item_rates); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_amount')); ?>:</b>
	<?php echo CHtml::encode($data->total_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ordered_by')); ?>:</b>
	<?php echo CHtml::encode($data->ordered_by); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ordered_date')); ?>:</b>
	<?php echo CHtml::encode($data->ordered_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_status')); ?>:</b>
	<?php echo CHtml::encode($data->payment_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoice_pdf')); ?>:</b>
	<?php echo CHtml::encode($data->invoice_pdf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receipt_pdf')); ?>:</b>
	<?php echo CHtml::encode($data->receipt_pdf); ?>
	<br />

	*/ ?>

</div>
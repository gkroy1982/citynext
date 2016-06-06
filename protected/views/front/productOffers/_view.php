<?php
/* @var $this ProductOffersController */
/* @var $data ProductOffers */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('poid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->poid), array('view', 'id'=>$data->poid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('offer_id')); ?>:</b>
	<?php echo CHtml::encode($data->offer_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_id')); ?>:</b>
	<?php echo CHtml::encode($data->product_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_on')); ?>:</b>
	<?php echo CHtml::encode($data->created_on); ?>
	<br />


</div>
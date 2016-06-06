<?php
/* @var $this StatesController */
/* @var $data States */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('sid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->sid), array('view', 'id'=>$data->sid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state_name')); ?>:</b>
	<?php echo CHtml::encode($data->state_name); ?>
	<br />


</div>
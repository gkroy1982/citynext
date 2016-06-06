<?php
/* @var $this CareersController */
/* @var $data Careers */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cid), array('view', 'id'=>$data->cid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('job_profile')); ?>:</b>
	<?php echo CHtml::encode($data->job_profile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('key_responsibility')); ?>:</b>
	<?php echo CHtml::encode($data->key_responsibility); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qualification')); ?>:</b>
	<?php echo CHtml::encode($data->qualification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_of_vacancy')); ?>:</b>
	<?php echo CHtml::encode($data->no_of_vacancy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('experience')); ?>:</b>
	<?php echo CHtml::encode($data->experience); ?>
	<br />


</div>
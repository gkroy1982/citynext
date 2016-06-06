<?php
/* @var $this MarqueeController */
/* @var $model Marquee */

$this->breadcrumbs=array(
	'Marquees'=>array('admin'),
	"View Marquee",
);

$this->menu=array(
	
	array('label'=>'Create Marquee', 'url'=>array('create')),
	array('label'=>'Update Marquee', 'url'=>array('update', 'id'=>$model->mid)),

	array('label'=>'Manage List', 'url'=>array('admin')),
);

$this->title="View Marquee";
?>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(

		'title',
		'link',
	),
)); ?>

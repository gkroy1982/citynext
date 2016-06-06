<?php
/* @var $this MarqueeController */
/* @var $model Marquee */

$this->breadcrumbs=array(
	'Marquees'=>array('admin'),
	$model->title=>array('view','id'=>$model->mid),
	'Update',
);

$this->menu=array(

	array('label'=>'Create Marquee', 'url'=>array('create')),
	array('label'=>'View Marquee', 'url'=>array('view', 'id'=>$model->mid)),
	array('label'=>'Manage List', 'url'=>array('admin')),
);

$this->title="Update Marquee";
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
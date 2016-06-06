<?php
/* @var $this MarqueeController */
/* @var $model Marquee */

$this->breadcrumbs=array(
	'Marquees'=>array('admin'),
	'Create',
);

$this->menu=array(

	array('label'=>'List Marquee', 'url'=>array('admin')),
);
$this->title="Create Marquee";
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this AdsController */
/* @var $model Ads */

$this->breadcrumbs=array(
	'Home Page Slider'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Home Page Sliders', 'url'=>array('admin')),
);
$this->title="Create Home Page Slider";
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
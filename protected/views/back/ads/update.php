<?php
/* @var $this AdsController */
/* @var $model Ads */

$this->breadcrumbs=array(
	'Home Page Slider'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Home Page Slider', 'url'=>array('create')),
	array('label'=>'View Home Page Slider', 'url'=>array('view', 'id'=>$model->aid)),
	array('label'=>'List Home Page Slider', 'url'=>array('admin')),
);
$this->title="Update Home Page Slider";
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
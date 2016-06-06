<?php
/* @var $this CityController */
/* @var $model City */

$this->breadcrumbs=array(
	'Cities'=>array('admin'),

	'Update',
);

$this->menu=array(

	array('label'=>'Create City', 'url'=>array('create')),
	array('label'=>'View City', 'url'=>array('view', 'id'=>$model->cid)),
	array('label'=>'List City', 'url'=>array('admin')),
);

$this->title="Update City";
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
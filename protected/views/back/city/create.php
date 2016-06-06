<?php
/* @var $this CityController */
/* @var $model City */

$this->breadcrumbs=array(
	'Cities'=>array('admin'),
	'Create',
);

$this->menu=array(

	array('label'=>'Manage City', 'url'=>array('admin')),
);
$this->title="Create City";
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
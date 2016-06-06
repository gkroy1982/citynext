<?php
/* @var $this CityupdateController */
/* @var $model Cityupdate */

$this->breadcrumbs=array(
	'City Updates'=>array('admin'),
	'Create',
);

$this->menu=array(
	
	array('label'=>'Manage City Update', 'url'=>array('admin')),
);
$this->title="Create City Updates";
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
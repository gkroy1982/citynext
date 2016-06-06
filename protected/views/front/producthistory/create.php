<?php
/* @var $this ProducthistoryController */
/* @var $model Producthistory */

$this->breadcrumbs=array(
	'Producthistories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Producthistory', 'url'=>array('index')),
	array('label'=>'Manage Producthistory', 'url'=>array('admin')),
);
?>

<h1>Create Producthistory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this StatesController */
/* @var $model States */

$this->breadcrumbs=array(
	'States'=>array('index'),
	$model->sid=>array('view','id'=>$model->sid),
	'Update',
);

$this->menu=array(
	array('label'=>'List States', 'url'=>array('index')),
	array('label'=>'Create States', 'url'=>array('create')),
	array('label'=>'View States', 'url'=>array('view', 'id'=>$model->sid)),
	array('label'=>'Manage States', 'url'=>array('admin')),
);
$this->title="Update States";
?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>
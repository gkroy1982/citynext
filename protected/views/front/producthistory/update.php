<?php
/* @var $this ProducthistoryController */
/* @var $model Producthistory */

$this->breadcrumbs=array(
	'Producthistories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Producthistory', 'url'=>array('index')),
	array('label'=>'Create Producthistory', 'url'=>array('create')),
	array('label'=>'View Producthistory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Producthistory', 'url'=>array('admin')),
);
?>

<h1>Update Producthistory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
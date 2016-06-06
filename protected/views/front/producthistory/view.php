<?php
/* @var $this ProducthistoryController */
/* @var $model Producthistory */

$this->breadcrumbs=array(
	'Producthistories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Producthistory', 'url'=>array('index')),
	array('label'=>'Create Producthistory', 'url'=>array('create')),
	array('label'=>'Update Producthistory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Producthistory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Producthistory', 'url'=>array('admin')),
);
?>

<h1>View Producthistory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'product_id',
		'user_id',
		'amount',
		'created_on',
	),
)); ?>

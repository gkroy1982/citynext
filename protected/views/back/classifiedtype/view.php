<?php
/* @var $this ClassifiedtypeController */
/* @var $model Classifiedtype */

$this->breadcrumbs=array(
	'Classifiedtypes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Classifiedtype', 'url'=>array('index')),
	array('label'=>'Create Classifiedtype', 'url'=>array('create')),
	array('label'=>'Update Classifiedtype', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Classifiedtype', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Classifiedtype', 'url'=>array('admin')),
);
?>

<h1>View Classifiedtype #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>

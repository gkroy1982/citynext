<?php
/* @var $this CityupdateController */
/* @var $model Cityupdate */

$this->breadcrumbs=array(
	'Cityupdates'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Cityupdate', 'url'=>array('index')),
	array('label'=>'Create Cityupdate', 'url'=>array('create')),
	array('label'=>'Update Cityupdate', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Cityupdate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cityupdate', 'url'=>array('admin')),
);
?>

<h1>View Cityupdate #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'title',
		'news',
		'image',
		'date',
		'created_on',
		'status',
	),
)); ?>

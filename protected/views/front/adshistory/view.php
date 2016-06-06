<?php
/* @var $this AdshistoryController */
/* @var $model Adshistory */

$this->breadcrumbs=array(
	'Adshistories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Adshistory', 'url'=>array('index')),
	array('label'=>'Create Adshistory', 'url'=>array('create')),
	array('label'=>'Update Adshistory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Adshistory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Adshistory', 'url'=>array('admin')),
);
?>

<h1>View Adshistory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'ads_id',
		'user_id',
		'amount',
		'created_on',
	),
)); ?>

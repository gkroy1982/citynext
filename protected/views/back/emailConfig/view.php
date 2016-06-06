<?php
/* @var $this EmailConfigController */
/* @var $model EmailConfig */

$this->breadcrumbs=array(
	'Email Configs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List EmailConfig', 'url'=>array('index')),
	array('label'=>'Create EmailConfig', 'url'=>array('create')),
	array('label'=>'Update EmailConfig', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EmailConfig', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmailConfig', 'url'=>array('admin')),
);
?>

<h1>View EmailConfig #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'template',
		'status',
	),
)); ?>

<?php
/* @var $this CondolencesController */
/* @var $model Condolences */

$this->breadcrumbs=array(
	'Condolences'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Condolences', 'url'=>array('index')),
	array('label'=>'Create Condolences', 'url'=>array('create')),
	array('label'=>'Update Condolences', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Condolences', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Condolences', 'url'=>array('admin')),
);
?>

<h1>View Condolences #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'image',
		array(
			'name'=>'date',
			'value'=>date("d-m-Y",strtotime($model->date)) ,
		),
		array(
			'name'=>'created_on',
			'value'=>date("d-m-Y H:i:s",strtotime($model->created_on)) ,
		),
		)
)); ?>

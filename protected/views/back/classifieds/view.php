<?php
/* @var $this ClassifiedsController */
/* @var $model Classifieds */

$this->breadcrumbs=array(
	'Classifieds'=>array('admin'),
	$model->title,
);

$this->menu=array(
	
	array('label'=>'Create Classified', 'url'=>array('create')),
	array('label'=>'Update Classified', 'url'=>array('update', 'id'=>$model->id)),	
	array('label'=>'List Classifieds', 'url'=>array('admin')),
);
$this->title="View Classified";
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'classified.name',
		'user.first_name',
		'title',
		'description',
		/*'image',*/
		'from_date',
		'to_date',
		'created_on',
		'status',
	),
)); ?>

<?php
/* @var $this ClassifiedtypeController */
/* @var $model Classifiedtype */

$this->breadcrumbs=array(
	'Classifiedtypes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Classifiedtype', 'url'=>array('index')),
	array('label'=>'Create Classifiedtype', 'url'=>array('create')),
	array('label'=>'View Classifiedtype', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Classifiedtype', 'url'=>array('admin')),
);
?>

<h1>Update Classifiedtype <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
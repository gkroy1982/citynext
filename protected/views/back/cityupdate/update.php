<?php
/* @var $this CityupdateController */
/* @var $model Cityupdate */

$this->breadcrumbs=array(
	'Cityupdates'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cityupdate', 'url'=>array('index')),
	array('label'=>'Create Cityupdate', 'url'=>array('create')),
	array('label'=>'View Cityupdate', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Cityupdate', 'url'=>array('admin')),
);
?>

<h1>Update Cityupdate <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
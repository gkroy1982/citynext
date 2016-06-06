<?php
/* @var $this AdshistoryController */
/* @var $model Adshistory */

$this->breadcrumbs=array(
	'Adshistories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Adshistory', 'url'=>array('index')),
	array('label'=>'Create Adshistory', 'url'=>array('create')),
	array('label'=>'View Adshistory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Adshistory', 'url'=>array('admin')),
);
?>

<h1>Update Adshistory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this VersionController */
/* @var $model Version */

$this->breadcrumbs=array(
	'Versions'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Version', 'url'=>array('create')),
	array('label'=>'View Version', 'url'=>array('view', 'id'=>$model->vid)),
	array('label'=>'List Version', 'url'=>array('admin')),
);
$this->title="Update Version";
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
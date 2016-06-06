<?php
/* @var $this VersionController */
/* @var $model Version */

$this->breadcrumbs=array(
	'Versions'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Version', 'url'=>array('admin')),
);
$this->title="Create Version";
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
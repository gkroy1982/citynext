<?php
/* @var $this AreaController */
/* @var $model Area */

$this->breadcrumbs=array(
	'Areas'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Area', 'url'=>array('admin')),
);
$this->title="Create Area";
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
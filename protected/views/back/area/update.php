<?php
/* @var $this AreaController */
/* @var $model Area */

$this->breadcrumbs=array(
	'Areas'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Area', 'url'=>array('create')),
	array('label'=>'View Area', 'url'=>array('view', 'id'=>$model->aid)),
	array('label'=>'List Area', 'url'=>array('admin')),
);
$this->title="Update Area";
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
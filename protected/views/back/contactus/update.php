<?php
/* @var $this ContactusController */
/* @var $model Contactus */

$this->breadcrumbs=array(
	'Enquery'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Enquery', 'url'=>array('create')),
	array('label'=>'View Enquery', 'url'=>array('view', 'id'=>$model->cuid)),
	array('label'=>'List Enquery', 'url'=>array('admin')),
);
$this->title="Update Enquery";
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this ClassifiedsController */
/* @var $model Classifieds */

$this->breadcrumbs=array(
	'Classifieds'=>array('admin'),	
	'Update',
);

$this->menu=array(
	
	array('label'=>'Create Classified', 'url'=>array('create')),
	array('label'=>'View Classified', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'List Classifieds', 'url'=>array('admin')),
);
$this->title="Update Classified";
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
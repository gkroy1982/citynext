<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'View Users', 'url'=>array('view', 'id'=>$model->uid)),
	array('label'=>'List Users', 'url'=>array('admin')),
);
$this->title="Update Users";
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('admin')),
);
$this->title="Create Users";
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
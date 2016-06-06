<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('admin')),
);
$this->title="Create User";
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
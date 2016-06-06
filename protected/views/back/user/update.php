<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'Change Password', 'url'=>array('change_password', 'id'=>$model->userId)),
);
$this->title="Update User";
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

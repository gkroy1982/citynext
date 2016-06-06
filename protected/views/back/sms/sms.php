<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'SMS'=>array('sendsms'),
	'Create',
);

 //$this->menu=array(array('label'=>'List Users', 'url'=>array('admin')),);

$this->title="Send SMS";
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
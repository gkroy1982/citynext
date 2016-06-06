<?php
/* @var $this ReservevouchersController */
/* @var $model Reservevouchers */

$this->breadcrumbs=array(
	'Reservevouchers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Reservevouchers', 'url'=>array('index')),
	array('label'=>'Manage Reservevouchers', 'url'=>array('admin')),
);
?>

<h1>Create Reservevouchers</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
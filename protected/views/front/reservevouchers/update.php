<?php
/* @var $this ReservevouchersController */
/* @var $model Reservevouchers */

$this->breadcrumbs=array(
	'Reservevouchers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Reservevouchers', 'url'=>array('index')),
	array('label'=>'Create Reservevouchers', 'url'=>array('create')),
	array('label'=>'View Reservevouchers', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Reservevouchers', 'url'=>array('admin')),
);
?>

<h1>Update Reservevouchers <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
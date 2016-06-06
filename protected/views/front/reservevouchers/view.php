<?php
/* @var $this ReservevouchersController */
/* @var $model Reservevouchers */

$this->breadcrumbs=array(
	'Reservevouchers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Reservevouchers', 'url'=>array('index')),
	array('label'=>'Create Reservevouchers', 'url'=>array('create')),
	array('label'=>'Update Reservevouchers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Reservevouchers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Reservevouchers', 'url'=>array('admin')),
);
?>

<h1>View Reservevouchers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'voucher_id',
		'status',
		'created_on',
	),
)); ?>

<?php
/* @var $this DiscountvouchersController */
/* @var $model Discountvouchers */

$this->breadcrumbs=array(
	'Discount vouchers'=>array('admin'),
	
);

$this->menu=array(
	//array('label'=>'List Discountvouchers', 'url'=>array('index')),
	array('label'=>'Create Discount voucher', 'url'=>array('create')),
	//array('label'=>'Update Discountvouchers', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Discountvouchers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'List Discount vouchers', 'url'=>array('admin')),
);

$this->title="View Discount vouchers";
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'vender.full_name',
		'code',
		'from_date',
		'to_date',
		'status',
		'created_on',
	),
)); ?>

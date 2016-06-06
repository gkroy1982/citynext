<?php
/* @var $this OrdersController */
/* @var $model Orders */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Orders', 'url'=>array('index')),
	// array('label'=>'Create Orders', 'url'=>array('create')),
	// array('label'=>'Update Orders', 'url'=>array('update', 'id'=>$model->id)),
	// array('label'=>'Delete Orders', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	// array('label'=>'Manage Orders', 'url'=>array('admin')),
);
$this->title='View Order';
?>
 
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'order_no',
		'service_types_id',
		'item_ids',
		'item_rates',
		'total_amount',
		'ordered_by',
		'ordered_date',
		'payment_status',
		// 'invoice_pdf',
		// 'receipt_pdf',
	),
)); ?>

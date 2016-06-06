<?php
/* @var $this OrdersController */
/* @var $model Orders */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'List',
);

// $this->menu=array(
	// array('label'=>'List Orders', 'url'=>array('index')),
	// array('label'=>'Create Orders', 'url'=>array('create')),
// );

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#orders-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->title="List Orders";
?>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'orders-grid',
	'dataProvider'=>$model->search(array('condition'=>"payment_status='1'")),
	'itemsCssClass'=>'table table-bordered',	
	// 'filter'=>$model,
	'columns'=>array(
		array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),
		'order_no',
		array(
			'header'=>'Service Type',
			'value'=>'$data->getServiceType($data->service_types_id)'
		),		
		array(
			'header'=>'Payment Status',
			'value'=>'$data->getPaymentStatus($data->payment_status)'
		),
		'total_amount',
		// 'item_ids',
		// 'item_rates',
		// 'payment_status',
		/*
		'ordered_by',
		'ordered_date',
		'invoice_pdf',
		'receipt_pdf',
		*/
			// array(
				// 'class'=>'CButtonColumn', 
			// ),
		array(  'class'=>'ButtonColumn',
			'template'=>'{view}',
		),
	
		
	),
)); ?>

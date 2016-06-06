<?php
/* @var $this DiscountvouchersController */
/* @var $model Discountvouchers */

$this->breadcrumbs=array(
	'Discountvouchers'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Discountvouchers', 'url'=>array('admin')),
	array('label'=>'Create Discountvouchers', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#discountvouchers-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->title="List Discount Vouchers";
?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'discountvouchers-grid',
	'dataProvider'=>$model->search(),
		'itemsCssClass'=>'table table-bordered',
	'enableSorting'=>false,
	
	'columns'=>array(
array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),
		
		'vender.full_name',
		'code',
		'from_date',
		'to_date',
			
		'status',
		/*
		'created_on',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

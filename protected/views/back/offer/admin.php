<?php
/* @var $this OfferController */
/* @var $model Offer */

$this->breadcrumbs=array(
	'Today\'s Offers Price Setting'=>array('admin'),
	'List',
);

$this->menu=array(
	array('label'=>'Create Today\'s Offers Price Setting', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#offer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->title="List Today's Offers Price Setting";
?>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'offer-grid',
	'dataProvider'=>$model->search( array( 'order'=>'status DESC ')),
	'itemsCssClass'=>'table table-bordered',
	'enableSorting'=>false,
	
	'columns'=>array(
array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),
		'days',
		'amount',
		
		'status',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

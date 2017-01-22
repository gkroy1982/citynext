<style>
.row-fluid .span9 {
    width: 78.359%;
}

</style>


<?php
/* @var $this ProductOffersController */
/* @var $model ProductOffers */

$this->breadcrumbs=array(
	'Today\'s Offers'=>array('admin'),
	'List',
);

$this->menu=array(
	array('label'=>'Create Today\'s Offers', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-offers-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->title="List Today's  Offers";
?>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-offers-grid',
	'dataProvider'=>$model->search( array( 'order'=>'status DESC,created_on DESC') ),
	'itemsCssClass'=>'table table-bordered',
	'enableSorting'=>false,
	
	'columns'=>array(
array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),
		// 'user.full_name',
		'user.business_name',
		'offer.days',
		'product.product',
		array(
			'header' => 'Image',
			'type'=>'html',
			'value' => '($data->product->image != "") ?CHtml::tag("img",array("src"=>Yii::app()->baseUrl."/upload/products/".$data->product->image,"width"=>"50",	))
			: "" '
		),
		'start_date',
		'end_date',		
		'status',

		/*'created_on','description',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

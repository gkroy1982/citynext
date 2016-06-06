<?php
/* @var $this HomepageslidepricesettingController */
/* @var $model HomePageSlidePriceSetting */

$this->breadcrumbs=array(
	'Home Page Slide Price Settings'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Home Page Slide Price Settings', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#home-page-slide-price-setting-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->title='Manage Home Page Slide Price Settings';
?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'home-page-slide-price-setting-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),
		// 'id',
		
		array(
			'header'=>'Slide Type',
			'value'=>function(){
				if($data->slide_type==0)
					return 'Big Home Page Slide';
				else if($data->slide_type==1)
					return 'Small Home Page Slide';
			}
		),
		'days',
		'amount',
		'status',
		// 'created_date',
		// 'updated_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php
/* @var $this MarqueeController */
/* @var $model Marquee */

$this->breadcrumbs=array(
	'Marquees'=>array('admin'),
	'List',
);

$this->menu=array(

	array('label'=>'Create Marquee', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#marquee-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->title="List Marquees";
?>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'marquee-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-bordered',
	'enableSorting'=>false,
	'columns'=>array(
		array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),
		array(
			'header' => 'Marquee',
			'type'=>'html',
			'value' => '($data->show_in == 1) ?"Second Marquee":"First Marquee"'
		),
		'title',
		'link',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

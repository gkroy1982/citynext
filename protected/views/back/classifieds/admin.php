<?php
/* @var $this ClassifiedsController */
/* @var $model Classifieds */

$this->breadcrumbs=array(
	'Classifieds'=>array('admin'),
	'Manage',
);

$this->menu=array(

	array('label'=>'Create Classifieds', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#classifieds-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->title="List Classifieds";
?>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'classifieds-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),
	
		'classified.name',
		'user.first_name',
		'title',
		/*'description',
		'image',
		
		'from_date',
		'to_date',
		'created_on',*/
		'status',
		
		array(
		'header'=>'Action',
			'class'=>'CButtonColumn',
		),
	),
)); ?>

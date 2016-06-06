<?php
/* @var $this CareersController */
/* @var $model Careers */

$this->breadcrumbs=array(
	'Careers'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Job', 'url'=>array('admin')),
	array('label'=>'Create Job', 'url'=>array('create')),
	array('label'=>'Candidate List', 'url'=>array('career/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#careers-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->title="List Job";
?>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'careers-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'itemsCssClass'=>'table table-bordered',
	'enableSorting'=>false,
	'columns'=>array(
		array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),

		
		'job_profile',
		//'key_responsibility',
		'qualification',
		'no_of_vacancy',
		//'experience',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

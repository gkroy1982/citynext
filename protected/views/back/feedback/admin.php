<?php
/* @var $this FeedbackController */
/* @var $model Feedback */

$this->breadcrumbs=array(
	'Feedbacks'=>array('admin'),
	'List',
);

$this->menu=array(
	array('label'=>'Create Feedback', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#feedback-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->title="List Feedbacks";
?>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'feedback-grid',
	'dataProvider'=>$model->search( array('order'=>'ctreated_on DESC') ),
	'itemsCssClass'=>'table table-bordered',
	'enableSorting'=>false,
	
	'columns'=>array(
array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),
		'name',
		'read',
		
		/*
		'email',
		'phone_no',
		'ctreated_on',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

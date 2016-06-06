<?php
/* @var $this CondolencesController */
/* @var $model Condolences */

$this->breadcrumbs=array(
	'Condolences'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Condolences', 'url'=>array('admin')),
	array('label'=>'Create Condolences', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#condolences-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->title="List Condolences";
?>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'condolences-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-bordered',
	'enableSorting'=>false,
	'columns'=>array(
		array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),
	
		'title',
		'description',
		//'image',
		// 'date',
		array(
			'name'=>'Date',
			'header'=>'Date',
			'value'=>'date("d-m-Y", strtotime($data->date))',
		),
		'status',
		//'created_on',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

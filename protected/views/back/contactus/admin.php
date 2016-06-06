<?php
/* @var $this ContactusController */
/* @var $model Contactus */

$this->breadcrumbs=array(
	'Enquery'=>array('admin'),
	'List',
);

$this->menu=array(
	array('label'=>'Create Enquery', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#contactus-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->title="List Enquery";
?>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'contactus-grid',
	'dataProvider'=>$model->search(array('order'=>'created_on DESC')),
	'itemsCssClass'=>'table table-bordered',
	'enableSorting'=>false,
	
	'columns'=>array(
array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),
		'name',
		
		'read',
		/*
		'phone_no',
		'email',
		'read',
		'created_on',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

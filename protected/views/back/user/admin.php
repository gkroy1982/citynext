<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'List',
);
$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->title="List User";
?>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array('model'=>$model)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(array( 'condition'=>'t.status="1"')),
	'itemsCssClass'=>'table table-bordered',
	'enableSorting'=>false,
	'columns'=>array(	
		array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),

		array(
			'name'=>'Name',
			'type'=>'raw',
			'value'=>'($data->firstName ." ".$data->lastName)',
		),
		'password',
		'email',
		'mobile_no',
		'city',
		
		array(
			'header'=>'Property List',
			'type'=>'raw',
			'value'=>'CHtml::link("Property List",
			Yii::app()->baseUrl."/backend.php/advt/admin?uid=".$data->userId)',
		),
		
		array(
			'header'=>'Action',
			'class'=>'CButtonColumn',
			'buttons'=>array( 'update'=> array('visible'=>'true',),),
		),
	),
)); ?>

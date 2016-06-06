<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Admin User List'=>array('adminuser'),
	'List',
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

$this->title="Admin User List";
?>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array('model'=>$model)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(array( 'condition'=>'t.status="0"')),
	'itemsCssClass'=>'table table-bordered',
	'enableSorting'=>false,
	'columns'=>array(	
		array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),

		array(
			'name'=>'Name',
			'type'=>'raw',
			'value'=>'($data->firstName ." ".$data->lastName)',
		),
		
		'username',
		'email',
		
		
	
		array(
			'header'=>'Action',
			'class'=>'CButtonColumn',
			'buttons'=>array( 'update'=> array('visible'=>'false',),),
		),
	),
)); ?>

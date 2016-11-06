<?php
/* @var $this CityupdateController */
/* @var $model Cityupdate */

$this->breadcrumbs=array(
	'City Updates'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create City Update', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cityupdate-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->title="City Updates";
?>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cityupdate-grid',
	'dataProvider'=>$model->search( array( 'order'=>'status DESC,created_on DESC')) ,
	'filter'=>$model,
	'columns'=>array(

		array(
			'header' => 'Image',
			'type'=>'html',
			'value' => '($data->image != "") ?CHtml::tag("img",array("src"=>Yii::app()->baseUrl."/upload/cityupdate/".$data->image,"width"=>"50",	))
			: "" '
		),
		// 'id',
		'title',
		array('header'=>'User','value'=>'$data->user->full_name'),
		//'news',
		// 'image',
		'date',
		/*
		'created_on', */
		'status',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

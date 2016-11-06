<?php
/* @var $this AdsController */
/* @var $model Ads */

$this->breadcrumbs=array(
	'Home Page Slider'=>array('admin'),
	'List',
);

$this->menu=array(
	array('label'=>'Create Home Page Slider', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ads-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->title="List Home Page Slider";
?>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ads-grid',
	'dataProvider'=>$model->search( array( 'order'=>'status DESC,created_on DESC')),
	'itemsCssClass'=>'table table-bordered',
	'enableSorting'=>false,
	
	'columns'=>array(
		array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),
		'user.full_name',
		array(
	            'header' => 'Ads Image ',
	            'type'=>'raw',
	            'value' => '($data->image != "") ?CHtml::tag("img",array("src"=>Yii::app()->baseUrl."/upload/ads/".$data->image,"width"=>"50px",	))			
				: "" '
	        ),
		array(
			'header' => 'Slider ',
			'type'=>'html',
			'value' => '($data->show_in == 1) ?"Second Slider":"First Slider"'
		),
		'validity_days',
		'start_date',
		'status',
		/*
		'description',
		'validity_days',
		'start_date',
		'created_on',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

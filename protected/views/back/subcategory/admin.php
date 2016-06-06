<?php
/* @var $this SubCategoryController */
/* @var $model SubCategory */

$this->breadcrumbs=array(
	'Sub Categories'=>array('admin'),
	'List',
);

$this->menu=array(
	array('label'=>'Create SubCategory', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sub-category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->title="List Sub Categories";
?>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sub-category-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-bordered',
	'enableSorting'=>false,
	
	'columns'=>array(
array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),
		'mainCategory.category',
		'sub_category',
		array(
            'header' => 'Icon',
            'type'=>'html',
            'value' => '($data->icon != "") ? CHtml::tag("img",array("src"=>Yii::app()->baseUrl."/upload/icons/".$data->icon,"width"=>"50",	))			
			: "---" '
        ),
		/*
		'description',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

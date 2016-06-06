<?php
/* @var $this SubCategoryController */
/* @var $model SubCategory */

$this->breadcrumbs=array(
	'Sub Categories'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'Create SubCategory', 'url'=>array('create')),
	array('label'=>'View SubCategory', 'url'=>array('view', 'id'=>$model->scid)),
	array('label'=>'List SubCategory', 'url'=>array('admin')),
);
$this->title="Update SubCategory";
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this SubCategoryController */
/* @var $model SubCategory */

$this->breadcrumbs=array(
	'Sub Categories'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SubCategory', 'url'=>array('admin')),
);
$this->title="Create SubCategory";
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
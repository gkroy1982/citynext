<?php
/* @var $this MainCategoryController */
/* @var $model MainCategory */

$this->breadcrumbs=array(
	'Main Categories'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MainCategory', 'url'=>array('admin')),
);
$this->title="Create MainCategory";
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
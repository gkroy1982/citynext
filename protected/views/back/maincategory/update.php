<?php
/* @var $this MainCategoryController */
/* @var $model MainCategory */

$this->breadcrumbs=array(
	'Main Categories'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'Create MainCategory', 'url'=>array('create')),
	array('label'=>'View MainCategory', 'url'=>array('view', 'id'=>$model->mcid)),
	array('label'=>'List MainCategory', 'url'=>array('admin')),
);
$this->title="Update MainCategory";
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
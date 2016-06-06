<?php
/* @var $this MainCategoryController */
/* @var $model MainCategory */

$this->breadcrumbs=array(
	'Used Product Category'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Used Product Category', 'url'=>array('admin')),
);
$this->title="Create Used Product Category";
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
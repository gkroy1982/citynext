<?php
/* @var $this MainCategoryController */
/* @var $model MainCategory */

$this->breadcrumbs=array(
	'Used Categories'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Used Category', 'url'=>array('create')),
	array('label'=>'View Used Category', 'url'=>array('view', 'id'=>$model->mcid)),
	array('label'=>'List Used Category', 'url'=>array('admin')),
);
$this->title="Update Used Category";
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
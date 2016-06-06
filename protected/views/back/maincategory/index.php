<?php
/* @var $this MainCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Main Categories',
);

$this->menu=array(
	array('label'=>'Create MainCategory', 'url'=>array('create')),
	array('label'=>'Manage MainCategory', 'url'=>array('admin')),
);
?>

<h1>Main Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

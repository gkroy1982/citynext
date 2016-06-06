<?php
/* @var $this ProductsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Condolences',
);

$this->menu=array(
	array('label'=>'Create Condolences', 'url'=>array('create')),
	array('label'=>'Manage Condolences', 'url'=>array('admin')),
);
?>

<h1>Condolences</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

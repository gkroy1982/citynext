<?php
/* @var $this DiscountvouchersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Discountvouchers',
);

$this->menu=array(
	array('label'=>'Create Discountvouchers', 'url'=>array('create')),
	array('label'=>'Manage Discountvouchers', 'url'=>array('admin')),
);
?>

<h1>Discountvouchers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

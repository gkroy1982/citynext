<?php
/* @var $this ReservevouchersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reservevouchers',
);

$this->menu=array(
	array('label'=>'Create Reservevouchers', 'url'=>array('create')),
	array('label'=>'Manage Reservevouchers', 'url'=>array('admin')),
);
?>

<h1>Reservevouchers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

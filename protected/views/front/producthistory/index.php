<?php
/* @var $this ProducthistoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Producthistories',
);

$this->menu=array(
	array('label'=>'Create Producthistory', 'url'=>array('create')),
	array('label'=>'Manage Producthistory', 'url'=>array('admin')),
);
?>

<h1>Producthistories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

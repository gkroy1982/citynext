<?php
/* @var $this AdshistoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Adshistories',
);

$this->menu=array(
	array('label'=>'Create Adshistory', 'url'=>array('create')),
	array('label'=>'Manage Adshistory', 'url'=>array('admin')),
);
?>

<h1>Adshistories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

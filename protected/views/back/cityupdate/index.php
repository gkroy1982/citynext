<?php
/* @var $this CityupdateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cityupdates',
);

$this->menu=array(
	array('label'=>'Create Cityupdate', 'url'=>array('create')),
	array('label'=>'Manage Cityupdate', 'url'=>array('admin')),
);
?>

<h1>Cityupdates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

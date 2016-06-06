<?php
/* @var $this ClassifiedtypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Classifiedtypes',
);

$this->menu=array(
	array('label'=>'Create Classifiedtype', 'url'=>array('create')),
	array('label'=>'Manage Classifiedtype', 'url'=>array('admin')),
);
?>

<h1>Classifiedtypes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

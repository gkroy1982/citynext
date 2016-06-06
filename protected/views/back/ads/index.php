<?php
/* @var $this AdsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Home Page Slider',
);

$this->menu=array(
	array('label'=>'Create Home Page Slider', 'url'=>array('create')),
	array('label'=>'Manage Home Page Slider', 'url'=>array('admin')),
);
?>

<h1>Home Page Slider</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

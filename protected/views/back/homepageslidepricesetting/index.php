<?php
/* @var $this HomepageslidepricesettingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Home Page Slide Price Settings',
);

$this->menu=array(
	array('label'=>'Create HomePageSlidePriceSetting', 'url'=>array('create')),
	array('label'=>'Manage HomePageSlidePriceSetting', 'url'=>array('admin')),
);
?>

<h1>Home Page Slide Price Settings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

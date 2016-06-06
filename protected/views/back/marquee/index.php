<?php
/* @var $this MarqueeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Marquees',
);

$this->menu=array(
	array('label'=>'Create Marquee', 'url'=>array('create')),
	array('label'=>'Manage Marquee', 'url'=>array('admin')),
);
?>

<h1>Marquees</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php
/* @var $this ClassifiedsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Classifieds',
);

$this->menu=array(
	array('label'=>'Create Classifieds', 'url'=>array('create')),
	array('label'=>'Manage Classifieds', 'url'=>array('admin')),
);
?>

<h1>Classifieds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

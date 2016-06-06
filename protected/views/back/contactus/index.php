<?php
/* @var $this ContactusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contactuses',
);

$this->menu=array(
	array('label'=>'Create Contactus', 'url'=>array('create')),
	array('label'=>'Manage Contactus', 'url'=>array('admin')),
);
?>

<h1>Contactuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

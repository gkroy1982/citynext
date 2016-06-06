<?php
/* @var $this EmailConfigController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Email Configs',
);

$this->menu=array(
	array('label'=>'Create EmailConfig', 'url'=>array('create')),
	array('label'=>'Manage EmailConfig', 'url'=>array('admin')),
);
?>

<h1>Email Configs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

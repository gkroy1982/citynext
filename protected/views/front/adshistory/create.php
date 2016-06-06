<?php
/* @var $this AdshistoryController */
/* @var $model Adshistory */

$this->breadcrumbs=array(
	'Adshistories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Adshistory', 'url'=>array('index')),
	array('label'=>'Manage Adshistory', 'url'=>array('admin')),
);
?>

<h1>Create Adshistory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
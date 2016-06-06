<?php
/* @var $this Home Page Slide Price SettingsController */
/* @var $model Home Page Slide Price Settings */

$this->breadcrumbs=array(
	'Home Page Slide Price Settings'=>array('index'),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Home Page Slide Price Settings', 'url'=>array('create')),
	array('label'=>'View Home Page Slide Price Settings', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Home Page Slide Price Settings', 'url'=>array('admin')),
);
$this->title='Update Home Page Slide Price Settings';
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
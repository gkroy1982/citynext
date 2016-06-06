<?php
/* @var $this ContactusController */
/* @var $model Contactus */

$this->breadcrumbs=array(
	'Enquery'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Enquery', 'url'=>array('admin')),
);
$this->title="Create Enquery";
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this CardController */
/* @var $model Card */

$this->breadcrumbs=array(
	'Cards'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Card', 'url'=>array('admin')),
);
$this->title="Create Card";
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this CardController */
/* @var $model Card */

$this->breadcrumbs=array(
	'Cards'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Card', 'url'=>array('create')),
	array('label'=>'View Card', 'url'=>array('view', 'id'=>$model->cid)),
	array('label'=>'List Card', 'url'=>array('admin')),
);
$this->title="Update Card";
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
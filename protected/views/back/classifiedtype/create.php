<?php
/* @var $this ClassifiedtypeController */
/* @var $model Classifiedtype */

$this->breadcrumbs=array(
	'Classified Category'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Classified Category', 'url'=>array('admin')),
);
$this->title="Create Classified Category";
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
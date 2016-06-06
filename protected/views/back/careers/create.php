<?php
/* @var $this CareersController */
/* @var $model Careers */

$this->breadcrumbs=array(
	'Careers'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Job', 'url'=>array('admin')),
	array('label'=>'Create Job', 'url'=>array('create')),
	array('label'=>'Candidate List', 'url'=>array('career/admin')),
);
$this->title="Create Job";
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
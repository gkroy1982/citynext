<?php
/* @var $this CareerController */
/* @var $model Career */

$this->breadcrumbs=array(
	'Careers'=>array('admin'),
	$model->name=>array('view','id'=>$model->cid),
	'Update',
);

$this->menu=array(
	
	array('label'=>'Create Job', 'url'=>array('careers/create')),
	array('label'=>'Job List', 'url'=>array('careers/admin')),
	array('label'=>'Candidate List', 'url'=>array('career/admin')),
);

$this->title="Update Career";
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
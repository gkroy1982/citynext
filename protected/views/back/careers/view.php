<?php
/* @var $this CareersController */
/* @var $model Careers */

$this->breadcrumbs=array(
	'Careers'=>array('index'),
	$model->cid,
);

$this->menu=array(
	array('label'=>'List Job', 'url'=>array('admin')),
	array('label'=>'Create Job', 'url'=>array('create')),
	array('label'=>'Candidate List', 'url'=>array('career/admin')),
);
?>

<h1>View Careers #<?php echo $model->cid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cid',
		'job_profile',
		'key_responsibility',
		'qualification',
		'no_of_vacancy',
		'experience',
	),
)); ?>

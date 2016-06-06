<?php
/* @var $this CareerController */
/* @var $model Career */

$this->breadcrumbs=array(
	'Careers'=>array('admin'),
	$model->name,
);

$this->menu=array(
	

	array('label'=>'Create Job', 'url'=>array('careers/create')),
	array('label'=>'Job List', 'url'=>array('careers/admin')),
	array('label'=>'Candidate List', 'url'=>array('career/admin')),
);

$this->title="view Career";
?>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(

		'name',
		'b_date',
		'address',
		'fax',
		'email',
		'quilification',
		'experience',
		'last_org',
		'current_position',
		
	),
)); ?>

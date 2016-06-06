<?php
/* @var $this FeedbackController */
/* @var $model Feedback */

$this->breadcrumbs=array(
	'Feedbacks'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Feedback', 'url'=>array('create')),
	array('label'=>'View Feedback', 'url'=>array('view', 'id'=>$model->fid)),
	array('label'=>'List Feedback', 'url'=>array('admin')),
);
$this->title="Update Feedback";
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this FeedbackController */
/* @var $model Feedback */

$this->breadcrumbs=array(
	'Feedbacks'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Feedback', 'url'=>array('admin')),
);
$this->title="Create Feedback";
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Questions'=>array('index'),
	$model->qid=>array('view','id'=>$model->qid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Question', 'url'=>array('index')),
	array('label'=>'Create Question', 'url'=>array('create')),
	array('label'=>'View Question', 'url'=>array('view', 'id'=>$model->qid)),
	array('label'=>'Manage Question', 'url'=>array('admin')),
);
$this->title="Update Question";
?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>
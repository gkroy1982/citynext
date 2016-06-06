<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs=array(
	'Questions'=>array('index'),
	$model->qid,
);

$this->menu=array(
	array('label'=>'List Question', 'url'=>array('index')),
	array('label'=>'Create Question', 'url'=>array('create')),
	array('label'=>'Update Question', 'url'=>array('update', 'id'=>$model->qid)),
	array('label'=>'Delete Question', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->qid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Question', 'url'=>array('admin')),
);
$this->title="View Question";
?>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'question',
	),
)); ?>

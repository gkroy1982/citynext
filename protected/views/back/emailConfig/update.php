<?php
/* @var $this EmailConfigController */
/* @var $model EmailConfig */

$this->breadcrumbs=array(
	'Email Configs'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EmailConfig', 'url'=>array('index')),
	array('label'=>'Create EmailConfig', 'url'=>array('create')),
	array('label'=>'View EmailConfig', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EmailConfig', 'url'=>array('admin')),
);
?>

<h1>Update EmailConfig <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
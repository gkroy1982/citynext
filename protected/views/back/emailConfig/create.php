<?php
/* @var $this EmailConfigController */
/* @var $model EmailConfig */

$this->breadcrumbs=array(
	'Email Configs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EmailConfig', 'url'=>array('index')),
	array('label'=>'Manage EmailConfig', 'url'=>array('admin')),
);
?>

<h1>Create EmailConfig</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
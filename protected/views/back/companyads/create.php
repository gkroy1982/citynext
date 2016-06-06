<?php
/* @var $this CompanyadsController */
/* @var $model Companyads */

$this->breadcrumbs=array(
	'Companyads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Companyads', 'url'=>array('index')),
	array('label'=>'Manage Companyads', 'url'=>array('admin')),
);
?>

<h1>Create Companyads</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
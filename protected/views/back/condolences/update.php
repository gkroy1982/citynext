<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Condolences'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Condolences', 'url'=>array('create')),
	array('label'=>'View Condolences', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'List Condolences', 'url'=>array('admin')),
);
$this->title="Update Condolences";
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>


<script src="<?php echo Yii::app()->theme->baseUrl;?>/vendors/jquery-1.9.1.min.js"></script>


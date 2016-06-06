<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Condolences'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Condolences', 'url'=>array('admin')),
);
$this->title="Create Condolences";
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>


<script src="<?php echo Yii::app()->theme->baseUrl;?>/vendors/jquery-1.9.1.min.js"></script>


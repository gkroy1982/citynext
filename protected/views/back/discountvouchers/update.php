
<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Discount vouchers'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'List Discount vouchers', 'url'=>array('admin')),
);
$this->title="Create Discount voucher";
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>


<script src="<?php echo Yii::app()->theme->baseUrl;?>/vendors/jquery-1.9.1.min.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/vendors/tinymce/js/tinymce/tinymce.min.js">
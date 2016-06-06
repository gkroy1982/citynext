<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Products', 'url'=>array('create')),
	array('label'=>'View Products', 'url'=>array('view', 'id'=>$model->pid)),
	array('label'=>'List Products', 'url'=>array('admin')),
);
$this->title="Update Products";
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>


<script src="<?php echo Yii::app()->theme->baseUrl;?>/vendors/jquery-1.9.1.min.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/vendors/tinymce/js/tinymce/tinymce.min.js">
</script>
<script>
	tinymce.init({
		selector: ".tinymce_full",
		 plugins: [
			"advlist autolink lists link image charmap preview hr anchor pagebreak",
			"searchreplace visualblocks visualchars code fullscreen",
			"insertdatetime media nonbreaking save table contextmenu directionality",
			"template paste textcolor"
		],
	
		toolbar1: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image preview media | forecolor backcolor ",
	});
</script>

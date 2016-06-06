<?php
/* @var $this ProductOffersController */
/* @var $model ProductOffers */

$this->breadcrumbs=array(
	'Today\'s Offers'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Today\'s Offers', 'url'=>array('create')),
	array('label'=>'View Today\'s Offers', 'url'=>array('view', 'id'=>$model->poid)),
	array('label'=>'List Today\'s Offers', 'url'=>array('admin')),
);
$this->title="Update Today's Offers";
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

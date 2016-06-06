<?php
/* @var $this AdsController */
/* @var $model Ads */

$this->breadcrumbs=array(
	'Home Page Slider'=>array('admin'),
	'View',
);

$this->menu=array(
	array('label'=>'Create Home Page Slider', 'url'=>array('create')),
	array('label'=>'Update Home Page Slider', 'url'=>array('update', 'id'=>$model->aid)),
	array('label'=>'List Home Page Slider', 'url'=>array('admin')),
);

?>

<?php  if(Yii::app()->user->hasFlash('success')):  ?>    <div class="alert alert-success">
        <?php echo Yii::app()->user->getFlash('success');  ?>    </div>
<?php  endif;  ?>

<?php Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
   CClientScript::POS_READY
);

$this->title="View Home Page Slider";
 ?>






<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(

		'user.full_name',
		'image',
		'description',
		'validity_days',
		'start_date',
		'status',
	),
)); ?>

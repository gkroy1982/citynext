<?php
/* @var $this FeedbackController */
/* @var $model Feedback */

$this->breadcrumbs=array(
	'Feedbacks'=>array('admin'),
	'View',
);

$this->menu=array(
	array('label'=>'Create Feedback', 'url'=>array('create')),
	array('label'=>'Update Feedback', 'url'=>array('update', 'id'=>$model->fid)),
	array('label'=>'List Feedback', 'url'=>array('admin')),
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

$this->title="View Feedback";
 ?>






<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'name',
		'phone_no',
		'email',
		'feedback',
		'read',
		'ctreated_on',
	),
)); ?>

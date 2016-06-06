<?php
/* @var $this ContactusController */
/* @var $model Contactus */

$this->breadcrumbs=array(
	'Enquery'=>array('admin'),
	'View',
);

$this->menu=array(
	array('label'=>'Create Enquery', 'url'=>array('create')),
	array('label'=>'Update Enquery', 'url'=>array('update', 'id'=>$model->cuid)),
	array('label'=>'List Enquery', 'url'=>array('admin')),
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

$this->title="View Enquery";
 ?>






<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
	
		'name',
		'phone_no',
		'email',
		'enquiry',
		'read',
		'created_on',
	),
)); ?>

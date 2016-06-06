<?php
/* @var $this CondolencesController */
/* @var $model Condolences */

$this->breadcrumbs=array(
	'Condolences'=>array('admin'),
	$model->title,
);

$this->menu=array(
	//array('label'=>'List Condolences', 'url'=>array('index')),
	array('label'=>'Create Condolences', 'url'=>array('create')),
	//array('label'=>'Update Condolences', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Condolences', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'List Condolences', 'url'=>array('admin')),
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

$this->title="View Condolence";
 ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'image',
		'date',
		'created_on',
	),
)); ?>


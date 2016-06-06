<?php
/* @var $this MainCategoryController */
/* @var $model MainCategory */

$this->breadcrumbs=array(
	'Used Categories'=>array('admin'),
	'View',
);

$this->menu=array(
	array('label'=>'Create Used Category', 'url'=>array('create')),
	array('label'=>'Update Used Category', 'url'=>array('update', 'id'=>$model->mcid)),
	array('label'=>'List Used Category', 'url'=>array('admin')),
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

$this->title="View MainCategory";
 ?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(

		array(
			'label'=>'Icon',
            'type'=>'raw',
            'value'=> CHtml::image(Yii::app()->request->baseUrl.'/upload/icons/'.$model->icon,'alt',array('width'=>250,'height'=>250)),
        ),
	
		'category',
		'description:html',
	),
)); ?>

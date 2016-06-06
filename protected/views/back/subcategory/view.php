<?php
/* @var $this SubCategoryController */
/* @var $model SubCategory */

$this->breadcrumbs=array(
	'Sub Categories'=>array('admin'),
	'View',
);

$this->menu=array(
	array('label'=>'Create SubCategory', 'url'=>array('create')),
	array('label'=>'Update SubCategory', 'url'=>array('update', 'id'=>$model->scid)),
	array('label'=>'List SubCategory', 'url'=>array('admin')),
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

$this->title="View SubCategory";
 ?>






<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'label'=>'Icon',
            'type'=>'raw',
            'value'=> CHtml::image(Yii::app()->request->baseUrl.'/upload/icons/'.$model->icon,'alt',array('width'=>250,'height'=>250)),
        ),
		'mainCategory.category',
		'sub_category',
		'description',
	),
)); ?>

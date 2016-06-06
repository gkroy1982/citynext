<?php
/* @var $this CardController */
/* @var $model Card */

$this->breadcrumbs=array(
	'Cards'=>array('admin'),
	'View',
);

$this->menu=array(
	array('label'=>'Create Card', 'url'=>array('create')),
	array('label'=>'Update Card', 'url'=>array('update', 'id'=>$model->cid)),
	array('label'=>'List Card', 'url'=>array('admin')),
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

$this->title="View Card";
 ?>






<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cid',
		'users_id',
		'product_id',
		'quantity',
		'unit_price',
		'offer',
		'created_on',
	),
)); ?>

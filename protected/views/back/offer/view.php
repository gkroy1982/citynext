<?php
/* @var $this OfferController */
/* @var $model Offer */

$this->breadcrumbs=array(
	'Today\'s Offers Price Setting'=>array('admin'),
	'View',
);

$this->menu=array(
	array('label'=>'Create Today\'s Offers Price Setting', 'url'=>array('create')),
	array('label'=>'Update Today\'s Offers Price Setting', 'url'=>array('update', 'id'=>$model->oid)),
	array('label'=>'List Today\'s Offers Price Setting', 'url'=>array('admin')),
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

$this->title="View Today's Offers Price Setting";
 ?>






<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'days',
		'amount',
		'status',
	),
)); ?>

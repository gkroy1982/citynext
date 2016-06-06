<?php
/* @var $this ProductOffersController */
/* @var $model ProductOffers */

$this->breadcrumbs=array(
	'Today\'s Offers'=>array('admin'),
	'View',
);

$this->menu=array(
	array('label'=>'Create Today\'s Offers', 'url'=>array('create')),
	array('label'=>'Update Today\'s Offers', 'url'=>array('update', 'id'=>$model->poid)),
	array('label'=>'List Today\'s Offers', 'url'=>array('admin')),
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

$this->title="View Today's Offers";
 ?>






<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(	
		'user.full_name',		
		'product.product',
		'offer.days',

		'description',
		'start_date',
		'end_date',
		'status',
		
	),
)); ?>

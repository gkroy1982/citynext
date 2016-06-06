<?php
/* @var $this OfferController */
/* @var $model Offer */

$this->breadcrumbs=array(
	'Today\'s Offers Price Setting'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Today\'s Offers Price Setting', 'url'=>array('create')),
	array('label'=>'View Today\'s Offers Price Setting', 'url'=>array('view', 'id'=>$model->oid)),
	array('label'=>'List Today\'s Offers Price Setting', 'url'=>array('admin')),
);
$this->title="Update Today's Offers Price Setting";
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
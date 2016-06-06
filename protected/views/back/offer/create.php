<?php
/* @var $this OfferController */
/* @var $model Offer */

$this->breadcrumbs=array(
	'Today\'s Offers Price Setting'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Today\'s Offers Price Setting', 'url'=>array('admin')),
);
$this->title="Create Today's Offers Price Setting";
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
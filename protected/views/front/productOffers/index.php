<?php
/* @var $this ProductOffersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Offers',
);

$this->menu=array(
	array('label'=>'Create ProductOffers', 'url'=>array('create')),
	array('label'=>'Manage ProductOffers', 'url'=>array('admin')),
);
?>

<h1>Product Offers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

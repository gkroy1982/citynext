<?php
/* @var $this ProductOffersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Today\'s Offers',
);

$this->menu=array(
	array('label'=>'Create Today\'s Offers', 'url'=>array('create')),
	array('label'=>'Manage Today\'s Offers', 'url'=>array('admin')),
);
?>

<h1>Product Offers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

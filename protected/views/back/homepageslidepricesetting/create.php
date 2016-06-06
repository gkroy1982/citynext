<?php
/* @var $this HomepageslidepricesettingController */
/* @var $model HomePageSlidePriceSetting */

$this->breadcrumbs=array(
	'Home Page Slide Price Settings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Home Page Slide Price Settings', 'url'=>array('admin')),
);
$this->title='Create Home Page Slide Price Settings';
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
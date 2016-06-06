<?php
/* @var $this HomepageslidesettingController */
/* @var $model HomePageSlideSetting */

$this->breadcrumbs=array(
	'Home Page Slide Settings'=>array('index'),
	'Update',
);
$this->title='Home Page Slide Settings';

?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>
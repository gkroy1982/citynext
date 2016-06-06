<?php

$this->breadcrumbs=array(
	'Classifieds'=>array('admin'),
	'Create',
);

$this->menu=array(

	array('label'=>'Manage Classifieds', 'url'=>array('admin')),
);
$this->title="Create Classified";
?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this Home Page Slide Price SettingsController */
/* @var $model Home Page Slide Price Settings */

$this->breadcrumbs=array(
	'Home Page Slide Price Settings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Create Home Page Slide Price Settings', 'url'=>array('create')),
	array('label'=>'Update Home Page Slide Price Settings', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Home Page Slide Price Settings', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Home Page Slide Price Settings', 'url'=>array('admin')),
);
$this->title='View Home Page Slide Price Settings ';
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		array(
			'name'=>'Slide Type',
			'value'=>function(){
				if($data->slide_type==0)
					return 'Big Home Page Slide';
				else if($data->slide_type==1)
					return 'Small Home Page Slide';
			}
		),
		// 'slide_type',
		'days',
		'amount',
		'status',
		'created_date',
		'updated_date',
	),
)); ?>

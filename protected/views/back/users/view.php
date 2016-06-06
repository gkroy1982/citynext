<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'View',
);

$this->menu=array(
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'Update Users', 'url'=>array('update', 'id'=>$model->uid)),
	array('label'=>'List Users', 'url'=>array('admin')),
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

$this->title="View Users";
 ?>






<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(

		array('label'=>"User Type",
			'type'=>'raw',
			'value'=>($model->user_type==1)?"Customer":"Dealer"),
		'first_name',
		'last_name',
		'full_name',
		'contact_no',
		'email',
		'password',
		'address',
		'post_code',
		'business_name',
		//'business_type',
		'solution',
		'address',
		
		'company',
		'area.area_name',
		'cities.city_name',
		'states.state_name',

		'status',

	),
)); ?>

<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Admin User List'=>array('adminuser'),
	'view',
);

$this->menu=array(
	//array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->userId)),
	//array('label'=>'Change Password', 'url'=>array('change_password', 'id'=>$model->userId)),
	array('label'=>'Admin User List', 'url'=>array('adminuser')),
);
?>

<?php  if(Yii::app()->user->hasFlash('change_password')):  ?>    <div class="alert alert-success">
        <?php  echo Yii::app()->user->getFlash('change_password');  ?>    </div>
<?php  endif;  ?>
<?php Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
   CClientScript::POS_READY
);
$this->title="View Admin User";
 ?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
	array(
			'label'=>'Image',
            'type'=>'raw',
            'value'=> CHtml::image(Yii::app()->request->baseUrl.'/upload/profile/'.$model->photo,'alt',array('width'=>250,'height'=>250)),
        ),
		
		
		array('label'=>'First Name',
				'value'=>$model->firstName,
		),

		'lastName',
		'username',
		'email',
		
	),
)); ?>

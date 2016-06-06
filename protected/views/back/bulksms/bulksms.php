<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'SMS'=>array('bulksms'),
	'Bulk SMS',
);

 $this->menu=array(
	array('label'=>'Total SMS: '.$sms_history['total'], ),
	array('label'=>'Remaining SMS: '.$sms_history['remaining'], ),
	array('label'=>'Used SMS: '.$sms_history['used'], ),
	
 );
$this->title="Bulk SMS";
?>


<?php $this->renderPartial('_form_bulk_sms', array('model'=>$model,'clicked_on_send'=>$clicked_on_send)); ?>
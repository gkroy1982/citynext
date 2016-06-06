<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Promotional SMS'=>array('bulksmsexcel'),
	'Bulk Promotional SMS',
);

 // $this->menu=array(
	// array('label'=>'Total SMS: '.$sms_history['total'], ),
	// array('label'=>'Remaining SMS: '.$sms_history['remaining'], ),
	// array('label'=>'Used SMS: '.$sms_history['used'], ),
	
 // );
$this->title="Bulk Promotional SMS";
?>


<?php $this->renderPartial('_form_bulk_sms_excel',array('error'=>$error)); ?>
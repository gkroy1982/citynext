<?php
ob_start();
class CronbirthdayController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(			
						array('allow', // allow authenticated user to perform 'create' and 'update' actions
							'actions'=>array('index'),
							'users'=>array('*'),
						),
					);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionIndex()
	{
		$this->birthday();
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	
	public function birthday()
	{
		$current_date=date('Y-m-d');
		$model=Users::model()->findAll(array('condition'=>"dob='$current_date'"));
		echo '<pre>';
		$i=0;
		if(!empty($model)){
			foreach($model as $user){
				// print_r($user->attributes);
				$i++;
				$mobile_no=$user->contact_no;
				
				$sms='Dear '.ucwords($user->full_name).', Best Wishes for a very Happy Birthday and a Healthy & Successful life ahead. From: CITYNEXT.';
				if(!empty($mobile_no))
					$this->SMS( $sms, $mobile_no, $user_id=0);
					// echo $sms;	
			}			
		}
		echo 'Total '.$i.' SMS sent @ '.date('d-M-Y H:i:s');
		
	}
	
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

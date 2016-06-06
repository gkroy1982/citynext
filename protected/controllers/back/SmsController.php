<?php
ob_start();
class SmsController extends Controller
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
						'actions'=>array('sendsms'),
						'users'=>array('Subadmin'),
					),
					array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('sendsms'),
						'users'=>array('admin'),
					),
					array('deny',  // deny all users
						'users'=>array('*'),
					),
				);
	}


	public function actionSendsms()
	{
		
//print_r($_POST);exit;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];

			$model->full_name=ucwords($model->first_name.' '.$model->last_name );
			if($model->save())
			{
				Yii::app()->user->setFlash('success', 'SMS sent successful.');
				$this->redirect(array('view','id'=>$model->uid));
			}
		}

		$this->render('sms',array(
			'model'=>$model,
		));
	}
}

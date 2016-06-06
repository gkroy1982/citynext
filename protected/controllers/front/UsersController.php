<?php
ob_start();
class UsersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

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
		
						array('allow', // allow admin user to perform 'admin' and 'delete' actions
							'actions'=>array('create','update','delete','admin','view'),
							'users'=>array('@'),
						),
						array('deny',  // deny all users
							'users'=>array('*'),
						),
					);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView()
	{
		$id= Yii::app()->user->getState('uid');
		$model = $this->loadModel($id);

		if( $model->user_type==2 ){
			$nav = 'Profile [ '.$model->business_name.' ]';
		 } else {
			$nav = 'Profile [ '.$model->first_name.' ]';
		 }
		
		$this->render('view',array(	'model'=>$model,'nav'=>$nav,));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Users;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];

			$model->full_name=ucwords($model->first_name.' '.$model->last_name );
			if($model->save())
			{
				Yii::app()->user->setFlash('success', 'Record added successful.');
				$this->redirect(array('view','id'=>$model->uid));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);




		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if($model->user_type==2)
			$model->scenario='seller';
		else
			$model->scenario='personal';

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];

			$model->full_name=ucwords($model->first_name.' '.$model->last_name );

			$imgLocation=Yii::app()->basePath.'/../upload/profile/';		
			$fileNameImag=CommonFunctions::FileUpdate($model,'photo',$imgLocation);
			if(!empty($fileNameImag)){$model->photo = $fileNameImag;}

			if($model->save())
			{

				Yii::app()->user->setFlash('success', 'Record updated successful.');
				$this->redirect(array('view','id'=>$model->uid));
			}
		}
		
		$nav = 'Update Profile [ '.$model->first_name.' ]';
		
		$this->render('update',array(	'model'=>$model,'nav'=>$nav,));

		
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
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

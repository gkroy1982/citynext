<?php

class ClassifiedsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/main';

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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
	public function actionView($id)
	{
		$nav = 'Classifieds >> View';
		$this->render('view',array(
			'model'=>$this->loadModel($id),'nav'=>$nav,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Classifieds;
		$nav = 'Classifieds >> Create';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Classifieds']))
		{
			$model->attributes=$_POST['Classifieds'];
			$model->to_date = date('Y-m-d',strtotime($model->to_date));
			$model->from_date = date('Y-m-d',strtotime($model->from_date));
			
			$model->user_id=Yii::app()->user->getState('uid');
			$imgLocation=Yii::app()->basePath.'/../upload/classified/';			
			$fileNameImag=CommonFunctions::FileUpload($model,'image',$imgLocation);
			if(!empty($fileNameImag)){ $model->image = $fileNameImag;}
			if($model->save()){
				Yii::app()->user->setFlash('success', 'You have successfully created your classified. This will be activated soon within 24 hrs.');
				$this->redirect(array('admin'));
			}
		}
 
		$this->render('create',array(
			'model'=>$model,'nav'=>$nav,
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
		$nav = 'Classifieds >> Update';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Classifieds']))
		{
			$model->attributes=$_POST['Classifieds'];
			$model->to_date = date('Y-m-d',strtotime($model->to_date));
			$model->from_date = date('Y-m-d',strtotime($model->from_date));
			
			$imgLocation=Yii::app()->basePath.'/../upload/classified/';		
			$fileNameImag=CommonFunctions::FileUpdate($model,'image',$imgLocation);
			if(!empty($fileNameImag)){$model->image = $fileNameImag;}
			
			if($model->save()){
				Yii::app()->user->setFlash('success', 'You have successfully updated your classified.');
				$this->redirect(array('admin'));
			}
		}

		$this->render('update',array(
			'model'=>$model,'nav'=>$nav,
		));
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
		$dataProvider=new CActiveDataProvider('Classifieds');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Classifieds('search');
		$nav = 'Classifieds >> List';
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Classifieds']))
			$model->attributes=$_GET['Classifieds'];

		$this->render('admin',array(
			'model'=>$model,'nav'=>$nav,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Classifieds the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Classifieds::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Classifieds $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='classifieds-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

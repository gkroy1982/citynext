<?php
ob_start();
class ProductsController extends Controller
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
				'users'=>array('@'),
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
		$nav = "Product >> View";
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
		$model=new Products;
		$nav = "Product >> Create";

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Products']))
		{
			$model->attributes=$_POST['Products'];

			$model->user_id=Yii::app()->user->getState('uid');

			$imgLocation=Yii::app()->basePath.'/../upload/products/';			
			$fileNameImag=CommonFunctions::FileUpload($model,'image',$imgLocation);
			if(!empty($fileNameImag)){ $model->image = $fileNameImag;}

			$fileNameImag=CommonFunctions::FileUpload($model,'image2',$imgLocation);
			if(!empty($fileNameImag)){ $model->image2 = $fileNameImag;}

			$fileNameImag=CommonFunctions::FileUpload($model,'image3',$imgLocation);
			if(!empty($fileNameImag)){ $model->image3 = $fileNameImag;}

			if($model->save())
			{
				Yii::app()->user->setFlash('success', 'You have successfully added a Product/Service. This will be activated soon within 24 hr.');
				$this->redirect(array('view','id'=>$model->pid));
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
		$nav = "Product >> Update";

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Products']))
		{
			$model->attributes=$_POST['Products'];

			$imgLocation=Yii::app()->basePath.'/../upload/products/';		
			$fileNameImag=CommonFunctions::FileUpdate($model,'image',$imgLocation);
			if(!empty($fileNameImag)){$model->image = $fileNameImag;}

			$fileNameImag=CommonFunctions::FileUpdate($model,'image2',$imgLocation);
			if(!empty($fileNameImag)){$model->image2 = $fileNameImag;}

			$fileNameImag=CommonFunctions::FileUpdate($model,'image3',$imgLocation);
			if(!empty($fileNameImag)){$model->image3 = $fileNameImag;}

			if($model->save())
			{
				Yii::app()->user->setFlash('success', 'Record updated successful.');
				$this->redirect(array('view','id'=>$model->pid));
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
		$dataProvider=new CActiveDataProvider('Products');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Products('search');
		$nav = "Product >> List";
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Products']))
			$model->attributes=$_GET['Products'];

		$this->render('admin',array(
			'model'=>$model,'nav'=>$nav,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Products the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Products::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Products $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='products-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

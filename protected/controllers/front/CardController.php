<?php
ob_start();
class CardController extends Controller
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
			//'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('admin','delete','addcard','shoppingcard'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Card;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Card']))
		{
			$model->attributes=$_POST['Card'];
			if($model->save())
			{
				Yii::app()->user->setFlash('success', 'Record added successful.');
				$this->redirect(array('view','id'=>$model->cid));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}



	public function actionAddcard($id)
	{
		$product=Products::model()->findByPk($id);
		$uid=Yii::app()->user->getState('uid');

		//cid, users_id, product_id, quantity, unit_price, offer, created_on
		
		$model=new Card;
		$model->users_id=$uid;
		$model->product_id=$product->pid;

		$model->quantity=1;
		$model->unit_price=$product->price;

		$model->offer=NULL;
		if($model->save())
			$this->redirect(Yii::app()->request->urlReferrer);
		else
			echo 'Error';print_r($model);
	}



	public function actionShoppingcard()
	{
		$uid=Yii::app()->user->getState('uid');
		$model=Card::model()->findAll('users_id='.$uid);

		$this->render('card',array(	'products'=>$model));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['qnt']))
		{
			$model->quantity=$_POST['qnt'];

			if($model->save())
			{
				$this->redirect(array('card/shoppingcard'));
			}
		}

	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		$this->redirect(array('card/shoppingcard'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Card');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Card('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Card']))
			$model->attributes=$_GET['Card'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Card the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Card::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Card $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='card-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

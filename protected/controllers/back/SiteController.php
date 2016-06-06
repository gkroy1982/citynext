<?php
ob_start();
class SiteController extends Controller
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{		
		if (Yii::app()->user->isGuest){
			$this->redirect(array('/site/login'));
		}else{
			$this->render('index',array('prop'=>2,'pt'=>5,'loc'=>9,));
		}
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->layout ='error';
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout ='login';
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
			{
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
	
	public function actionHelp()
	{
		
		// display the login form
		$this->render('help');
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	public function actionSearch(){
		if (Yii::app()->user->isGuest)
			$this->redirect('index');
		else
		$this->render('search');
	}
	
	public function actionSubcategory()
	{
		$data=SubCategory::model()->findAll( 'main_category_id='.(int) $_POST['pid'] );
		
		$data = CHtml::listData($data,'scid','sub_category');
		
		echo "<option value=''>Select </option>";
		foreach($data as $value=>$name){
		
			echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
		}
	}
	public function actionCities()
	{
		$id=$_POST['state_id'];

		$data=City::model()->findAll('state_id='.$id );

		$data = CHtml::listData($data,'cid','city_name');
		
		echo "<option value=''>Select </option>";
		foreach($data as $value=>$name){
		
			echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
		}
	}
	
}
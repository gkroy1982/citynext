<?php
ob_start();
class BulksmsController extends Controller
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
							'actions'=>array('create','admin','view'),
							'users'=>array('Subadmin'),
						),
						array('allow', // allow admin user to perform 'admin' and 'delete' actions
							'actions'=>array('create','update','delete','admin','view','bulksms','bulksmsexcel','bulksmscount','bulksmsredirect'),
							'users'=>array('admin'),
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

	 
	public function actionBulksmsexcel()
	{
		ini_set('max_execution_time', 300);
		if(!empty($_POST['sms_id']))
			$sms_opt=$_POST['sms_id'];
		if(!empty($_POST['mobiles']))
			$mobiles=$_POST['mobiles'];
		if(!empty($_POST['message']))
			$message=$_POST['message'];
		if(!empty($_POST['fileMobileNo']))
			$excel_file=$_POST['fileMobileNo'];
		
		if($sms_opt==1){
			$arr_mobiles=@explode(',',$mobiles);
			if(!empty($arr_mobiles)){
				foreach($arr_mobiles as $single_mobile){
					$single_mobile=str_replace(" ", "", $single_mobile);
					if($single_mobile!="" && is_numeric($single_mobile)){
						$err='It need promotional SMS API integration to perform your action.';
					}else
						$err='Please provide valid mobile.';
				}
			}
		}
		if($sms_opt==2){
			if($_FILES["fileMobileNo"]["name"]!==''){
				$excel_folder_path=Yii::app()->basePath.'/../upload/bulksms/';
				
				$file_upload=CUploadedFile::getInstanceByName("fileMobileNo");
                                
				$file_name=Yii::app()->user->getName().date('_y_m_d_h_i_s').".xlsx";
				$file = $excel_folder_path.$file_name; 
				$file_upload->saveAs($file);
				
				$folder = 'bulk_sms';
				$file_path = $file;

				$sheet_array = Yii::app()->yexcel->readActiveSheet($file_path);
				
				if(isset($sheet_array)){
					foreach ($sheet_array as $row){                    
						$num=str_replace(" ", "", $row[A]);
						if($num!="" && is_numeric($num)){
							// echo $num.'<br>';
							$err='It need promotional SMS API integration to perform your action.';
						}else
							$err='Please provide valid mobile.';
					}
				}
			}
		}
		
		$this->render('bulksmsexcel', array('error'=>$err
			));
	}
	public function actionBulksms()
	{
		// echo "<pre>";
		// if(isset($_POST['yt0']))
			// print_r($_POST);//exit;
		ini_set('max_execution_time', 300);
		if(!empty($_POST['message']))
			$sms=$_POST['message'];
		
		$model=new Users;
		
		$data=$model->bulksms();
		$model->unsetAttributes();
		$users_model=$data[1];

		if(!empty($users_model)){
			foreach($users_model as $user){
			
			$mobile_no=$user->contact_no;
				
				if(!empty($sms))
					$this->SMS( $sms, $mobile_no, $user_id=0);
					// echo $sms.'<br>';
			}			
		}
		$sms_history=$this->SMSCredit();
		// print($_POST);//exit;
		// foreach($_POST as $key=>$val){
			
			// unset($val);
		// }
		// unset($_POST['clicked_on_send']);
		// $this->redirect(array('bulksmsredirect','model'=>$model,'sms_history'=>$sms_history));
		// $this->doUnset();
		$this->render('bulksms',array(
			'model'=>$model,'sms_history'=>$sms_history,'clicked_on_send'=>0
		));
	}
	
	
	// private function doUnset()
	// {
		// unset($_POST['alpha']);
		// unset($_POST['gamma']);
		// unset($_GET['eta']);
		// unset($_GET['zeta']);
	// }
	
	// public function actionBulksmsredirect(){
		// $model=$_GET['model']; 
		// $sms_history=$_GET['sms_history']; 
		
		// $this->render('bulksms',array(
			// 'model'=>$model,'sms_history'=>$sms_history
		// ));
	// }
	
	public function actionBulksmscount()
	{
		$model=new Users;
		$data=$model->bulksms();
		echo 'Total '.$data[0].' SMS you are going to send';		
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
		$old_status=$model->status;
		$old_pass=$model->password;
		echo $old_status.' || '.$old_pass;
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];

			$model->full_name=ucwords($model->first_name.' '.$model->last_name );
			if($model->save())
			{
				// echo '<pre>';
				// print_r($model->attributes);
				$old_status_cmp=strcmp($old_status,"Inactive");
				if($old_status_cmp==0){
				
					$new_status_cmp=strcmp($model->status,"Active");
				
					if($new_status_cmp==0){
						$sms_user_activation='Congratulations '.ucwords($model->first_name).', ';
						$sms_user_activation.='You are now a registered member of CITYNEXT. Your User ID is your email id and password is '.$model->password;
						$user_activation_mobile=$model->contact_no;
						$this->SMS($sms_user_activation, $user_activation_mobile, $default_user_id=0);
					}						
				}
				$pass_change_status=strcmp($old_pass,$model->password);
				if($pass_change_status!=0){
						$sms_new_pass='Dear '.ucwords($model->first_name).', ';
						$sms_new_pass.='Your new password is '.$model->password;
						$new_pass_mobile=$model->contact_no;
						$this->SMS($sms_new_pass, $new_pass_mobile, $default_user_id=0);
				}
				
				Yii::app()->user->setFlash('success', 'Record updated successful.');
				$this->redirect(array('view','id'=>$model->uid));
			}
		}

		$this->render('update',array(
			'model'=>$model,
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
		//print_r($_GET['status']);
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

<?php

class DiscountvouchersController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','insertpaymentinfo', 'success', 'successredirect', 'failure', 'failureredirect'),
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
		$nav = "Discount Voucher >> View";
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
		$model=new Discountvouchers;
		$nav = "Discount Voucher >> Create";
// print_r($_POST);exit;	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Discountvouchers']))
		{
			$model->attributes=$_POST['Discountvouchers'];
			$model->vender_id = Yii::app()->user->getState('uid');
			// $model->status = 'Active';
			$model->code = rand(111111,999999);
			if($model->save())
			{
				/*$total = $model->total;
				
				for( $i=1; $i < $total; $i++)
				{
					$obj =new Discountvouchers;
					$obj->vender_id = $model->vender_id ;
					$obj->from_date = $model->from_date ;
					$obj->to_date = $model->to_date ;
					$obj->total = $model->total ;
					$obj->code = rand(111111,999999);
					$obj->status = $model->status ;
					$obj->insert();
					
				}*/
				
				$this->redirect(array('view','id'=>$model->id));
			}
				
		}
		$price_model=DiscountVoucherPriceSetting::model()->findByAttributes(array('status'=>'Active'));
		$this->render('create',array(
			'model'=>$model,'nav'=>$nav,'price_model'=>$price_model
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
		$nav = "Discount Voucher >> Update";

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Discountvouchers']))
		{
			$model->attributes=$_POST['Discountvouchers'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		$price_model=DiscountVoucherPriceSetting::model()->findByAttributes(array('status'=>'Active'));
		$this->render('update',array(
			'model'=>$model,'nav'=>$nav,'price_model'=>$price_model
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
		$dataProvider=new CActiveDataProvider('Discountvouchers');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$nav = "Discount Voucher >> List";
		// $surl="http://$_SERVER[HTTP_HOST]/index_new.php/discountvouchers/success";#For Live
		// $furl="http://$_SERVER[HTTP_HOST]/index_new.php/discountvouchers/failure";#For Live
		$surl="http://$_SERVER[HTTP_HOST]/citynext/index_new.php/discountvouchers/success";#For Local
		$furl="http://$_SERVER[HTTP_HOST]/citynext/index_new.php/discountvouchers/failure";#For Local
		
		$model=new Discountvouchers('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Discountvouchers']))
			$model->attributes=$_GET['Discountvouchers'];

		$this->render('admin',array(
			'model'=>$model,'nav'=>$nav,'surl'=>$surl,'furl'=>$furl
		)); 
	}

	
	#Start Payment Log insertion
	public function actionInsertpaymentinfo(){
	// print_r($_POST['selectedIds'])	;exit;
		// $domain_name=Yii::app()->getBaseUrl(true);
		
		if(empty($_POST['selectedIds'])){
			echo 'Discountvouchers ids not found.';exit;			
		}
		$selected_discountvouchers_ids=$_POST['selectedIds'];
		 // echo $product_offer_id;exit;
		$discountvouchers_ids=array();
		$discountvouchers_rates=array();
	 
		foreach($selected_discountvouchers_ids as $discountvouchers_id){
			$discountvouchers_model=Discountvouchers::model()->findByPk($discountvouchers_id);
			 
				
			$discountvouchers_name_rate.='Discountvoucher code ('.$discountvouchers_model->code.'): Rs. '.$discountvouchers_model->amount.' for duration '.date('d-m-Y',strtotime($ads_model->from_date)).' to '.date('d-m-Y',strtotime($ads_model->from_date)).', ';
		
			$total_amount+=$discountvouchers_model->amount;
			$discountvouchers_ids[]=$discountvouchers_model->id;
			$discountvouchers_rates[]=$discountvouchers_model->amount;
			
			$current_user=$discountvouchers_model->vender_id;
		}
		$discountvouchers_rates=@implode(',',$discountvouchers_rates);
		$discountvouchers_ids=@implode(',',$discountvouchers_ids);
		 

		$order_model=new Orders;
		$order_model->service_types_id=2;
		$order_model->item_ids=$discountvouchers_ids;
		$order_model->item_rates=$discountvouchers_rates;
		$order_model->total_amount=$total_amount;
		$order_model->ordered_by=$current_user;
		$order_model->ordered_date=date('Y-m-d H:i:s');
		$order_model->save(false);
		
		$order_model->order_no='OR-DV-'.$order_model->id;
		
		$order_model->save(false);
		$vendor_model=Users::model()->findByAttributes(array('uid'=>$current_user));#To fetch & pass all contact info
				
		// $vendor_model`first_name`, `last_name`, `full_name`, `email`, `password`, `business_name`, `address`, `contact_no` 
		
		$productinfo='Payment of Home Page Slider with amount to be paid are '.$discountvouchers_name_rate;
		
		$_POST['key']=PAYU_MERCHANT_KEY;#Required
		// $_POST['txnid']=$cloud_bill_model->id;#Required
		
		$_POST['firstname']=$vendor_model->first_name;#Required(Storing vendor firstname)
		$_POST['lastname']=$vendor_model->last_name;#Required(Storing vendor lastname)
		$_POST['email']=$vendor_model->email;#Required(Storing vendor email)
		$_POST['phone']=$vendor_model->contact_no;#Required
		$_POST['udf1']=$order_model->id;#To store order_id 
		$_POST['amount']=$total_amount;
		$_POST['productinfo']=$productinfo;#Required
		
		// print_r($_POST);exit;
		$paymentlog_model=new Payupaymentlogs();
		$paymentlog_model->attributes=$_POST;
		$paymentlog_model->created_on=date('Y-m-d H:i:s');
		$paymentlog_model->save(false);
		$paymentlog_model->txnid=$paymentlog_model->id;
		$paymentlog_model->save(false);
			// print_r($paymentlog_model->attributes);exit;
		
		
		
		if($paymentlog_model->key!='' && $paymentlog_model->txnid!='' && $paymentlog_model->amount!='' && $paymentlog_model->productinfo!='' && $paymentlog_model->firstname!='' && $paymentlog_model->email!=''){
			
			$hash_string=$paymentlog_model->key.'|'.$paymentlog_model->txnid.'|'.$paymentlog_model->amount.'|'.$paymentlog_model->productinfo.'|'.$paymentlog_model->firstname.'|'.$paymentlog_model->email.'|'.$paymentlog_model->udf1.'||||||||||'.PAYU_SALT;

			$hash = strtolower(hash('sha512', $hash_string));
			$paymentlog_model->hash=$hash;
			echo json_encode($paymentlog_model->attributes);
		}else
			echo 'req_field_blank';		
	}
	
		
	public function actionSuccess(){
		
		// echo 'S: <pre>';
		// print_r($_POST);
		$nav='Success';
		$status=$_POST["status"];
		$firstname=$_POST["firstname"];
		$amount=$_POST["amount"];
		$txnid=$_POST["txnid"];
		$posted_hash=$_POST["hash"];
		$key=$_POST["key"];
		$productinfo=$_POST["productinfo"];
		$email=$_POST["email"];
		$order_id=$udf1=$_POST["udf1"];
		// $product_offer_id=$udf1=$_POST["udf1"];
		

			If(isset($_POST["additionalCharges"])){
				$additionalCharges=$_POST["additionalCharges"];
				$retHashSeq = $additionalCharges.'|'.PAYU_SALT.'|'.$status.'||||||||||'.$udf1.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
			}else{
				$retHashSeq = PAYU_SALT.'|'.$status.'||||||||||'.$udf1.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
			}
			//$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1";// Hash Sequence
			
		$hash = hash("sha512", $retHashSeq);
		
		if(!empty($txnid)){#Update payu_payment_log	
			$paymentlog_model=Payupaymentlogs::model()->findByPk($txnid);
			$paymentlog_model->attributes=$_POST;
			$paymentlog_model->save(false);
			$paymentlog_model->unsetAttributes();
			unset($_POST);
			$order_model=Orders::model()->findByPk($order_id);
			$order_model->payment_status=1;
			$order_model->save(false);
			
			$ads_ids=@explode(',',$order_model->item_ids);
				
			#Update product_offer_id in product offer table to get all payment detail of offer product
			if(!empty($ads_ids)){
				foreach($ads_ids as $ads_id){
					$discountvouchers_model=Discountvouchers::model()->findByPk($ads_id);
					$discountvouchers_model->payu_payment_logs_id=$txnid;
					$discountvouchers_model->save(false);
				}
			}
		}
		
		
		$response_text='';
		
		if($hash != $posted_hash){
			$response_text.= "Invalid Transaction. Please try again";
		}else{
			$response_text = "<h3>Thank You. Your payment status is ". $status ."</h3>";
			$response_text.= "<h4>Your Transaction ID for this transaction is ".$txnid."</h4>";
			$response_text.= "<h4>We have received a payment of Rs. " . $amount . " </h4>";
		} 
		
		// echo Yii::app()->theme->name;exit;
		if(empty($_POST)){
			// $view = Yii::app()->theme->name.'/success';
			$view = 'success';
			$this->render($view,array('response_text'=>$response_text,'nav'=>$nav));
		}else
			$this->redirect(array('successredirect','response_text'=>$response_text,'nav'=>$nav));
	}
	public function actionSuccessredirect($response_text){
		$this->redirect(array('success','response_text'=>$response_text,'nav'=>$nav));
	}
	
	public function actionFailure(){
		// echo 'F: <pre>';
		// print_r($_POST);
		$nav='Failure';
		$status=$_POST["status"];
		$firstname=$_POST["firstname"];
		$amount=$_POST["amount"];
		$txnid=$_POST["txnid"];

		$posted_hash=$_POST["hash"];
		$key=$_POST["key"];
		$productinfo=$_POST["productinfo"];
		$email=$_POST["email"];
		$order_id=$udf1=$_POST["udf1"];


		If(isset($_POST["additionalCharges"])){
			$additionalCharges=$_POST["additionalCharges"];
			$retHashSeq = $additionalCharges.'|'.PAYU_SALT.'|'.$status.'||||||||||'.$udf1.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
		}else{
			$retHashSeq = PAYU_SALT.'|'.$status.'||||||||||'.$udf1.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
		}
			
		$hash = hash("sha512", $retHashSeq);
		
		if(!empty($txnid)){
			$paymentlog_model=Payupaymentlogs::model()->findByPk($txnid);
			$paymentlog_model->attributes=$_POST;
			$paymentlog_model->save(false);
			$paymentlog_model->unsetAttributes();
			unset($_POST); 
			$order_model=Orders::model()->findByPk($order_id); 
			
			$ads_ids=@explode(',',$order_model->item_ids);
				
			#Update product_offer_id in product offer table to get all payment detail of offer product
			if(!empty($ads_ids)){
				foreach($ads_ids as $ads_id){
					$discountvouchers_model=Discountvouchers::model()->findByPk($ads_id);
					$discountvouchers_model->payu_payment_logs_id=$txnid;
					$discountvouchers_model->save(false);
				}
			}
		}
				
		
		if($hash != $posted_hash){
			$response_text="Invalid Transaction. Please try again";
		}else{
			$response_text="<h3>Your order status is ". $status .".</h3>";
			$response_text.="<h4>Your transaction id for this transaction is ".$txnid.". You may try making the payment by clicking the link below.</h4>";
			$response_text.="<p><a href=".Yii::app()->getBaseUrl(true)."/index_new.php/discountvouchers/admin> Try Again</a></p>";
		}
		
		// echo Yii::app()->theme->name;exit;
		if(empty($_POST)){
			// $view = Yii::app()->theme->name.'/failure';
			$view = 'failure';
			$this->render($view,array('response_text'=>$response_text,'nav'=>$nav));
		}else
			$this->redirect(array('failureredirect','response_text'=>$response_text,'nav'=>$nav));
		
	}
	
	public function actionfailureredirect($response_text){
		$this->redirect(array('failure','response_text'=>$response_text,'nav'=>$nav));
	}
	 
	#End Payment Log insertion

	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Discountvouchers the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Discountvouchers::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Discountvouchers $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='discountvouchers-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

<?php

class ProductOffersController extends Controller
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
				'actions'=>array('create','update','getprice','insertpaymentinfo', 'success', 'successredirect', 'failure', 'failureredirect','getproductimage'),
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
		$nav = "Today's Offer >> View";
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
		$model=new ProductOffers;
		$nav = "Today's Offer >> Create";

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	

		if(isset($_POST['ProductOffers']))
		{
			$_POST['ProductOffers']['start_date']=date('Y-m-d',strtotime($_POST['ProductOffers']['start_date']));
			$model->attributes=$_POST['ProductOffers'];
			$model->start_date=date('Y-m-d',strtotime($model->start_date));
			$model->user_id=Yii::app()->user->getState('uid');

			if($model->save())
			{
				$days=$model->offer->days;
				$date=date('Y-m-d',strtotime($model->start_date));
				$model->end_date=$this->addDayswithdate($date,$days);
				// print_r($model->attributes);exit;
				$model->save(false);
				
				Yii::app()->user->setFlash('success', 'Record added successful.');
				$this->redirect(array('view','id'=>$model->poid));
			}
		}
		$price_model=Offer::model()->findAllByAttributes(array('status'=>'Active'));
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
		$nav = "Today's Offer >> Update";

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProductOffers']))
		{
			$_POST['ProductOffers']['start_date']=date('Y-m-d',strtotime($_POST['ProductOffers']['start_date']));
			$model->attributes=$_POST['ProductOffers'];
			$model->start_date=date('Y-m-d',strtotime($model->start_date));
			if($model->save())
			{
				$days=$model->offer->days;
				$date=date('Y-m-d',strtotime($model->start_date));
				$model->end_date=$this->addDayswithdate($date,$days);
				// print_r($model->attributes);exit;
				$model->save(false);
				
				Yii::app()->user->setFlash('success', 'Record updated successful.');
				$this->redirect(array('view','id'=>$model->poid));
			}
		}
		$price_model=Offer::model()->findAllByAttributes(array('status'=>'Active'));
		$this->render('update',array(
			'model'=>$model,'nav'=>$nav,'price_model'=>$price_model
		));
	}

	public function actionGetprice()
	{
		if(!empty($_POST['offer_id']))
			$offer_id=$_POST['offer_id'];
		$price_model=Offer::model()->findByPk($offer_id);
		
		echo $price_model->amount;
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
		$dataProvider=new CActiveDataProvider('ProductOffers');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		// $surl="http://$_SERVER[HTTP_HOST]/index_new.php/productoffers/success";#For Live
		// $furl="http://$_SERVER[HTTP_HOST]/index_new.php/productoffers/failure";#For Live
		$surl="http://$_SERVER[HTTP_HOST]/citynext/index_new.php/productoffers/success";#For Local
		$furl="http://$_SERVER[HTTP_HOST]/citynext/index_new.php/productoffers/failure";#For Local
			
		$model=new ProductOffers('search');
		$nav = "Today's Offer >> List";
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProductOffers']))
			$model->attributes=$_GET['ProductOffers'];

		$this->render('admin',array(
			// 'model'=>$model,'nav'=>$nav,'PAYU_MERCHANT_KEY'=>PAYU_MERCHANT_KEY,'PAYU_SALT'=>PAYU_SALT,'PAYU_BASE_URL'=>PAYU_BASE_URL,'surl'=>$surl,'furl'=>$furl
			'model'=>$model,'nav'=>$nav,'surl'=>$surl,'furl'=>$furl
		));
	}

	#Start Payment Log insertion
	public function actionInsertpaymentinfo(){
	// print_r($_POST['selectedIds'])	;exit;
		// $domain_name=Yii::app()->getBaseUrl(true);
		
		if(empty($_POST['selectedIds'])){
			echo 'Product offer ids not found.';exit;			
		}
		$product_offer_ids=$_POST['selectedIds'];
		 // echo $product_offer_id;exit;
		$product_rates=array();
		$product_ids=array();
		foreach($product_offer_ids as $product_offer_id){
			$product_offer_model=ProductOffers::model()->findByPk($product_offer_id);
			
			$prod_name_rate.=$product_offer_model->product->product.' : Rs. '.$product_offer_model->offer->amount.' for duration '.date('d-m-Y',strtotime($product_offer_model->start_date)).' to '.date('d-m-Y',strtotime($product_offer_model->end_date)).', ';
		
			$total_amount+=$product_offer_model->offer->amount;
			$product_ids[]=$product_offer_model->poid;
			$product_rates[]=$product_offer_model->offer->amount;
			
			$current_user=$product_offer_model->user_id;
		}
		$product_rates=@implode(',',$product_rates);
		$product_ids=@implode(',',$product_ids);
		
		$order_model=new Orders;
		$order_model->service_types_id=1;
		$order_model->item_ids=$product_ids;
		$order_model->item_rates=$product_rates;
		$order_model->total_amount=$total_amount;
		$order_model->ordered_by=$current_user;
		$order_model->ordered_date=date('Y-m-d H:i:s');
		$order_model->save(false);
		$order_model->order_no='OR-TO-'.$order_model->id;
		
		$order_model->save(false);
		$vendor_model=Users::model()->findByAttributes(array('uid'=>$current_user));#To fetch & pass all contact info
				
		// $vendor_model`first_name`, `last_name`, `full_name`, `email`, `password`, `business_name`, `address`, `contact_no` 
		
		$productinfo='Payment of offer products with amount to be paid are '.$prod_name_rate;
		
		$_POST['key']=PAYU_MERCHANT_KEY;#Required
		// $_POST['txnid']=$cloud_bill_model->id;#Required
		
		$_POST['firstname']=$vendor_model->first_name;#Required(Storing vendor firstname)
		$_POST['lastname']=$vendor_model->last_name;#Required(Storing vendor lastname)
		$_POST['email']=$vendor_model->email;#Required(Storing vendor email)
		$_POST['phone']=$vendor_model->contact_no;#Required
		$_POST['udf1']=$order_model->id;#To store product_offer_id 
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
			
			$product_offer_ids=@explode(',',$order_model->item_ids);
				
			#Update product_offer_id in product offer table to get all payment detail of offer product
			if(!empty($product_offer_ids)){
				foreach($product_offer_ids as $product_offer_id){
					$product_offer_model=ProductOffers::model()->findByPk($product_offer_id);
					$product_offer_model->payu_payment_logs_id=$txnid;
					$product_offer_model->save(false);
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
			
			$product_offer_ids=@explode(',',$order_model->item_ids);
				
			#Update product_offer_id in product offer table to get all payment detail of offer product
			if(!empty($product_offer_ids)){
				foreach($product_offer_ids as $product_offer_id){
					$product_offer_model=ProductOffers::model()->findByPk($product_offer_id);
					$product_offer_model->payu_payment_logs_id=$txnid;
					$product_offer_model->save(false);
				}
			}
		}
				
		
		if($hash != $posted_hash){
			$response_text="Invalid Transaction. Please try again";
		}else{
			$response_text="<h3>Your order status is ". $status .".</h3>";
			$response_text.="<h4>Your transaction id for this transaction is ".$txnid.". You may try making the payment by clicking the link below.</h4>";
			$response_text.="<p><a href=".Yii::app()->getBaseUrl(true)."/index_new.php/productoffers/admin> Try Again</a></p>";
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

	public function actionGetproductimage(){
		if(!empty($_POST['product_id'])){
			$product_id=$_POST['product_id'];
			
			$product=Products::model()->findByPk($product_id);
			$basepath=Yii::app()->getBaseUrl(true);
			// $basepath=Yii::app()->request->baseUrl;
			// $basepath=Yii::app()->basePath;
			$image_path1=$basepath.'/upload/products/'.$product->image;
			$image_path2=$basepath.'/upload/products/'.$product->image2;
			$image_path3=$basepath.'/upload/products/'.$product->image3;
			if (strpos($product->image, '.') !== false) {
				if (@getimagesize($image_path1)) 
					echo "<img src=$image_path1 style='max-height:100px;max-width:100px;'/>";				
			}else if(strpos($product->image2, '.') !== false){
				echo '2';exit;
				if (@getimagesize($image_path2)) 
					echo "<img src=$image_path2 style='max-height:100px;max-width:100px;'/>";
			}else if(strpos($product->image2, '.') !== false){
				if (@getimagesize($image_path3)) 
					echo "<img src=$image_path3 style='max-height:100px;max-width:100px;'/>";
			}
		}else 
			echo 'no_image';
		
	}

	public function addDayswithdate($date,$days){
		$date = strtotime("+".$days." days", strtotime($date));
		return  date("Y-m-d", $date);
	}
	
	public function loadModel($id)
	{
		$model=ProductOffers::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ProductOffers $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-offers-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

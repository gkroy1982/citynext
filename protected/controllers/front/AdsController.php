<?php

class AdsController extends Controller
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
				'actions'=>array('create','update','adsavailability','insertpaymentinfo', 'success', 'successredirect', 'failure', 'failureredirect'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','getsliderpackage','countnonadsavailability'),
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
		$nav = 'Ads >> View';
		$this->render('view',array(
			'model'=>$this->loadModel($id),'nav'=>$nav,
		));
	}

	public function actionGetsliderpackage(){
		if(isset($_POST['show_in'])){
			$show_in=trim($_POST['show_in']);
			
			$slide_price_model=HomePageSlidePriceSetting::model()->findAll(array('condition'=>"slide_type=$show_in AND status='Active'"));
			 
			$return_slider_package.= "<option value=''>Select</option>";
			foreach($slide_price_model as $slide_price_model_row){
				$return_slider_package.= "<option value='$slide_price_model_row->id'>$slide_price_model_row->days  days </option>";
			}
			echo $return_slider_package;
		}else{
			echo 'err';
		}
	}
	
	public function actionAdsavailability(){
		if(isset($_POST['show_in']))
			$show_in=trim($_POST['show_in']);
		if(!empty($_POST['start_date']))
			$start_date=date('Y-m-d',strtotime($_POST['start_date']));
		if(!empty($_POST['validity_days']))
			$no_of_validity_days=trim($_POST['validity_days']);
	
		$slide_limit=HomePageSlideSetting::model()->findByPk(1);
		// echo $show_in;exit;
		if($show_in==0){
			$max_slide_limit=$slide_limit->f_slide_limit;
		}else if($show_in==1){
			$max_slide_limit=$slide_limit->s_slide_limit;			
		}
	
		// SELECT * FROM `ads` WHERE '2016-02-06'>=start_date AND DATE_ADD('2016-02-06',INTERVAL $no_of_validity_days DAY)<=DATE_ADD(start_date,INTERVAL validity_days DAY) AND show_in=0 AND status='Active' limit 0,$max_slide_limit

		// $max_slide_limit=1;	
		// $start_date='2016-02-06';
		// $no_of_validity_days=6;
		
		$ads=Ads::model()->findAll(array('condition'=>"show_in=$show_in AND status ='active' AND '$start_date'>=start_date AND DATE_ADD('$start_date', INTERVAL $no_of_validity_days DAY)<=DATE_ADD(start_date,INTERVAL validity_days DAY) ",'limit'=>$max_slide_limit));
		
		$count_validity_day=count($ads);
		$na_count=$max_slide_limit-$count_validity_day;
		
		$return_str="<table class='table table-hover slider_availability'  style='width:100%;'><thead>
			<tr>
				<th colspan=$max_slide_limit align='center'>Slider Availabilty On Selected Date</th>
			</tr>
			<tr>";
			
			for($i=1;$i<=$max_slide_limit;$i++){
				$return_str.="<th>Slider $i</th>";
			}
			$return_str.="</tr></thead>
			<tbody>
				<tr>";
				for($i=1;$i<=$max_slide_limit;$i++){
					if($i<=$count_validity_day)
						$return_str.="<td>NA</td>";
					else
						$return_str.="<td>A</td>";
				}
			$return_str.="</tr></tbody></table>";		
		echo $return_str;
	}
	
	public function actionCountnonadsavailability(){
		// print_r($_POST);exit;
		// $_POST['show_in']=1;
		// $_POST['start_date']='2016-05-18';
		// $_POST['validity_days']='25';
		
		if(isset($_POST['show_in']))
			$show_in=trim($_POST['show_in']);
		if(!empty($_POST['start_date']))
			$start_date=date('Y-m-d',strtotime($_POST['start_date']));
		if(!empty($_POST['validity_days']))
			$no_of_validity_days=trim($_POST['validity_days']);
	
		$slide_limit=HomePageSlideSetting::model()->findByPk(1);
		// echo $show_in;exit;
		if($show_in==0){
			$max_slide_limit=$slide_limit->f_slide_limit;
		}else if($show_in==1){
			$max_slide_limit=$slide_limit->s_slide_limit;			
		}
	
		// SELECT * FROM `ads` WHERE '2016-02-06'>=start_date AND DATE_ADD('2016-02-06',INTERVAL $no_of_validity_days DAY)<=DATE_ADD(start_date,INTERVAL validity_days DAY) AND show_in=0 AND status='Active' limit 0,$max_slide_limit

		// $max_slide_limit=1;	
		// $start_date='2016-02-06';
		// $no_of_validity_days=6;
		
		$ads=Ads::model()->findAll(array('condition'=>"show_in=$show_in AND status ='active' AND '$start_date'>=start_date AND DATE_ADD('$start_date', INTERVAL $no_of_validity_days DAY)<=DATE_ADD(start_date,INTERVAL validity_days DAY) ",'limit'=>$max_slide_limit));
		
		$count_validity_day=count($ads);
		$na_count=$max_slide_limit-$count_validity_day;
		$count_non_available=0;
		
		for($i=1;$i<=$max_slide_limit;$i++){
			if($i<=$count_validity_day)
				$count_non_available++;
		}
		echo $count_non_available;
	}
	
	public function actionCreate()
	{
		 // print_r($_POST);exit;
		$model=new Ads;
		$nav = 'Ads >> Create';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$price_model=HomePageSlidePriceSetting::model()->findAllByAttributes(array('status'=>'Active'));
		$count_response=trim($_POST['count_response']);
		
		if(isset($count_response) && $count_response==0) {
			
			
			if(isset($_POST['Ads'])) {
				$_POST['Ads']['start_date']=date('Y-m-d',strtotime($_POST['Ads']['start_date']));
				$model->attributes=$_POST['Ads'];
				$model->user_id=Yii::app()->user->getState('uid');
				 
				$imgLocation=Yii::app()->basePath.'/../upload/ads/'; 
				$fileNameImag=CommonFunctions::FileUpload($model,'image',$imgLocation);
				if(!empty($fileNameImag)){ $model->image = $fileNameImag;}
				
				$no_of_days=$model->validity_days;
				$slider_type=$model->show_in;
				$model->amount=$this->getAdsRateOnDays($no_of_days, $slider_type);
				if($model->save()) {
					Yii::app()->user->setFlash('success', 'Record added successful.');
					$this->redirect(array('view','id'=>$model->aid));
				}
			}
			$err='';
		}else{

			if($count_response==1)
				$err=$count_response.' date is not available from your selection. Please select available date only.';
			else
				$err=$count_response.' dates are not available from your selection. Please select available date only.';				
		}
		$max_slide_model=HomePageSlideSetting::model()->findByPk(1);
		
		$this->render('create',array(
			'model'=>$model,'nav'=>$nav,'price_model'=>$price_model,'max_slide_model'=>$max_slide_model,'err'=>$err
		));
	}

	public function getAdsRateOnDays($no_of_days, $slider_type) {
		$price_model=HomePageSlidePriceSetting::model()->findAll(array('condition'=>"slide_type=$slider_type AND status='Active'",'order'=>'days desc'));
		$arr_days=array();
		$arr_rates=array();
		$i=0;
		$rate=0;
		if(!empty($price_model)) {
			foreach($price_model as $price_model_row) {
				if(!empty($price_model_row)) {
					$arr_days[]=$price_model_row->days;
					$arr_rates[]=$price_model_row->amount;					
				}				
			}
		}
		
		while($no_of_days>0) {
			if($no_of_days>=$arr_days[$i]) {
				$dividend=floor($no_of_days/$arr_days[$i]);
				$rate+=($dividend*$arr_rates[$i]);
				$no_of_days=$no_of_days%$arr_days[$i];
			}
			$i++;
		}
		return $rate;
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$nav = 'Ads >> Update';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$price_model=HomePageSlidePriceSetting::model()->findAllByAttributes(array('status'=>'Active'));
		if(isset($_POST['Ads']))
		{
			$_POST['Ads']['start_date']=date('Y-m-d',strtotime($_POST['Ads']['start_date']));
			$model->attributes=$_POST['Ads'];

			$imgLocation=Yii::app()->basePath.'/../upload/ads/';		
			$fileNameImag=CommonFunctions::FileUpdate($model,'image',$imgLocation);
			if(!empty($fileNameImag)){$model->image = $fileNameImag;}

			if($model->save())
			{
				Yii::app()->user->setFlash('success', 'Record updated successful.');
				$this->redirect(array('view','id'=>$model->aid));
			}
		}
		
		$max_slide_model=HomePageSlideSetting::model()->findByPk(1);
		
		$this->render('update',array(
			'model'=>$model,'nav'=>$nav,'price_model'=>$price_model,'max_slide_model'=>$max_slide_model
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
		$dataProvider=new CActiveDataProvider('Ads');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$nav = 'Home Page Image >> List';
		// $surl="http://$_SERVER[HTTP_HOST]/index_new.php/ads/success";#For Live
		// $furl="http://$_SERVER[HTTP_HOST]/index_new.php/ads/failure";#For Live
		$surl="http://$_SERVER[HTTP_HOST]/citynext/index_new.php/ads/success";#For Local
		$furl="http://$_SERVER[HTTP_HOST]/citynext/index_new.php/ads/failure";#For Local
		
		$model=new Ads('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ads']))
			$model->attributes=$_GET['Ads'];

		$this->render('admin',array(
			'model'=>$model,'nav'=>$nav,'surl'=>$surl,'furl'=>$furl
		));
	}

	
	#Start Payment Log insertion
	public function actionInsertpaymentinfo(){
	// print_r($_POST['selectedIds'])	;exit;
		// $domain_name=Yii::app()->getBaseUrl(true);
		// print_r($_POST);exit;
		if(empty($_POST['selectedIds'])){
			echo 'Ads ids not found.';exit;			
		}
		$selected_ads_ids=$_POST['selectedIds'];
		 // echo $product_offer_id;exit;
		$ads_ids=array();
		$ads_rates=array();
		$service_type_ids=array();
		$flag_prefix_to_order1=$flag_prefix_to_order2=0;
		foreach($selected_ads_ids as $ads_id){
			$ads_model=Ads::model()->findByPk($ads_id);
			if($ads_model->show_in==1){
				$slide_type_name='Small Home Page Slider';
				$flag_prefix_to_order2=1;
				$service_type_ids[]=4;
			}else if($ads_model->show_in==0){
				$slide_type_name='Big Home Page Slider';
				$flag_prefix_to_order1=1;
				$service_type_ids[]=3;
			}
				
			$ads_name_rate.=$slide_type_name.' : Rs. '.$ads_model->amount.' for duration '.date('d-m-Y',strtotime($ads_model->start_date)).' to '.$ads_model->validity_days.' days, ';
		
			$total_amount+=$ads_model->amount;
			$ads_ids[]=$ads_model->aid;
			$ads_rates[]=$ads_model->amount;
			
			$current_user=$ads_model->user_id;
		}
		
		$ads_rates=@implode(',',$ads_rates);
		$ads_ids=@implode(',',$ads_ids);
		$service_type_ids=@implode(',',$service_type_ids);
		
		if($flag_prefix_to_order1==1 && $flag_prefix_to_order2==1){
			$prefix_to_order='OR-HPS-1-2-';
		}else if($flag_prefix_to_order1==1){
			$prefix_to_order='OR-HPS-1-';
		}else if($flag_prefix_to_order2==1){
			$prefix_to_order='OR-HPS-2-';
		}
		
		$order_model=new Orders;
		$order_model->service_type_ids=$service_type_ids;
		$order_model->item_ids=$ads_ids;
		$order_model->item_rates=$ads_rates;
		$order_model->total_amount=$total_amount;
		$order_model->ordered_by=$current_user;
		$order_model->ordered_date=date('Y-m-d H:i:s');
		$order_model->save(false);
		
		$order_model->order_no=$prefix_to_order.$order_model->id;
		
		$order_model->save(false);
		
		$vendor_model=Users::model()->findByAttributes(array('uid'=>$current_user));#To fetch & pass all contact info
				
		// $vendor_model`first_name`, `last_name`, `full_name`, `email`, `password`, `business_name`, `address`, `contact_no` 
		
		$productinfo='Payment of Home Page Slider with amount to be paid are '.$ads_name_rate;
		
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
					$ads_model=Ads::model()->findByPk($ads_id);
					$ads_model->payu_payment_logs_id=$txnid;
					$ads_model->save(false);
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
					$ads_model=Ads::model()->findByPk($ads_id);
					$ads_model->payu_payment_logs_id=$txnid;
					$ads_model->save(false);
				}
			}
		}
				
		
		if($hash != $posted_hash){
			$response_text="Invalid Transaction. Please try again";
		}else{
			$response_text="<h3>Your order status is ". $status .".</h3>";
			$response_text.="<h4>Your transaction id for this transaction is ".$txnid.". You may try making the payment by clicking the link below.</h4>";
			$response_text.="<p><a href=".Yii::app()->getBaseUrl(true)."/index_new.php/ads/admin> Try Again</a></p>";
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
	 * @return Ads the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Ads::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ads $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ads-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

<?php
ob_start();
class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public $layout = '//layouts/main';
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$todate = date('Y-m-d');
		$classifieds = Classifieds::model()->findAll( array('condition'=>" to_date <='$todate'"));
		
		foreach( $classifieds as $classified ){
			$obj = Classifieds::model()->findByPk( $classified->id );
			$obj->status = 'Deactive';
			$obj->update();
		}
		
		$ids=0;

		$offers = Productoffers::model()->findAll( array('condition'=>'status ="active"') );

		foreach($offers as $offer){
			$ids.=','.$offer->product_id;
		}

		$slide_limit=HomePageSlideSetting::model()->findByPk(1);
		$max_slide_limit=$slide_limit->f_slide_limit;
		// $products = Products::model()->findAll(array('condition'=>"pid in ( $ids ) and status ='active'"));

		$ads=Ads::model()->findAll(array('condition'=>"show_in=0 AND status ='active' AND '$todate'>=start_date AND '$todate'<=DATE_ADD(start_date,INTERVAL validity_days DAY)",'limit'=>$max_slide_limit));
		
		// $ads2=Ads::model()->findAll(array('condition'=>'show_in=1 AND status ="active"'));
		
		// $news =Cityupdate::model()->findAll(array('condition'=>'status ="active"'));
		$company_ads=Companyads::model()->findByPk(1);
		$product_offer1=ProductOffers::model()->findAll(array('condition'=>"end_date='$todate' AND status='Active'","order" => "created_on DESC", "limit" => 12,"offset"=>0));
		
		/*		$product_offer2=ProductOffers::model()->findAll(array('condition'=>"end_date='$todate' AND status='Active'","order" => "created_on DESC", "limit" => 4,"offset"=>4));
		$product_offer3=ProductOffers::model()->findAll(array('condition'=>"end_date='$todate' AND status='Active'","order" => "created_on DESC", "limit" => 4,"offset"=>8));
		*/ 
		 // print_r($news[0]->attributes);exit;
		 
		$this->render('index',array('products'=>$products, 'ads'=>$ads, 'ads2'=>$ads2,'company_ads'=>$company_ads, 'product_offer1'=>$product_offer1, 'product_offer2'=>$product_offer2, 'product_offer3'=>$product_offer3 ));
	}
	
	public function actionTodayoffer()
	{
		$ids=0;

		$offers = Productoffers::model()->findAll( array('condition'=>'status ="active"') );

		foreach($offers as $offer ){
			if($offer->paymentstatus->status=='success')
				$ids.=','.$offer->product_id;
		}
		
		 $products = Products::model()->findAll(array('condition'=>"pid in ( $ids ) and status ='active'"));

		 $ads=Ads::model()->findAll( array('condition'=>'status ="active"'));

		$this->render('todayoffer',array('products'=>$products, 'ads'=>$ads) );
	}


	public function actionProduct($id)
	{
		
		$cat=mainCategory::model()->findByPk( $id );

		$nav=$cat->category;

		$ids='0';
		$arrs = SubCategory::model()->findAll( array('condition'=>'main_category_id='.$id));

			foreach( $arrs as $arr )
				$ids.=','.$arr->scid;

		$model = Products::model()->findAll( array('condition'=>'sub_category_id in('.$ids.')'));

		$ads=Ads::model()->findAll( array('condition'=>'status ="active"'));

		
		$this->render('products',array('products'=>$model, 'ads'=>$ads,'nav'=>$nav));
	}


	public function actionProducts($id, $uid=0)
	{
		$subcat=SubCategory::model()->findByPk( $id );
		$ids=0;
		$offers = Productoffers::model()->findAll( array('condition'=>'status ="active"') );
		foreach ($offers as $offer ) {
			$ids.=','.$offer->product_id;
		}

		$nav=$subcat->mainCategory->category .' » '.$subcat->sub_category;
		
		$nav="<a href='". Yii::app()->createUrl('site/index')."'>Home</a> » <a href='". Yii::app()->createUrl('site/subcategories',array('id'=>$subcat->mainCategory->mcid))."'>".$subcat->mainCategory->category."</a> » <a>".$subcat->sub_category."</a>";

		$model = Products::model()->findAll( array('condition'=>" pid not in ( $ids ) and user_id= $uid and sub_category_id=$id"));

		$user = Users::model()->findByAttributes(array('uid'=>$uid ),array('condition'=>'status="active"'));
		
		
		
		 $products1 = Products::model()->findAll(array('condition'=>"pid in ( $ids ) and user_id='$uid' and status ='active'"));		

		

		$this->render('products',array('products'=>$model,'products1'=>$products1, 'user'=>$user,'nav'=>$nav ));
	}

	public function actionVendors( $id )
	{
		$subcat=SubCategory::model()->findByPk( $id );

		
		$nav="<a href='". Yii::app()->createUrl('site/index')."'>Home</a> » <a href='". Yii::app()->createUrl('site/subcategories',array('id'=>$subcat->mainCategory->mcid))."'>".$subcat->mainCategory->category."</a> » <a> ". $subcat->sub_category."</a> » <a>Vendors</a>";
		
		$model = Products::model()->findAll( array( 'condition'=>'sub_category_id='.$id ) );

		$ids=0;
		foreach( $model as $u )
		{
			$ids .=','.$u['user_id'];
		}
		
		$model = Users::model()->findAll( array( 'condition'=>"uid in ( $ids )" ) );

		$ads=Ads::model()->findAll( array('condition'=>'status ="active"'));		

		$this->render('vendors',array('vendors'=>$model, 'ads'=>$ads,'nav'=>$nav ,'cid'=>$id));
	}
	
	public function actionVendor( $id )
	{
				
		$nav="<a href='". Yii::app()->createUrl('site/index')."'>Home</a> » <a>Vendors</a>";
		
		$model = Products::model()->findAll( array( 'condition'=>'user_id='.$id ) );

				
		//$model = Users::model()->findAll( array( 'condition'=>"uid =  $id " ) );	

		$this->render('vendor',array('products'=>$model, 'nav'=>$nav ));
	}

	public function actionSearch()
	{
		
		$ads=Ads::model()->findAll(array('condition'=>'status ="active"'));
		$nav='search';
		$model=array();

		$condition=$_POST['search'];

		if($condition!='')
		{
			$criteria=new CDbCriteria;			
			$criteria->addSearchCondition('product', $condition);
			$model = Products::model()->findAll($criteria);

			  $dataProvider=new CActiveDataProvider('Products', 
			  	array('criteria' => $criteria, ));

				$this->render('search',array('dataProvider'=>$dataProvider,'products'=>$model, 'ads'=>$ads,'nav'=>$nav));


		}
		else
		{
			//$this->redirect(Yii::app()->request->urlReferrer);


			$model = Products::model()->findAll();
		//	$this->render('search',array('products'=>$model, 'ads'=>$ads,'nav'=>$nav ));

			$dataProvider=new CActiveDataProvider('Products');
				$this->render('search',array('dataProvider'=>$dataProvider,'products'=>$model, 'ads'=>$ads,'nav'=>$nav));

			//$this->render('search',array('products'=>$model, 'ads'=>$ads,'nav'=>$nav ));	
		}
		//$model = Products::model()->findAll( array('condition'=>'product LIKE '.$condition));

		//$this->render('search',array('products'=>$model, 'ads'=>$ads,'nav'=>$nav ));
	}

	public function actionProductdetails($id)
	{
		$model = Products::model()->findByPk($id);

		$this->render('product_details',array('product'=>$model));
	}

	public function actionBuy()
	{
		

		 $categories = mainCategory::model()->findAll();

		 $ads=Ads::model()->findAll( array('condition'=>'status ="active"'));

		$this->render('buy',array('categories'=>$categories, 'ads'=>$ads) );

	}

	public function actionSubcategories( $id )
	{
		$cat=mainCategory::model()->findByPk( $id );

		$nav="<a href='". Yii::app()->createUrl('site/index')."'>Home</a> » <a>".$cat->category."</a>";

		$categories = SubCategory::model()->findAll( array('condition'=>'main_category_id='.$id ));

		$ads=Ads::model()->findAll( array('condition'=>'status ="active"'));
		
		

		$this->render('sub_category',array('categories'=>$categories, 'ads'=>$ads ,'nav'=>$nav) );

	}
	
	public function actionClassifiedtypes()
	{
		$nav="Classified's Types";
		
		$nav="<a href='". Yii::app()->createUrl('site/index')."'>Home</a> » <a>Classified's Types</a>";
		
		$classifiedtypes = Classifiedtype::model()->findAll( array('order'=>'name '));
		
		$this->render('classified_types',array('classifiedtypes'=>$classifiedtypes,'nav'=>$nav));

	}
	
	public function actionClassifieds($id)
	{
		$nav="Classifieds";
		
		$nav="<a href='". Yii::app()->createUrl('site/index')."'>Home</a> » <a href='". Yii::app()->createUrl('site/classifiedtypes')."'>Classifieds</a>";
		
		$classifieds = Classifieds::model()->findAll(array('condition'=>"classified_id=$id AND status='Active'"));
		 
		$this->render('classifieds',array('classifieds'=>$classifieds,'nav'=>$nav) );
	}
	
	public function actionCondolences()
	{
		// $nav="Condolences";
		// $todate=date('Y-m-d');
		
		$nav="<a href='". Yii::app()->createUrl('site/index')."'>Home</a> » <a>Obituaries</a>";
		
		// $condolences = Condolences::model()->findAll(array('condition'=>"status='Active' AND '$todate'>=date AND '$todate'<=DATE_ADD(date,INTERVAL 3 DAY) "));
		
		$condolences = Condolences::model()->findAllBySql("SELECT * FROM condolences WHERE status='Active' AND DATE_FORMAT(NOW()+ INTERVAL 1 DAY,'%Y-%m-%d')>=date AND DATE_FORMAT(NOW()+ INTERVAL 1 DAY,'%Y-%m-%d')<=DATE_ADD(date,INTERVAL 3 DAY) ORDER BY created_on DESC ");
		 
		$this->render('condolences',array('condolences'=>$condolences,'nav'=>$nav));
	}
	
	public function actionCondolencedetails($id)
	{
		$model = Condolences::model()->findByPk($id);
		$this->render('condolence_details',array('condolence'=>$model));
	}
	
	public function actionClassifieddetails($id)
	{
		$model = Classifieds::model()->findByPk($id);
		$this->render('classified_details',array('classified'=>$model));
	}

	public function actionNews($id)
	{
		$model = Cityupdate::model()->findByPk($id);
		$this->render('news',array('model'=>$model));
	}
	public function actionRegister() {
		$model=new Users;
		$model->scenario='personal';
		if(isset($_POST['Users'])) {
			
			$model->attributes=$_POST['Users'];
			$model->full_name=ucwords($model->first_name.' '.$model->last_name );
			$model->dob=date('Y-m-d',strtotime($model->dob));
			if($model->save()) {
				// echo '<pre>';
				// print_r($_POST);
				// print_r($model->attributes);exit;
				
				$sms_cust_reg='Dear '.ucwords($model->first_name).', ';
				$sms_cust_reg.='Thank you for showing your interest in CITYNEXT. Your account would be activated within 24 hrs.';
				$cust_reg_mobile=$model->contact_no;
				$this->SMS($sms_cust_reg, $cust_reg_mobile, $default_user_id=0);
				
				$imgLocation=Yii::app()->basePath.'/../upload/profile/';
				$fileNameImag=CommonFunctions::FileUpload($model,'photo',$imgLocation);
				if(!empty($fileNameImag)){ $model->photo = $fileNameImag;}
					
				$this->redirect(array('site/index'));
			}
		}
		$this->render('register',array('model'=>$model));
	}
	public function actionSellerregister()
	{
		$model=new Users;
		$model->scenario='seller';
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];		
			
			$model->full_name=ucwords($model->first_name.' '.$model->last_name );
			$model->dob=date('Y-m-d',strtotime($model->dob));

			$sub_cat='';
			if($_POST['sub_cat'])
			{
				foreach ($_POST['sub_cat'] as $key ) {
					$sub_cat.=$key.',';
				}
			}
			if($sub_cat!='')
				$model->sub_category_id=$sub_cat;

			if($model->save())
			{
				// echo '<pre>';
				// print_r($_POST);
				// print_r($model->attributes);exit;
				$sms_cust_reg='Dear '.ucwords($model->first_name).', ';
				$sms_cust_reg.='Thank you for showing your interest in CITYNEXT. Your account would be activated within 24 hrs.';
				$cust_reg_mobile=$model->contact_no;
				$this->SMS($sms_cust_reg, $cust_reg_mobile, $default_user_id=0);
				
				$imgLocation=Yii::app()->basePath.'/../upload/profile/';			
				$fileNameImag=CommonFunctions::FileUpload($model,'photo',$imgLocation);
				if(!empty($fileNameImag)){ $model->photo = $fileNameImag;}
				
				$this->redirect(array('site/index'));
				
			}
		}
		$this->render('seller',array('model'=>$model));
	}
	public function actionCard()
	{
		$model = '';
		$this->render('card',array('model'=>$model));
	}

	public function actionCheckout()
	{
		$model = '';
		$this->render('checkout',array('model'=>$model));
	}

	public function actionMyaccount()
	{

		if (Yii::app()->user->isGuest){
			$this->redirect(array('/site/login'));
		}else{

			$this->redirect(array('//users/view'));
		}

	}




	public function actionAboutus()
	{
		$model = '';
		$this->render('about-us',array('model'=>$model));
	}

	public function actionCareers()
	{
		$model= Careers::model()->findAll();

		
		$this->render('careers',array('model'=>$model));
	}

	public function actionJobapply( $id )
	{
		$model=new Career;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Career']))
		{
			$model->attributes=$_POST['Career'];
			
			$model->career_id=$id;

			$imgLocation=Yii::app()->basePath.'/../upload/resumes/';			
			$fileNameImag=CommonFunctions::FileUpload($model,'resume',$imgLocation);
			if(!empty($fileNameImag)){ $model->resume = $fileNameImag;}

			if($model->save()){
				$sms_career='Dear '.ucwords($model->name).', ';
				$sms_career.='we have received your resume and other details and shall get back to you soon.';
				$career_mobile=$model->mobile;
				$this->SMS( $sms_career, $career_mobile, $default_user_id=0 );
				Yii::app()->user->setFlash('success', 'Submited information successful.');
			}
		}
		$this->render('jobapply',array('model'=>$model));
	}
	public function actionPolicy()
	{
		$model = '';
		$this->render('policy',array('model'=>$model));
	}
	public function actionContactus()
	{
		$model=new Contactus;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Contactus']))
		{
			$model->attributes=$_POST['Contactus'];
			if($model->save())
			{
				Yii::app()->user->setFlash('contactus', 'Submited information successful.');
				
			}
		}

		
		$this->render('contact-us',array('model'=>$model));
	}


	public function actionFeedback()
	{
		$model=new Feedback;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Feedback']))
		{
			$model->attributes=$_POST['Feedback'];
			if($model->save())
			{
				$sms_feedback='Dear '.ucwords($model->name).', ';
				$sms_feedback.='We are thankful for your valuable Feedback. We assure you of the best of our services';
				$feedback_mobile=$model->phone_no;
				$this->SMS( $sms_feedback, $feedback_mobile, $default_user_id=0 );
				Yii::app()->user->setFlash('feedback', 'Submited Feedback successful.');
				
			}
		}

		
		$this->render('feedback',array('model'=>$model));
	}

	public function actionEnquiry()
	{
		$model=new Contactus;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Contactus']))
		{
			$model->attributes=$_POST['Contactus'];

			if($model->save())
			{
				$sms_enquiry='Dear '.ucwords($model->name).', ';
				$sms_enquiry.='we have received your enquiry and shall get back to you soon.';
				$enquiry_mobile=$model->phone_no;
				
				$this->SMS( $sms_enquiry, $enquiry_mobile, $default_user_id=0 );
				Yii::app()->user->setFlash('enquiry', 'Submited information successful.');
				
			}
		}
		
		$this->render('enquiry',array('model'=>$model));
	}

	public function actionSitemap()
	{
		$model = '';
		$this->render('sitemap',array('model'=>$model));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

    
    public function actionForgot()
	{
	        $getEmail=$_POST['Lupa']['email'];
		
            $getModel= Users::model()->findByAttributes(array('email'=>$getEmail));
              if(isset($_POST['Lupa']))
            {
                $getToken=rand(0, 99999);
                $getTime=date("H:i:s");
                $getModel->token=md5($getToken.$getTime);
                $namaPengirim="Byuer and worker";
                $emailadmin="fahmi.j@programmer.net";
                $subjek="Reset Password";
				$setpesan.="Your Password".$model->password."\n";
                $setpesan="<h3>Your Forget Password:</h4>"."&nbsp;&nbsp;&nbsp;&nbsp;"."<strong>".$getModel->password."</strong>";
                if($getModel)
                 { 
			    $model = Users::model()->findByPk(Yii::app()->user->getState('uid'));
                $name='=?UTF-8?B?'.base64_encode($namaPengirim).'?=';
                $subject='=?UTF-8?B?'.base64_encode($subjek).'?=';
                $headers="From: $name <{$emailadmin}>\r\n".
				//$headers.="Your Password".($model->password)."\n";
                    "Reply-To: {$emailadmin}\r\n".
                    "MIME-Version: 1.0\r\n".
                    "Content-type: text/html; charset=UTF-8";
					 $model_new = new Users;
                     $model_new->save();
                     Yii::app()->user->setFlash('forgot','link to reset your password has been sent to your email');
                     mail($getEmail,$subject,$setpesan,$headers);
                     $this->refresh();
				 }
           }
        $this->render('forgot');
    }


	/**
	 * Displays the login page
	 */


	public function actionLogin()
	{
		$model=new LoginForm2;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm2']))
		{
			$model->attributes=$_POST['LoginForm2'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				echo ',1,'.$_POST['LoginForm2']['cname'].','.$_POST['LoginForm2']['aname'];
			else
				echo ',0,'.$_POST['LoginForm2']['cname'].','.$_POST['LoginForm2']['aname'];
				//$this->redirect(Yii::app()->user->returnUrl);
		}
		else
		{
			// display the login form
			$this->redirect(Yii::app()->user->returnUrl);
			// echo 0;
			//$this->render('login',array('model'=>$model));
		}
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionForgotvalidate()
	{
		$email=$_POST['email'];

		$record=Users::model()->findByAttributes(array('email'=>"$email"));

		if( $record)
			echo 1;
		else
			echo 2;
	}

	public function actionForgotpassword() {
		$email=trim($_GET['e']);

		$model=Users::model()->findByAttributes(array('email'=>"$email"));

		if(!empty($_POST['yt0'])) {
			$message = 'Your password is: '.$model->password;
			$to = $model->email;
			$subject = 'Citynext:Forgot Password';
			$from_email='info@citynext.co.in';
			$this->sendemail($to,$subject,$message,$from_email);
			
			$this->redirect(array('/site/index'));
		}
			
		if(!empty($_POST['yt1'])){
			$sms = 'Your password is: '.$model->password;
			$mobile_no = $model->contact_no;
			$user_id = $model->uid;
			
			$this->SMS( $sms, $mobile_no, $user_id );
			$this->redirect(array('/site/index'));
		}
		
		if( $model )
			$this->render('forgotpassword',array('model'=>$model));
		else
			$this->redirect(array('/site/index'));
	}
	public function sendPasswordOnMobile(){
		
		$email=trim($_POST['email']);
		$model = Users::model()->findByAttributes(array('email'=>"$email"));
		
		$sms = 'Your password is: '.$model->password;
		$mobile_no = $model->contact_no;
		$user_id = $model->uid;
		
		if($this->SMS( $sms, $mobile_no, $user_id ))
			return 1;
		else
			return 0;
	}
	

	public function actionPopup()
	{
		$this->render('popup');
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


	public function actionRequestproduct()
	{
		
		$owner_id=$_POST['owner_id'];
		$product_id=$_POST['product_id'];
		$message=$_POST['message'];
		$buyer_id=Yii::app()->user->getState('uid');
		if($owner_id>0 and $buyer_id>0 and $message!='')
		{
			$model = new BuyRequest;
			$model->owner_id=$owner_id;
			$model->buyer_id=$buyer_id;
			$model->product_id=$product_id;
			$model->message=$message;
			$model->insert();
			echo 1;
		} else{
			echo 0;
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

	public function actionSellercategory()
	{
		$cat_id=$_POST['cat_id'];
		if($cat_id>0)
		$data=SubCategory::model()->findAll('main_category_id='.$cat_id );

		if($data)
		{
			foreach ($data as $key ) {
				 echo '<input type="checkbox" name="sub_cat[]" value="'.$key->scid.'"> '.ucwords( $key->sub_category) .'<br>';
				
			}
			
		}
		else
		{
			echo 'Sorry ! No Sub Category';
		}
	}
	
	public function actionVouchers() {
		$nav = 'Discount Vouchers';
		$model = Users::model()->findAll(array('condition'=>'status="Active"'));
		$this->render('vouchers',array('vendors'=>$model,'nav'=>$nav ));
	}
	
	public function actionVoucherdetails( $id )
	{
		$nav = 'Details Discount Vouchers';
			
		$model = Users::model()->findByPk( $id );

		$this->render('voucher_details',array('vendor'=>$model,'nav'=>$nav ));		
	}
	
	public function actionReservevoucher(  )
	{
		
		$vid = $_POST['vid'];
		
			
		$voucher = Discountvouchers::model()->findByPk( $vid );
		
		if( $voucher->total > 0 && Yii::app()->user->getState('uid')>0 )
		{
			//$voucher->total -= 1;
			//$voucher->update();

			$obj = new Reservevouchers;
			$obj->user_id    = Yii::app()->user->getState('uid');
			$obj->voucher_id = $voucher->id;
			$obj->status ='Pending';
			$obj->insert();	

			$user = Users::model()->findByPk( Yii::app()->user->getState('uid') );
			$vendor = Users::model()->findByPk( $voucher->vender_id );
			
			$sms_user = 'Dear '.ucwords( $user->first_name ).',';
			$sms_user .= $voucher->description.'.';
			$sms_user .= 'Your voucher code is :'.$voucher->code.', ';
			$sms_user .= 'Valid upto :'.$voucher->to_date.'. ';
			
			if(!empty($vendor->business_name)){
				$msg_to_show='at '.ucwords($vendor->business_name);
			}else if(!empty($vendor->first_name)){
				$msg_to_show='to '.ucwords($vendor->first_name);
			}
			
			//$sms_user .= 'Please contact '.$vendor->first_name.' '.$vendor->last_name.' '.$vendor->address.' '.$vendor->contact_no.'. ';			
			$sms_user .= 'Show this massage '.$msg_to_show.', '.$vendor->contact_no.' ';			
			$sms_user .= 'and avail your offer.';			
			$mobile_user = $user->contact_no;
			$this->SMS( $sms_user, $mobile_user, $user->uid );
			
			
			$sms_vendor = 'Dear Sir/Madam, ';
			$sms_vendor .= 'Your Discount Voucher Code is '.$voucher->code.' has been received by '.ucwords( $user->first_name ).', '.$user->contact_no.'.';
			$mobile_vendor = $vendor->contact_no;
			$this->SMS( $sms_vendor, $mobile_vendor, $vendor->uid );
			
		}
		
	}
	
	
}
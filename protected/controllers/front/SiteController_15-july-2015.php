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
		
		foreach( $classifieds as $classified )
		{
			
			$obj = Classifieds::model()->findByPk( $classified->id );
			$obj->status = 'Deactive';
			$obj->update();
			
		}
		
		
		
		$ids=0;

		$offers = Productoffers::model()->findAll( array('condition'=>'status ="active"') );

		foreach ($offers as $offer ) {
			$ids.=','.$offer->product_id;
		}
		
		// $products = Products::model()->findAll(array('condition'=>"pid in ( $ids ) and status ='active'"));

		$ads=Ads::model()->findAll( array('condition'=>'show_in=0 AND status ="active"'));
		$ads2=Ads::model()->findAll( array('condition'=>'show_in=1 AND status ="active"'));
		
		$news =Cityupdate::model()->findAll( /*array('condition'=>'status ="active"')*/);
		
		//echo $this->SMS('hi Laxman','9970404897',1);
		$this->render('index',array('products'=>$products, 'ads'=>$ads, 'ads2'=>$ads2, 'news'=>$news ) );
	}
	
	public function actionTodayoffer()
	{
		$ids=0;

		$offers = Productoffers::model()->findAll( array('condition'=>'status ="active"') );

		foreach ($offers as $offer ) {
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

		$nav=$subcat->mainCategory->category .' » '.$subcat->sub_category;

		$model = Products::model()->findAll( array('condition'=>"user_id= $uid and sub_category_id=$id"));

		$ads=Ads::model()->findAll( array('condition'=>'status ="active"'));

		

		$this->render('products',array('products'=>$model, 'ads'=>$ads,'nav'=>$nav ));
	}

	public function actionVendors( $id )
	{
		$subcat=SubCategory::model()->findByPk( $id );

		$nav=$subcat->mainCategory->category .' » '.$subcat->sub_category.' » '.' Vendors';

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

	public function actionSearch()
	{
		
			$ads=Ads::model()->findAll( array('condition'=>'status ="active"'));
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

		$nav=$cat->category;

		$categories = SubCategory::model()->findAll( array('condition'=>'main_category_id='.$id ));

		$ads=Ads::model()->findAll( array('condition'=>'status ="active"'));
		
		

		$this->render('sub_category',array('categories'=>$categories, 'ads'=>$ads ,'nav'=>$nav) );

	}
	
	public function actionClassifieds()
	{
		$nav="Classifieds";
		
		$classifieds = Classifieds::model()->findAll( array('condition'=>'status="Active"'));
		
		$this->render('classifieds',array('classifieds'=>$classifieds,'nav'=>$nav) );

	}
	
	public function actionCondolences()
	{
		$nav="Condolences";
		$Condolences = Condolences::model()->findAll();
		$this->render('condolences',array('condolences'=>$Condolences,'nav'=>$nav) );
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
	public function actionRegister()
	{
		$model=new Users;
		$model->scenario='personal';
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];		
			$model->full_name=ucwords($model->first_name.' '.$model->last_name );
			if($model->save())
			{
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

			if($model->save())
				Yii::app()->user->setFlash('success', 'Submited information successful.');
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
				echo 1;
			else
				echo 0;
				//$this->redirect(Yii::app()->user->returnUrl);
		}
		else
		{
			// display the login form
			
			echo 0;
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

	public function actionForgotpassword()
	{
		$email=$_GET['e'];

		$model=Users::model()->findByAttributes(array('email'=>"$email"));

		if( $model )
			$this->render('forgotpassword',array('model'=>$model));
		else
			$this->redirect(array('/site/index'));	
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
	
	public function actionVouchers()
	{
		$nav = 'Discount Vouchers';
			
		$model = Users::model()->findAll( );

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
			
			$sms_user = 'Hi '.ucwords( $user->first_name ).',';
			$sms_user .= 'Your discount voucher is '.$voucher->code.', ';
			$sms_user .= 'Please contact '.$vendor->first_name.' '.$vendor->last_name.' '.$vendor->address.' '.$vendor->contact_no.'. ';			
			$mobile_user = $user->contact_no;
			$this->SMS( $sms_user, $mobile_user, $user->uid );
			
			
			$sms_vendor = 'Hi '.ucwords( $vendor->first_name ).',';
			$sms_vendor .= 'Discount Voucher no is '.$voucher->code.' Request By '.ucwords( $user->first_name ).' Mobile No '.$user->contact_no;
			$mobile_vendor = $vendor->contact_no;
			$this->SMS( $sms_vendor, $mobile_vendor, $vendor->uid );
			
		}
		
	}
	
	
}
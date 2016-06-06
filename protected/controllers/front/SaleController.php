<?php
ob_start();
class SaleController extends Controller
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
		$ids=0;

		$offers = Productoffers::model()->findAll( array('condition'=>'status ="active"') );

		foreach ($offers as $offer ) {
			$ids.=','.$offer->product_id;
		}

		 $products = Products::model()->findAll(array('condition'=>"pid in ( $ids ) and status ='active'"));

		 $ads=Ads::model()->findAll( array('condition'=>'status ="active"'));

		$this->render('index',array('products'=>$products, 'ads'=>$ads) );
	}


	public function actionProduct($id)
	{
		
		$cat=mainCategory::model()->findByPk( $id );

		$nav=$cat->category;

		$ids='0';
		$arrs = SubCategory::model()->findAll( array('condition'=>'main_category_id='.$id));

			foreach( $arrs as $arr )
				$ids.=','.$arr->scid;

		$model = Product::model()->findAll( array('condition'=>'sub_category_id in('.$ids.')'));

		$ads=Ads::model()->findAll( array('condition'=>'status ="active"'));

		
		$this->render('products',array('products'=>$model, 'ads'=>$ads,'nav'=>$nav));
	}


	public function actionProducts($id)
	{
		$Maincat=MainCategoryUsed::model()->findByPk( $id );

		$nav="<a href='". Yii::app()->createUrl('site/index')."'>Home</a> » <a href='". Yii::app()->createUrl('sale/sell')."'>Used Products</a> » <a>".$Maincat->category."</a>";

		
		$model = Product::model()->findAll(array('condition'=>"main_category_id=$id AND status='Active' AND '".date('Y-m-d')."'>=activation_date AND '".date('Y-m-d')."'<=DATE_ADD(activation_date, INTERVAL 1 month)"));

		$ads=Ads::model()->findAll( array('condition'=>'status ="active"'));

		

		$this->render('products',array('products'=>$model, 'ads'=>$ads,'nav'=>$nav ));
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
		$model = Product::model()->findByPk($id);

		$this->render('product_details',array('product'=>$model));
	}

	public function actionSubcategories( $id )
	{
		$cat=mainCategory::model()->findByPk( $id );

		$nav=$cat->category;

		$categories = SubCategory::model()->findAll( array('condition'=>'main_category_id='.$id ));

		$ads=Ads::model()->findAll( array('condition'=>'status ="active"'));
		
		

		$this->render('sub_category',array('categories'=>$categories, 'ads'=>$ads ,'nav'=>$nav) );

	}

	public function actionSell()
	{	
		$categories = mainCategoryUsed::model()->findAll();
		
		$nav="<a href='". Yii::app()->createUrl('site/index')."'>Home</a> » <a>used products</a>";

		$ads=Ads::model()->findAll( array('condition'=>'status ="active"'));

		$this->render('sell',array('categories'=>$categories, 'ads'=>$ads,'nav'=>$nav) );
		//$this->render('sell');
	}



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


}
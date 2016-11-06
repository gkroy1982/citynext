<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;

$this->title="Dashboard";
?>

<style>
.active_count{
	background-color: #7CCD7C !important; 
}
.inactive_count{
	background-color: #FF6A6A !important;
}
</style>
<div class="sortable row-fluid">

	<div class="well span3 top-block" style="margin-left: 2.5641%! important;">
		<a data-rel="tooltip" title=""  href="<?php echo Yii::app()->createUrl("users/admin"); ?>">
		Customers
		</a>
		
		<?php 
			$active_users_model = Users::model()->findAllByAttributes(array('status'=> 'Active','user_type'=>1));
			$active_users_count = count($active_users_model);
			if($active_users_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("users/admin",array('status'=>'Active','user_type'=>1)); ?>" title="Active Customers">
		<span class="badge badge-info pull-right active_count"><?php echo $active_users_count; ?></span>
		</a>
		<?php } ?>
		
		<?php 
			$inactive_users_model = Users::model()->findAllByAttributes(array('status'=> 'Inactive','user_type'=>1));
			$inactive_users_count = count($inactive_users_model);
			if($inactive_users_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("users/admin",array('status'=>'Inactive','user_type'=>1)); ?>" title="Inactive Customers" >
		<span class="badge badge-info pull-right inactive_count" ><?php echo $inactive_users_count; ?></span>
		</a>
		<?php 
			}
		?>
	</div>
	
	<div class="well span3 top-block">
		<a data-rel="tooltip" title=""  href="<?php echo Yii::app()->createUrl("users/admin") ?>">
		Dealers
		</a>
		<?php 
			$active_vendor_model = Users::model()->findAllByAttributes(array('status'=> 'Active','user_type'=>2));
			$active_vendor_count = count($active_vendor_model);
			if($active_vendor_count>=1){
		?>		
		<a href="<?php echo Yii::app()->createUrl("users/admin",array('status'=>'Active','user_type'=>2)); ?>" title="Active Dealers">
		<span class="badge badge-info pull-right active_count"><?php echo $active_vendor_count; ?></span>
		</a>
		<?php 
			}
		?>
		
		<?php 
			$inactive_vendor_model = Users::model()->findAllByAttributes(array('status'=> 'Inactive','user_type'=>2));
			$inactive_vendor_count = count($inactive_vendor_model);
			if($inactive_vendor_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("users/admin",array('status'=>'Inactive','user_type'=>2)); ?>" title="Inactive Dealers" >
		<span class="badge badge-info pull-right inactive_count" ><?php echo $inactive_vendor_count; ?></span>
		</a>
		<?php 
			}
		?>
	</div>

	<div class="well span3 top-block">
		<a data-rel="tooltip" title=""  href="<?php echo Yii::app()->createUrl("maincategory/admin") ?>">
		Categories
		</a> 
		<?php 
			$mainCategory_model = MainCategory::model()->findAll();
			$mainCategory_count = count($mainCategory_model);
			if($mainCategory_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("maincategory/admin"); ?>" title="Active Categories">
		<span class="badge badge-info pull-right active_count"><?php echo $mainCategory_count; ?></span>
		</a>
		<?php 
			}
		?>
	</div>

	<div class="well span3 top-block">
	
		<a data-rel="tooltip" title=""  href="<?php echo Yii::app()->createUrl("subcategory/admin") ?>">
		Sub Categories
		</a> 
		<a href="<?php echo Yii::app()->createUrl("subcategory/admin"); ?>" title="Active Sub Categories">
		<span class="badge badge-info pull-right active_count">
		<?php 
			$subproducts_model = SubCategory::model()->findAll();
			$subproducts_count = count($subproducts_model);
			echo $subproducts_count;
		?>
		</span>
		</a>
	</div>
	
	<div class="well span3 top-block">
		<a data-rel="tooltip" title=""  href="<?php echo Yii::app()->createUrl("products/admin") ?>">
		Products
		</a> 
		<?php 
			$products_model = Products::model()->findAllByAttributes(array('status'=> 'Active'));
			$products_count = count($products_model);
			if($products_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("products/admin",array('status'=> 'Active')); ?>" title="Active Products">
			<span class="badge badge-info pull-right active_count"><?php echo $products_count;?></span>
		</a>
		<?php 
			} 
			$products_model = Products::model()->findAllByAttributes(array('status'=> 'Inactive'));
			$products_count = count($products_model);
			if($products_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("products/admin",array('status'=> 'Inactive')); ?>" title="Inactive Products">
			<span class="badge badge-info pull-right inactive_count" ><?php echo $products_count; ?></span>
		</a>
		<?php } ?>
	</div>

	<div class="well span3 top-block">
		<a data-rel="tooltip" title=""  href="<?php echo Yii::app()->createUrl("ads/admin") ?>">
		Ads List
		</a> 
		<?php
			$ads_model = Ads::model()->findAllByAttributes(array('status'=> 'Active'));
			$ads_count_active = count($ads_model);
			if($ads_count_active>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("ads/admin",array('status'=> 'Active')); ?>" title="Active Ads">
			<span class="badge badge-info pull-right active_count"><?php echo $ads_count_active; ?></span>
		</a>
		<?php } ?>
		<?php
			$ads_model_in = Ads::model()->findAllByAttributes(array('status'=> 'Inactive'));
			$ads_count_in = count($ads_model_in);
			if($ads_count_in>=1){
		?>
		
		<a href="<?php echo Yii::app()->createUrl("ads/admin",array('status'=> 'Inactive')); ?>" title="Inactive Ads">
			<span class="badge badge-info pull-right inactive_count" ><?php echo $ads_count_in; ?></span>
		</a>
		<?php } ?>
	</div>

	<div class="well span3 top-block">
		<a data-rel="tooltip" title=""  href="<?php echo Yii::app()->createUrl("contactus/admin") ?>">
		Contact Us
		</a> 
		<?php 
			$contactus_model = Contactus::model()->findAll(); //returns AR objects
			$contactus_count = count($contactus_model);
			if($contactus_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("contactus/admin"); ?>" title="Active Contact Us">
			<span class="badge badge-info pull-right active_count"><?php echo $contactus_count; ?></span>
		</a>
		<?php } ?>
	</div>

	<div class="well span3 top-block">
		<a data-rel="tooltip" title=""  href="<?php echo Yii::app()->createUrl("feedback/admin") ?>">
		Feedback
		</a>
		<?php 
			$feedback_model = Feedback::model()->findAll(); //returns AR objects
			$feedback_count = count($feedback_model);
			if($feedback_count>=1){
		?>		
		<a href="<?php echo Yii::app()->createUrl("feedback/admin"); ?>" title="Active Feedback">
			<span class="badge badge-info pull-right active_count"><?php echo $feedback_count; ?></span>
		</a>
		<?php } ?>
	</div>
	<div>
	
	<?php
/*
	$this->widget('ext.gaCounter.ExtGoogleAnalyticsCounter', array(
        'lastYearChart' => true,
        'title' => 'Last year',
        'width' => 660,
        'height' => 300)
    );
    $this->widget('ext.gaCounter.ExtGoogleAnalyticsCounter', array(
        'lastMonthChart' => true,
        'title' => 'Last month',
        'width' => 400)
    );
    $this->widget('ext.gaCounter.ExtGoogleAnalyticsCounter', array(
        'customDateChart' => true,
        'startDate' => date('Y-m-d', strtotime('-1 week')),
        'endDate' => date("Y-m-d"),
        'typeChart' => 'day',  //day or month. Default is month
        'title' => 'Last week') //Optional
    );
	*/
?>
	</div>


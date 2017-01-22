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

	<!--div class="well span3 top-block col-sm-3" style="margin-left: 2.5641%! important;"-->
	<div class="well span3 top-block col-sm-3" style="margin-left: 2.5641%! important;">
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
	
	<div class="well span3 top-block col-sm-3">
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

	<div class="well span3 top-block col-sm-3">
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

	<div class="well span4 top-block col-sm-3">
		<a data-rel="tooltip" title=""  href="<?php echo Yii::app()->createUrl("ads/admin") ?>">
		Home Page Slide
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

	<div class="well span3 top-block col-sm-3">
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

	<div class="well span3 top-block col-sm-3">
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
	
	<div class="well span3 top-block" style="margin-left: 2.5641%! important;">
		<a data-rel="tooltip" title=""  href="<?php echo Yii::app()->createUrl("classifieds/admin"); ?>">
		Classifieds
		</a>
		
		<?php 
			$active_classifieds_model = Classifieds::model()->findAllByAttributes(array('status'=> 'Active'));
			$active_classifieds_count = count($active_classifieds_model);
			if($active_classifieds_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("classifieds/admin",array('status'=>'Active')); ?>" title="Active Classifieds">
		<span class="badge badge-info pull-right active_count"><?php echo $active_classifieds_count; ?></span>
		</a>
		<?php } ?>
		
		<?php 
			$inactive_classifieds_model = Classifieds::model()->findAllByAttributes(array('status'=> 'Inactive'));
			$inactive_classifieds_count = count($inactive_classifieds_model);
			if($inactive_classifieds_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("classifieds/admin",array('status'=>'Inactive')); ?>" title="Inactive Classifieds" >
		<span class="badge badge-info pull-right inactive_count" ><?php echo $inactive_classifieds_count; ?></span>
		</a>
		<?php 
			}
		?>
	</div>
	
	<div class="well span4 top-block col-sm-3">
		<a data-rel="tooltip" title=""  href="<?php echo Yii::app()->createUrl("discountvouchers/admin"); ?>">
		Discount Vouchers
		</a>
		
		<?php 
			$active_discountvouchers_model = Discountvouchers::model()->findAllByAttributes(array('status'=> 'Active'));
			$active_discountvouchers_count = count($active_discountvouchers_model);
			if($active_discountvouchers_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("discountvouchers/admin",array('status'=>'Active')); ?>" title="Active Discount Vouchers">
		<span class="badge badge-info pull-right active_count"><?php echo $active_discountvouchers_count; ?></span>
		</a>
		<?php } ?>
		
		<?php 
			$inactive_discountvouchers_model = Discountvouchers::model()->findAllByAttributes(array('status'=> 'Inactive'));
			$inactive_discountvouchers_count = count($inactive_discountvouchers_model);
			if($inactive_discountvouchers_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("discountvouchers/admin",array('status'=>'Inactive')); ?>" title="Inactive Discount Vouchers" >
		<span class="badge badge-info pull-right inactive_count" ><?php echo $inactive_discountvouchers_count; ?></span>
		</a>
		<?php 
			}
		?>
	</div>
	
	<div class="well span3 top-block col-sm-3">
		<a data-rel="tooltip" title=""  href="<?php echo Yii::app()->createUrl("cityupdate/admin"); ?>">
		City Updates
		</a>
		
		<?php 
			$active_cityupdate_model = Cityupdate::model()->findAllByAttributes(array('status'=> 'Active'));
			$active_cityupdate_count = count($active_cityupdate_model);
			if($active_cityupdate_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("cityupdate/admin",array('status'=>'Active')); ?>" title="Active City Updates">
		<span class="badge badge-info pull-right active_count"><?php echo $active_cityupdate_count; ?></span>
		</a>
		<?php } ?>
		
		<?php 
			$inactive_cityupdate_model = Cityupdate::model()->findAllByAttributes(array('status'=> 'Inactive'));
			$inactive_cityupdate_count = count($inactive_cityupdate_model);
			if($inactive_cityupdate_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("cityupdate/admin",array('status'=>'Inactive')); ?>" title="Inactive City Updates" >
		<span class="badge badge-info pull-right inactive_count" ><?php echo $inactive_cityupdate_count; ?></span>
		</a>
		<?php 
			}
		?>
	</div>
		
	<div class="well span3 top-block col-sm-3">
		<a data-rel="tooltip" title=""  href="<?php echo Yii::app()->createUrl("marquee/admin"); ?>">
		Marquee
		</a>
		
		<?php 
			$active_marquee_model = Marquee::model()->findAll();
			$active_marquee_count = count($active_marquee_model);
			if($active_marquee_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("cityupdate/admin"); ?>" title="Active Marquee">
		<span class="badge badge-info pull-right active_count"><?php echo $active_marquee_count; ?></span>
		</a>
		<?php } ?>
		
	</div>
	
	<div class="well span4 top-block col-sm-3">
		<a data-rel="tooltip" title=""  href="<?php echo Yii::app()->createUrl("product/admin"); ?>">
		Used Products
		</a>
		
		<?php 
			$active_usedproduct_model = Product::model()->findAllByAttributes(array('status'=> 'Active'));
			$active_usedproduct_count = count($active_usedproduct_model);
			if($active_usedproduct_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("product/admin",array('status'=>'Active')); ?>" title="Active Used Products">
		<span class="badge badge-info pull-right active_count"><?php echo $active_usedproduct_count; ?></span>
		</a>
		<?php } ?>
		
		<?php 
			$inactive_usedproduct_model = Product::model()->findAllByAttributes(array('status'=> 'Inactive'));
			$inactive_usedproduct_count = count($inactive_usedproduct_model);
			if($inactive_usedproduct_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("product/admin",array('status'=>'Inactive')); ?>" title="Inactive Used Products" >
		<span class="badge badge-info pull-right inactive_count" ><?php echo $inactive_usedproduct_count; ?></span>
		</a>
		<?php 
			}
		?>
	</div>
	
	
	<div class="well span3 top-block col-sm-3">
		<a data-rel="tooltip" title=""  href="<?php echo Yii::app()->createUrl("condolences/admin"); ?>">
		Obituaries 
		</a>
		
		<?php 
			$active_condolences_model = Condolences::model()->findAllByAttributes(array('status'=> 'Active'));
			$active_condolences_count = count($active_condolences_model);
			if($active_condolences_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("condolences/admin"); ?>" title="Active Obituaries">
		<span class="badge badge-info pull-right active_count"><?php echo $active_condolences_count; ?></span>
		</a>
		<?php } ?>
		
		<?php 
			$inactive_condolences_model = Condolences::model()->findAllByAttributes(array('status'=> 'Inactive'));
			$inactive_condolences_count = count($inactive_condolences_model);
			if($inactive_condolences_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("condolences/admin"); ?>" title="Active Obituaries">
		<span class="badge badge-info pull-right inactive_count"><?php echo $inactive_condolences_count; ?></span>
		</a>
		<?php } ?>
		
	</div>
	
	
	<div class="well span3 top-block col-sm-3">
		<a data-rel="tooltip" title=""  href="<?php echo Yii::app()->createUrl("feedback/admin"); ?>">
		Feedback
		</a>
		
		<?php 
			// $active_feedback_model = Feedback::model()->findAllByAttributes(array('read'=> 'read'));
			$active_feedback_model = Feedback::model()->findAll();
			$active_feedback_count = count($active_feedback_model);
			if($active_feedback_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("feedback/admin"); ?>" title="All Feedback">
		<span class="badge badge-info pull-right active_count"><?php echo $active_feedback_count; ?></span>
		</a>
		<?php } ?>
		
		<?php 
			// $inactive_feedback_model = Feedback::model()->findAllByAttributes(array('read'=> 'unread'));
			// $inactive_feedback_count = count($inactive_feedback_model);
			// if($inactive_feedback_count>=1){
		?>
		<!--a href="<?php echo Yii::app()->createUrl("feedback/admin",array('read'=>'unread')); ?>" title="Unread Feedbacks" >
		<span class="badge badge-info pull-right inactive_count" ><?php echo $inactive_feedback_count; ?></span>
		</a-->
		<?php 
			// }
		?>
	</div>
	
	<div class="well span3 top-block col-sm-3">
		<a data-rel="tooltip" title=""  href="<?php echo Yii::app()->createUrl("contactus/admin"); ?>">
		Enquiries
		</a>
		
		<?php 
			// $active_feedback_model = Feedback::model()->findAllByAttributes(array('read'=> 'read'));
			$active_contactus_model = Contactus::model()->findAll();
			$active_contactus_count = count($active_contactus_model);
			if($active_contactus_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("contactus/admin"); ?>" title="Read Enquiries">
		<span class="badge badge-info pull-right active_count"><?php echo $active_contactus_count; ?></span>
		</a>
		<?php } ?>
		
		<?php 
			// $inactive_contactus_model = Contactus::model()->findAllByAttributes(array('read'=> 'unread'));
			// $inactive_contactus_count = count($inactive_contactus_model);
			// if($inactive_contactus_count>=1){
		?>
		<!--a href="<?php echo Yii::app()->createUrl("contactus/admin",array('read'=>'unread')); ?>" title="Unread Contactus" >
		<span class="badge badge-info pull-right inactive_count" ><?php echo $inactive_contactus_count; ?></span>
		</a-->
		<?php 
			// }
		?>
	</div>
	
	<div class="well span3 top-block col-sm-3">
		<a data-rel="tooltip" title=""  href="<?php echo Yii::app()->createUrl("productoffers/admin"); ?>">
		Today's Offer
		</a>
		
		<?php 
			$active_productoffers_model = ProductOffers::model()->findAllByAttributes(array('status'=> 'Active'));
			$active_productoffers_count = count($active_productoffers_model);
			if($active_productoffers_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("productoffers/admin"); ?>" title="Active Obituaries">
		<span class="badge badge-info pull-right active_count"><?php echo $active_productoffers_count; ?></span>
		</a>
		<?php } ?>
		
		<?php 
			$inactive_productoffers_model = ProductOffers::model()->findAllByAttributes(array('status'=> 'Inactive'));
			$inactive_productoffers_count = count($inactive_productoffers_model);
			if($inactive_productoffers_count>=1){
		?>
		<a href="<?php echo Yii::app()->createUrl("productoffers/admin"); ?>" title="Active Obituaries">
		<span class="badge badge-info pull-right inactive_count"><?php echo $inactive_productoffers_count; ?></span>
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


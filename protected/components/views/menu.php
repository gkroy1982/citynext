
<?php
	$controller=Yii::app()->controller->id;
	$action=Yii::app()->controller->action->id;
	
	if(strtolower($controller)=="site")$site='class="active"';

	if(strtolower($controller)=="users")$users='class="active"';
	//if(strtolower($controller)=="cityupdate")$cityupdate='class="active"';
	if(strtolower($controller)=="maincategory")$mc='class="active"';
	if(strtolower($controller)=="maincategoryused")$mcu='class="active"';
	if(strtolower($controller)=="subcategory")$sc='class="active"';
	if(strtolower($controller)=="version")$v='class="active"';
	if(strtolower($controller)=="products")$p='class="active"';
	//if(strtolower($controller)=="product")$s='class="active"';
	//if(strtolower($controller)=="ads")$ads='class="active"';
	if(strtolower($controller)=="offer")$offer='class="active"';
	if(strtolower($controller)=="question")$question='class="active"';
	if(strtolower($controller)=="productoffers")$offpro='class="active"';
	if(strtolower($controller)=="area")$area='class="active"';
	//if(strtolower($controller)=="contactus")$contactus='class="active"';
	//if(strtolower($controller)=="feedback")$feedback='class="active"';

	if(strtolower($controller)=="career")$career='class="active"';
	if(strtolower($controller)=="careers")$career='class="active"';
	//if(strtolower($controller)=="marquee")$marquee='class="active"';

	if(strtolower($controller)=="states")$states='class="active"';
	if(strtolower($controller)=="city")$city='class="active"';
	//if(strtolower($controller)=="classifieds")$classified='class="active"';
	if(strtolower($controller)=="classifiedtype")$classifiedtype='class="active"';
	// if(strtolower($controller)=="bulksms")$bulksms='class="active"';
	if(strtolower($controller)=="companyads")$company_ads='class="active"';
	if(strtolower($controller)=="orders")$orders='class="active"';
?>
   <div class="span3" id="sidebar">
		<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse  " style="margin-top:4%;">
			
			<li <?php echo $site; ?> ><a class="ajax-link" href="<?php echo Yii::app()->homeUrl?>">
			<span class="hidden-tablet">Dashboard</span><i class="icon-chevron-right"></i> </a></li>

			<li <?php echo $orders; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/orders/index") ?>">
			<span class="hidden-tablet">Orders</span><i class="icon-chevron-right"></i> </a>
			
			<!--li <?php echo $mc; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/maincategory/admin") ?>">
			<span class="hidden-tablet"> Main Category </span><i class="icon-chevron-right"></i> </a>
	
			<li <?php echo $sc; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/subcategory/admin") ?>">
			<span class="hidden-tablet"> Sub Category </span><i class="icon-chevron-right"></i> </a>
			
			<li <?php echo $mcu; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/maincategoryused/admin") ?>">
			<span class="hidden-tablet"> Used Product Category </span><i class="icon-chevron-right"></i> </a>

			<li <?php echo $classifiedtype; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/classifiedtype/admin") ?>">
			<span class="hidden-tablet"> Classified Category </span><i class="icon-chevron-right"></i> </a-->
			
			<!--li <?php echo $classified; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/classifieds/admin") ?>">
			<span class="hidden-tablet"> Classifieds </span><i class="icon-chevron-right"></i> </a-->
			
			<!--li <?php echo $cityupdate; ?> ><a class="ajax-link" href="<?php  echo Yii::app()->createUrl("/cityupdate/admin") ?>">
			<span class="hidden-tablet"> City Updates </span><i class="icon-chevron-right"></i> </a-->

			<li <?php echo $p; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/products/admin") ?>">
			<span class="hidden-tablet"> Products</span><i class="icon-chevron-right"></i> </a>

			<!--li <?php echo $s; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/product/admin") ?>">
			<span class="hidden-tablet"> Used Products </span><i class="icon-chevron-right"></i> </a-->

			<li <?php echo $offpro; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/productoffers/admin") ?>">
			<span class="hidden-tablet">Today's Offer</span><i class="icon-chevron-right"></i> </a>

			<!--li <?php echo $ads; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/ads/admin") ?>">
			<span class="hidden-tablet"> Ads List</span><i class="icon-chevron-right"></i> </a-->


			<!--li <?php echo $offer; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/offer/admin") ?>">
			<span class="hidden-tablet"> Offers days List</span><i class="icon-chevron-right"></i> </a-->

			<!--li <?php echo $question; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/question/admin") ?>">
			<span class="hidden-tablet"> Questions List</span><i class="icon-chevron-right"></i> </a-->
			
			<!--li <?php echo $marquee; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/marquee/admin") ?>">
			<span class="hidden-tablet"> Marquee List</span><i class="icon-chevron-right"></i> </a-->


			<li <?php echo $users; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/users/admin") ?>">
			<span class="hidden-tablet"> Users List </span><i class="icon-chevron-right"></i> </a>
		
			<!--li <?php echo $contactus; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/contactus/admin") ?>">
			<span class="hidden-tablet"> Enquiry List </span><i class="icon-chevron-right"></i> </a-->

			<!--li <?php echo $feedback; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/feedback/admin") ?>">
			<span class="hidden-tablet"> Feedback List </span><i class="icon-chevron-right"></i> </a-->

			<!--li <?php echo $states; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/states/admin") ?>">
			<span class="hidden-tablet"> States List </span><i class="icon-chevron-right"></i> </a>

			<li <?php echo $city; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/city/admin") ?>">
			<span class="hidden-tablet"> City List </span><i class="icon-chevron-right"></i> </a>
			
			<li <?php echo $area; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/area/admin") ?>">
			<span class="hidden-tablet"> Area List </span><i class="icon-chevron-right"></i> </a-->
			
			<li <?php echo $career; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/career/admin") ?>">
			<span class="hidden-tablet"> Career List </span><i class="icon-chevron-right"></i> </a>
			
			<!--li <?php echo $bulksms; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/bulksms/bulksms") ?>"><span class="hidden-tablet"> Bulk SMS </span><i class="icon-chevron-right"></i> </a-->
			
			<li <?php echo $company_ads; ?> ><a class="ajax-link" href="<?php echo Yii::app()->createUrl("/companyads/index") ?>"><span class="hidden-tablet"> Company Ads </span><i class="icon-chevron-right"></i> </a>
			
		</ul>
		
</div>

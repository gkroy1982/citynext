<?php 

$url = Yii::app()->theme->baseUrl; 

 $letest = Products::model()->findAll();
 $specials = Products::model()->findAll();
 $p_url=Yii::app()->baseUrl.'/upload/products/'; 
//$products=array();

	$controller = Yii::app()->controller->id;
    $action     = Yii::app()->controller->action->id;
    $url = Yii::app()->theme->baseUrl; 

  if( $controller=='users' and $action=='view')
      $profile_view='active';
  if( $controller=='users' and $action=='update')
      $profile_update='active';

?>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


  <!--Left Part-->
  <div id="column-left">
    <!--Categories Part Start-->
    <div class="box">
      <!-- Categories -->
      <div class="row sidebar-box purple">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
			<div class="sidebar-box-heading" id="sideMenuHeading">
				<i class="icons icon-folder-open-empty"></i>
				<h4>Profile</h4>
			</div>
			<div class="sidebar-box-content" id="sideMenuContent">
				<ul>
					<li><a href="<?php echo Yii::app()->createUrl('users/view',array('id'=>Yii::app()->user->getState('uid')));?>">View Profile</a></li>
					<li><a href="<?php echo Yii::app()->createUrl('users/update',array('id'=>Yii::app()->user->getState('uid')));?>">Update Profile</a></li>
				</ul>
			</div>
			<div class="sidebar-box-heading" id="sideMenuHeading1">
				<i class="icons icon-align-justify"></i>
				<h4>Menu</h4>
			</div>
			<div class="sidebar-box-content" id="sideMenuContent1">
				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
					  <div class=" carousel-heading " style="margin-bottom:0px">
						<h5 class="panel-title" style="padding: 4px;">
						  <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" >Used Products</a>
						</h5>
					  </div>
					  <div id="collapse1" class="panel-collapse collapse in">
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<ul>
										<li><a href="<?php echo Yii::app()->createUrl('saleproduct/admin')?>">View</a></li>
										<li><a href="<?php echo Yii::app()->createUrl('saleproduct/create')?>">Add</a></li>
									</ul>
								</div>
							</div>
						</div>
					  </div>
					</div>
					<div class="panel panel-default">
					  <div class=" carousel-heading " style="margin-bottom:0px">
						<h5 class="panel-title" style="padding: 4px;">
						  <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Classifieds</a>
						</h5>
					  </div>
					  <div id="collapse2" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<ul>
										<li><a href="<?php echo Yii::app()->createUrl('classifieds/admin')?>">View</a></li>
										<li><a href="<?php echo Yii::app()->createUrl('classifieds/create')?>">Add</a></li>
									</ul>
								</div>
							</div>
						</div>
					  </div>
					</div>
					<div class="panel panel-default">
					  <div class=" carousel-heading " style="margin-bottom:0px">
						<h5 class="panel-title" style="padding: 4px;">
						  <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">City Updates</a>
						</h5>
					  </div>
					  <div id="collapse3" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<ul>
										<li><a href="<?php echo Yii::app()->createUrl('cityupdate/admin')?>">View</a></li>
										<li><a href="<?php echo Yii::app()->createUrl('cityupdate/create')?>">Add</a></li>
									</ul>
								</div>
							</div>
						</div>
					  </div>
					</div>
					<div class="panel panel-default">
					  <div class=" carousel-heading " style="margin-bottom:0px">
						<h5 class="panel-title" style="padding: 4px;">
						  <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Obituaries</a>
						</h5>
					  </div>
					  <div id="collapse4" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<ul>
										<li><a href="<?php echo Yii::app()->createUrl('condolences/admin')?>">View</a></li>
										<li><a href="<?php echo Yii::app()->createUrl('condolences/create')?>">Add</a></li>
									</ul>
								</div>
							</div>
						</div>
					  </div>
					</div>
					<div class="panel panel-default">
					  <div class=" carousel-heading " style="margin-bottom:0px">
						<h5 class="panel-title" style="padding: 4px;">
						  <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Products / Services</a>
						</h5>
					  </div>
					  <div id="collapse5" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<ul>
										<li><a href="<?php echo Yii::app()->createUrl('products/admin')?>">View</a></li>
										<li><a href="<?php echo Yii::app()->createUrl('products/create')?>">Add</a></li>
									</ul>
								</div>
							</div>
						</div>
					  </div>
					</div>
					<div class="panel panel-default">
					  <div class=" carousel-heading " style="margin-bottom:0px">
						<h5 class="panel-title" style="padding: 4px;">
						  <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Today's Offers</a>
						</h5>
					  </div>
					  <div id="collapse6" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<ul>
										<li><a href="<?php echo Yii::app()->createUrl('productoffers/admin')?>">View</a></li>
										<li><a href="<?php echo Yii::app()->createUrl('productoffers/create')?>">Add</a></li>
									</ul>
								</div>
							</div>
						</div>
					  </div>
					</div>
					<div class="panel panel-default">
					  <div class=" carousel-heading " style="margin-bottom:0px">
						<h5 class="panel-title" style="padding: 4px;">
						  <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">Home Page Image</a>
						</h5>
					  </div>
					  <div id="collapse7" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<ul>
										<li><a href="<?php echo Yii::app()->createUrl('ads/admin')?>">View</a></li>
										<li><a href="<?php echo Yii::app()->createUrl('ads/create')?>">Add</a></li>
									</ul>
								</div>
							</div>
						</div>
					  </div>
					</div>
					<div class="panel panel-default">
					  <div class=" carousel-heading " style="margin-bottom:0px">
						<h5 class="panel-title" style="padding: 4px;">
						  <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">Discount Vouchers</a>
						</h5>
					  </div>
					  <div id="collapse8" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<ul>
										<li><a href="<?php echo Yii::app()->createUrl('discountvouchers/admin')?>">View</a></li>
										<li><a href="<?php echo Yii::app()->createUrl('discountvouchers/create')?>">Add</a></li>
									</ul>
								</div>
							</div>
						</div>
					  </div>
					</div>
				</div>
					
			</div>
		</div>
      </div>
      <!-- /Categories -->

    </div>
    <!--Categories Part End-->
    <!--Latest Product Start-->

  </div>
  <!--Left End-->
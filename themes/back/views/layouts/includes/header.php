<!DOCTYPE php>
<php class="no-js">
    
    <head>
        <title>Admin Panel</title>
        <!-- Bootstrap -->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/css/bootstrap.min.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/css/bootstrap-responsive.min.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/easypiechart/jquery.easy-pie-chart.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/styles.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/additional.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/fullcalendar/fullcalendar.css" media="screen"/>
		
		
        
        <!-- php5 shim, for IE6-8 support of php5 elements -->
        <!--[if lt IE 9]>
            <script src="http://php5shim.googlecode.com/svn/trunk/php5.js"></script>
        <![endif]-->
		
       
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <?php $userid=Yii::app()->user->getState("userid");?>
                    <a class="brand" href="#">Admin Panel</a>
                    <div class="nav-collapse collapse">
                        
						<ul class="nav pull-left">
                            <li class="dropdown-submenu multi-level">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list"></i> Master Lists <i class="caret1"></i></a>
								<ul class="dropdown-menu">

									<li><a href="<?php echo Yii::app()->createUrl("/maincategory/admin") ?>">Main Category</a></li>
									<li><a href="<?php echo Yii::app()->createUrl("/subcategory/admin") ?>">Sub Category</a></li>
									<li><a href="<?php echo Yii::app()->createUrl("/maincategoryused/admin") ?>">Used Product Category</a></li>
									<li><a href="<?php echo Yii::app()->createUrl("/classifiedtype/admin") ?>">Classified Category</a></li>
									<li><a href="<?php echo Yii::app()->createUrl("/question/admin") ?>">Questions List</a></li>
									<li><a href="<?php echo Yii::app()->createUrl("/states/admin") ?>">States List</a></li>
									<li><a href="<?php echo Yii::app()->createUrl("/city/admin") ?>">City List</a></li>
									<li><a href="<?php echo Yii::app()->createUrl("/area/admin") ?>">Area List</a></li>
																		
									<!--li><a href="<?php echo Yii::app()->createUrl("/marquee/admin") ?>">Contact Us</a></li-->
									<!--li class="dropdown-submenu">
										<a tabindex="-1" href="#">Classifieds</a>
										<ul class="dropdown-menu">
										  <li><a tabindex="-1" href="#">View</a></li>
										  <li><a tabindex="-1" href="#">Add</a></li>
										 </ul>
									</li-->
									<!--li class="dropdown-submenu">
										<a tabindex="-1" href="#">Hover me for more options</a>
										<ul class="dropdown-menu">
										  <li><a tabindex="-1" href="#">Second level</a></li>
										  <li class="dropdown-submenu">
											<a href="#">Even More..</a>
											<ul class="dropdown-menu">
												<li><a href="#">3rd level</a></li>
												<li><a href="#">3rd level</a></li>
											</ul>
										  </li>
										  <li><a href="#">Second level</a></li>
										  <li><a href="#">Second level</a></li>
										</ul>
									 </li-->
                                </ul>
							</li>
						</ul>
						
						<ul class="nav pull-left">
                            <li class="dropdown-submenu multi-level">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list"></i> Settings <i class="caret1"></i></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo Yii::app()->createUrl("/homepageslidesetting/index") ?>">Home Page Slide Setting</a></li>
									<li class="dropdown-submenu">
										<a tabindex="-1" href="#">Price Settings</a>
										<ul class="dropdown-menu">
										  <li><a tabindex="-1" href="<?php echo Yii::app()->createUrl("/homepageslidepricesetting/admin") ?>">Home Page Slide Price Setting</a></li>
										  <li><a tabindex="-1" href="<?php echo Yii::app()->createUrl("/discountvoucherpricesetting/index") ?>">Discount Voucher Price Setting</a></li>
										  <li><a tabindex="-1" href="<?php echo Yii::app()->createUrl("/offer/admin") ?>">Today's Offer Price Setting</a></li>
										 </ul>
									</li>
								</ul>
							</li>
                        </ul>
						
						<ul class="nav pull-left">
                            <li class="dropdown-submenu multi-level">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list"></i> Marketing <i class="caret1"></i></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo Yii::app()->createUrl("/bulksms/bulksms") ?>">Send SMS To Internal Users</a></li>
									<li><a href="<?php echo Yii::app()->createUrl("/bulksms/bulksmsexcel") ?>">Send SMS To External Users</a></li>
								</ul>
							</li>
						</ul>
						
						
						<ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="<?php echo Yii::app()->createUrl("/user/update/$userid") ?>" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php echo ucwords(Yii::app()->user->name)?> <i class="caret"></i></a>
								
                                <!--ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="<?php echo Yii::app()->createUrl("/user/update/$userid") ?>">Profile</a>
                                    </li>
									<li>
										<a href="<?php echo Yii::app()->createUrl("/user/change_password/$userid") ?>">
											Change Password
										</a>
									</li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="<?php echo Yii::app()->createUrl("/site/logout") ?>">Logout</a>
                                    </li>
                                </ul-->
                            </li>

                            <li>
                                <a href="<?php echo Yii::app()->createUrl("/user/change_password/$userid") ?>">
                                    Change Password
                                </a>
                            </li>
                            <li>
                                <a tabindex="-1" href="<?php echo Yii::app()->createUrl("/site/logout") ?>">Logout</a>
                            </li>
                        </ul>

                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
  
<?php 
    $controller = Yii::app()->controller->id;
    $action     = Yii::app()->controller->action->id;
    $url = Yii::app()->theme->baseUrl; 
	
	$home='class="home"';
	$aboutus='';
	$contactus='';
	$feedback='';
	$enquiry='';
	$careers='';
	if( $action=='aboutus')
			$aboutus='class="home active"';
			if( $action=='contactus')
			$contactus='class="home active"';
			if( $action=='feedback')
			$feedback='class="home active"';
			if( $action=='enquiry')
			$enquiry='class="home active"';
			if( $action=='careers')
			$careers='class="home active"';
	if( $action=='index')
			$home='class="home active"';
?>


    <!-- Header -->
    <header class="row">

      <div class="col-lg-12 col-md-12 col-sm-12">

        <!-- Top Header -->
        <div id="top-header">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              
   <div class="card" style="text-align:center;margin-bottom: 2px;">
<marquee style="height:20px;" onmouseover="this.stop();" onmouseout="this.start();">
    <p style="color:#CB6465;margin-top:-5px">
    <?php 

    $links=Marquee::model()->findAll();
    $cnt=1;
    foreach ($links as $link ) {

    	if($cnt==1)
    		echo ' <b> <a href="'.$link->link .'">'.$link->title .'</a> </b>';
    	else
    		echo ' &nbsp;&nbsp;|&nbsp;&nbsp;  <b> <a href="'.$link->link .'">'.$link->title .'</a> </b>';	
    	$cnt++;
    }

    ?>
      </p>
</marquee>
</div>
            </div>
          </div>

        </div>
        <!-- /Top Header -->



        <!-- Main Header -->
        <div id="main-header">

          <div class="row">

            <div id="logo" class="logo col-lg-4 col-md-4 col-sm-4 col-xs-6">			
              <a href="<?php echo Yii::app()->createUrl('//site/index')?>">
				<img src="<?php echo $url; ?>/image/logo.png" alt="Logo">
			  </a>
            </div>

			<nav class="login col-lg-8 col-md-8 col-sm-8 col-xs-6">
              <ul class="pull-right" id="top-header">
			  
				<?php 
				if(!Yii::app()->user->isGuest) {
					$user = Users::model()->findByPk(Yii::app()->user->getState('uid'));
				?>				   
					 <li><a href="<?php echo Yii::app()->createUrl('//site/myaccount')?>"><i class="icons icon-user-3"></i>
					 <?php 
					 if( $user->user_type==2 ) {
						 echo ucwords($user->business_name);
					 } else {
						 echo ucwords($user->first_name);
					 } 
					 ?>
					 </a></li>
					 <li><a href="<?php echo Yii::app()->createUrl('//site/logout')?>"><i class="icons icon-user-3"></i>Logout</a></li>					
					<?php 
				  } else {
					?>
					<li><a href="<?php echo Yii::app()->createUrl('//site/register')?>"><i class="icons icon-user-3"></i>Register</a> </li>
					
					<!--<a href="<?php echo Yii::app()->createUrl('//site/login')?>">login</a> --> 
					<!--a id="modal_trigger" href="#modal">Login</a-->      
				

                <li class="purple"><a href="#"><i class="icons icon-lock"></i> Login</a>
                  <ul id="login-dropdown" class="box-dropdown">
                    <li>
                      <div class="box-wrapper">
                        <h4>LOGIN</h4>
						<?php 
						$form=$this->beginWidget('CActiveForm', array(
							'id'=>'login-form',
							'enableClientValidation'=>true,
							'clientOptions'=>array('validateOnSubmit'=>true),
							'htmlOptions'=>array("class"=>"form-signin"),
						  )
						);
					  ?>
                        <div class="iconic-input">
							<input id="LoginForm2_username" type="text" name="LoginForm2[username]" placeholder="Email"/>
							<i class="icons icon-email"></i>
                        </div>
                        <div class="iconic-input">
							<input id="LoginForm2_password" type="password" name="LoginForm2[password]" placeholder="Password"/>                          
							<i class="icons icon-lock"></i>
                        </div>
						
						<input id="remember" type="checkbox" />
						<label for="remember">Remember me</label>
						
                        <br/>
                        <br/>
                        <div class="pull-left">
							<!-- <div class="one_half last"><a class="btn btn_red">Login</a></div> -->
							<input type="submit" id='login' class="orange" value="Login"/>
                        </div>
						<?php $this->endWidget(); ?>
                        <div class="pull-right">
                          <a href="#">Forgot your Password?</a>
                          <br/>
                        </div>
                        <br class="clearfix"/>
                      </div>
                      <div class="footer">
                        <h4 class="pull-left">New User ?</h4>
							<a class="button pull-right" href="<?php echo Yii::app()->createUrl('/site/register');?>"  > Register</a>
                      </div>
                    </li>
                  </ul>
                </li>
				
				
				  <!-- Username & Password Login form -->
				  <!--
				  <div class="user_login">
					<?php 
						// $form=$this->beginWidget('CActiveForm', array(
							// 'id'=>'login-form',
							// 'enableClientValidation'=>true,
							// 'clientOptions'=>array('validateOnSubmit'=>true),
							// 'htmlOptions'=>array("class"=>"form-signin"),
						  // )
						// );
					  ?>
					  
				  <label>Email </label>				  
				  <input id="LoginForm2_username" type="text" name="LoginForm2[username]"/>
				  <br />
				  
				  <label>Password</label>          
				  <input id="LoginForm2_password" type="password" name="LoginForm2[password]"/>
				  <br />
				  
				  <div class="checkbox">
					<input id="remember" type="checkbox" />
					<label for="remember">Remember me on this computer</label>
				  </div>

				  <div class="action_btns">
					<div class="one_half"><a href="#" class="btn modal_close">Cancel</a></div>
					<div class="one_half last"><a id='login' class="btn btn_red">Login</a></div>
					
				  </div>
					<?php //$this->endWidget(); ?>
					</br>
					<a href="#" id="forgot" style="float:left">Forgot password?</a>

					<a href="<?php echo Yii::app()->createUrl('/site/register');?>" style="float:right">New User ? Register</a>
					</br>
				  </div>
-->
					
					
					<?php 
				  } 
				  ?>
			  
			  
			  
			  
                <!--<li><a href="#"><i class="icons icon-user-3"></i>Register</a></li>-->
              </ul>
            </nav>

          </div>

        </div>
        <!-- /Main Header -->


        <!-- Main Navigation -->
        <nav id="main-navigation" class="style1">
          <ul>

            <li class="home-green current-item">
              <a>
                <span class="nav-caption">Home</span>
              </a>
            </li>

            <li class="red">
              <a href="category_v1.html">
                <span class="nav-caption">Used Products</span>
              </a>

              <ul class="wide-dropdown normalAniamtion">
                <li>
                  <ul>
                    <li><a href="#"><i class="icons icon-right-dir"></i> Digital SLR</a></li>
                    <li><a href="#"><i class="icons icon-right-dir"></i> Point &amp; Shoot</a></li>
                    <li><a href="#"><i class="icons icon-right-dir"></i> Spy, Miniature</a></li>
                  </ul>
                </li>
                <li>
                  <ul>
                    <li><a href="#"><i class="icons icon-right-dir"></i> Background Material</a></li>
                    <li><a href="#"><i class="icons icon-right-dir"></i> Continuous Lighting</a></li>
                    <li><a href="#"><i class="icons icon-right-dir"></i> Flash Lighting</a></li>
                    <li><a href="#"><i class="icons icon-right-dir"></i> Light Meters</a></li>
                  </ul>
                </li>
                <li>
                  <ul>
                    <li><a href="#"><i class="icons icon-right-dir"></i> Batteries</a></li>
                    <li><a href="#"><i class="icons icon-right-dir"></i> Cables &amp; Adapters</a></li>
                    <li><a href="#"><i class="icons icon-right-dir"></i> Camcorder Tapes &amp; Discs</a></li>
                    <li><a href="#"><i class="icons icon-right-dir"></i> Cases, Bags &amp; Covers</a></li>
                  </ul>
                </li>
              </ul>

            </li>

            <li class="blue">
              <a href="category_v2.html">
                <span class="nav-caption">Classifieds</span>
              </a>
            </li>

            <li class="orange">
              <a href="category_v1.html">
                <span class="nav-caption">Obituaries</span>
              </a>
            </li>

            <li class="nav-search">
              <i class="icons icon-search-1"></i>
            </li>

          </ul>

          <div id="search-bar">

            <div class="col-lg-12 col-md-12 col-sm-12">
              <table id="search-bar-table">
                <tr>
                  <td class="search-column-1">
                    <input type="text" placeholder="search for a vendor, product, service or category">
                  </td>
                </tr>
              </table>
            </div>
            <div id="search-button">
              <input type="submit" value="">
              <i class="icons icon-search-1"></i>
            </div>
          </div>

        </nav>
        <!-- /Main Navigation -->

      </div>
    </header>
    <!-- /Header -->


















<!--
<div style="text-align:center;">
    <div id="search" >
      <div class="button-search"></div>
      <input type="text" value="" style="width:70%;" placeholder="search for category and product" id="filter_name" name="search">
    </div>
    </div>-->



  <!--Top Navigation Start-->

   <div id="menu"><span>Menu</span>
    <ul>
      <li <?php echo $home;?>>
        <a  title="Home" href="<?php echo Yii::app()->createUrl('site/index')?>"><span>Home</span></a>
      </li>
	   <li style='margin-left:20px;margin-right:20px;margin-top:10px; width:70%;color:#FFFFFF;'>
	 <!-- <marquee onmouseover="this.stop();" onmouseout="this.start();">
	  <p style="color:#FFFFFF;">
	      <?php
			$links=Marquee::model()->findAll();
			$cnt=1;
			foreach ($links as $link ) {
				if($cnt==1)
					echo ' <b> <a href="'.$link->link .'" style="color:#FFFFFF;">'.$link->title .'</a> </b>';
				else
					echo ' &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <b> <a href="'.$link->link .'" style="color:#FFFFFF;">'.$link->title .'</a> </b>';	
				$cnt++;
			} ?>
	  </p>
	  </marquee>-->
	   </li>
	<li style='float:right;padding-left:10px;'<?php //echo $enquiry;?>><a href="<?php echo Yii::app()->createUrl('site/vouchers')?>">Discount Vouchers</a> &nbsp;&nbsp;&nbsp;&nbsp;</li>
	<li style='float:right;' <?php //echo $enquiry;?>><a href="<?php echo Yii::app()->createUrl('site/todayoffer')?>">Today's Offers</a> </li>
	
      <?php /*
       //$mainMenus=array();
      $mainMenus = MainCategory::model()->findAll();
      foreach($mainMenus as $menu)
      {
        ?>
        <li><a href="<?php echo Yii::app()->createUrl('site/product',array('id'=>$menu->mcid))?>"><?php echo ucwords($menu->category);?></a>
          <div>
            <ul>
              <?php 
                $submenus = SubCategory::model()->findAll( array('condition'=>'main_category_id='.$menu->mcid));
                foreach($submenus as $sub)
                {
                  ?>
                  <li><a href="<?php echo Yii::app()->createUrl('site/products',array('id'=>$sub->scid))?>"><?php echo ucwords($sub->sub_category);?></a></li>                                   
                  <?php
                }
                ?>
            </ul>
          </div>
        </li>
        <?php
      }*/
      ?>
    
    </ul>
  </div>
  <!--Top Navigation Start-->


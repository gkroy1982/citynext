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
  <!-- Header Parts Start-->
  <div id="header">


    <!-- Top Right part Links-->
    <div id="welcome">

    <?php 

    if(!Yii::app()->user->isGuest)
      {

        $user = Users::model()->findByPk(Yii::app()->user->getState('uid'));
        ?>
       <!-- <div class="links"><?php echo ucwords($user->first_name);?>
          <ul>
            <li><a href="<?php echo Yii::app()->createUrl('//site/myaccount')?>">My Account</a></li>          
            <li><a href="<?php echo Yii::app()->createUrl('//card/shoppingcard')?>">Shopping Cart</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('//site/checkout')?>">Checkout</a></li>
          </ul>
        </div>-->
		 <a href="<?php echo Yii::app()->createUrl('//site/myaccount')?>">
		 
		 <?php 
		 if( $user->user_type==2 )
		 {
			 echo ucwords($user->business_name);
		 } else {
			 echo ucwords($user->first_name);
		 }
		 
		 ?></a>
        <a href="<?php echo Yii::app()->createUrl('//site/logout')?>">Logout</a> 
        <?php 
      } else {
        ?>
        <a href="<?php echo Yii::app()->createUrl('//site/register')?>">Register</a> 
        <!--<a href="<?php echo Yii::app()->createUrl('//site/login')?>">login</a> --> 
        <a id="modal_trigger" href="#modal">Login</a>      
        <?php 
      } 
      ?>
      </div>


    <div id="logo">
      <a href="<?php echo Yii::app()->createUrl('//site/index')?>"><img src="<?php echo $url; ?>/image/logo.png"/></a>
    </div>
     

    <div style="float:right; margin-right:15%;">
    <div id="search" >
    <form method="post" name="frm_search" action="<?php echo Yii::app()->createUrl('site/search')?>">
      <div class="button-search">
        
      </div>
      <input type="text" value=""  placeholder="search for a vendor, product, service or category" id="filter_name" name="search">
    </form>
	
    </div>
    </div>


  </div>
 

<script>

$('.button-search').click(function(){
document.frm_search.submit();

});
</script>
<!--
<div style="text-align:center;">
    <div id="search" >
      <div class="button-search"></div>
      <input type="text" value="" style="width:70%;" placeholder="search for category and product" id="filter_name" name="search">
    </div>
    </div>-->



  <!--Top Navigation Start-->

   <div class="card" style="text-align:center;margin-bottom: 2px;">
<marquee style="background-color:peachpuff;height:20px;" onmouseover="this.stop();" onmouseout="this.start();">
    <p style="color:#CB6465;">

    <?php 

    $links=Marquee::model()->findAll();
    $cnt=1;
    foreach ($links as $link ) {

    	if($cnt==1)
    		echo ' <b> <a href="'.$link->link .'">'.$link->title .'</a> </b>';
    	else
    		echo ' &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <b> <a href="'.$link->link .'">'.$link->title .'</a> </b>';	
    	$cnt++;
    }

    ?>
      </p>
</marquee>
</div>
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
 <!--     <li <?php echo $aboutus;?>><a href="<?php echo Yii::app()->createUrl('site/aboutus')?>">About Us</a> </li>
      <li <?php echo $contactus;?>><a href="<?php echo Yii::app()->createUrl('site/contactus')?>">Contact Us</a> </li>
      <li <?php echo $feedback;?>><a href="<?php echo Yii::app()->createUrl('site/feedback')?>">Feedback</a> </li>
 
      <li <?php echo $enquiry;?>><a href="<?php echo Yii::app()->createUrl('site/enquiry')?>">Enquiry</a> </li>
      <li <?php echo $careers;?>><a href="<?php echo Yii::app()->createUrl('site/careers')?>">Careers</a> </li>
-->
     
      
    </ul>
  </div>
  <!--Top Navigation Start-->


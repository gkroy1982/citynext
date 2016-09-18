<?php 
    $controller = Yii::app()->controller->id;
    $action     = Yii::app()->controller->action->id;
    $url = Yii::app()->theme->baseUrl; 
	$url_product = Yii::app()->baseUrl.'/upload/cityupdate/'; 
?>


  <!-- Footer -->
  <footer id="footer" class="row">
    <!-- Upper Footer -->
    <div class="col-lg-12 col-md-12 col-sm-12">
		<div id="upper-footer">
			<div class="row">

			  <!-- Newsletter -->
			  <!--div class="col-lg-7 col-md-7 col-sm-7">
				<form id="newsletter" action="http://inthe7heaven.com/homeshop-html/php/newsletter.php">
				  <h4>Newsletter Sign Up</h4>
				  <input type="text" name="newsletter-email" placeholder="Enter your email address">
				  <input type="submit" name="newsletter-submit" value="Submit">
				</form>
			  </div-->
			  <!-- /Newsletter -->

			  <!-- Social Media -->
			  <div class="col-lg-5 col-md-5 col-sm-5 social-media">
				<h4>Stay Connected</h4>
				<ul>
				  <li class="social-googleplus tooltip-hover" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google+">
					<a href="#"></a>
				  </li>
				  <li class="social-facebook tooltip-hover" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
					<a href="#"></a>
				  </li>
				  <li class="social-twitter tooltip-hover" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
					<a href="#"></a>
				  </li>
				  <!--li class="social-pinterest tooltip-hover" data-toggle="tooltip" data-placement="top" title="Pinterest">
					<a href="#"></a>
				  </li>
				  <li class="social-youtube tooltip-hover" data-toggle="tooltip" data-placement="top" title="Youtube">
					<a href="#"></a>
				  </li-->
				</ul>
			  </div>
			  <!-- /Social Media -->

			</div>
		  </div>
      </div>
    <!-- /Upper Footer -->
	


	
	
	
	 
 



    <!-- Main Footer -->
    <div class="col-lg-12 col-md-12 col-sm-12">

      <div id="main-footer">

        <div class="row">

          <!-- Contact Us -->
          <div class="col-lg-3 col-md-3 col-sm-6 contact-footer-info">
            <h4>Contact Us</h4>
            <ul>
              <li><i class="icons icon-location"></i> Address, City
                <br>State, India, 00000.</li>
              <li><i class="icons icon-mail-alt"></i><a href="mailto:info@jhansishopping.com"> info@jhansishopping.com</a></li>
              <li><i class="icons icon-phone"></i> +1 800 603 6035</li>
              <li><i class="icons icon-print"></i> 000 000 0000</li>
            </ul>
          </div>
          <!-- /Contact Us -->

          <!-- Information -->
          <div class="col-lg-3 col-md-3 col-sm-6 contact-footer-info">
            <h4>Information</h4>
            <ul>
              <li><a href="<?php echo Yii::app()->createUrl('//site/aboutus')?>"><i class="icons icon-right-dir"></i> About Us</a></li>
              <li><a href="<?php echo Yii::app()->createUrl('//site/contactus')?>"><i class="icons icon-right-dir"></i> Contact Us</a></li>
              <li><a href="<?php echo Yii::app()->createUrl('//site/careers')?>"><i class="icons icon-right-dir"></i> Careers</a></li>
              <li><a href="<?php echo Yii::app()->createUrl('//site/enquiry')?>"><i class="icons icon-right-dir"></i> Enquiry</a></li>
              <li><a href="<?php echo Yii::app()->createUrl('//site/feedback')?>"><i class="icons icon-right-dir"></i> Feedback/Suggestions</a></li>
            </ul>
          </div>
          <!-- /Information -->

          <!-- The Service -->
          <div class="col-lg-3 col-md-3 col-sm-6 contact-footer-info">
            <h4>The Service</h4>
            <ul>
              <li><a href="<?php echo Yii::app()->createUrl('//sale/sell')?>"><i class="icons icon-right-dir"></i> Used Products</a></li>
              <li><a href="<?php echo Yii::app()->createUrl('//site/classifiedtypes')?>"><i class="icons icon-right-dir"></i> Classifields</a></li>
              <li><a href="<?php echo Yii::app()->createUrl('//site/condolences')?>"><i class="icons icon-right-dir"></i> Obituaries</a></li>
            </ul>
          </div>
          <!-- /The Service -->

          <!-- City Updates -->
          <!--div class="col-lg-3 col-md-3 col-sm-6 contact-footer-info">
            <h4>City Updates </h4>
            <marquee style="height:200px;" direction="up">
              <?php
			  /*
				$news =Cityupdate::model()->findAll(array('condition'=>'status ="active"'));
				// var_dump($news[0]->attributes);exit;
					foreach($news as $obj ) {
						echo '<a href="'.Yii::app()->createUrl('//site/news',array('id'=>$obj->id)).'">';
						echo "<p><div class='image' style='float:left;'><img src=$url_product$obj->image height='40px' width='40px'></div>
						<div style='color:#0E0C0A;margin:2%; font-size:14px'><strong>
						".ucwords($obj->title)."
						</strong></div>
						<span style='color:#0E0C0A;margin:2%;float:right;'><b>By ". $obj->user->first_name.'</b> '.date('d-m-Y h:s a',strtotime($obj->created_on))."</span></p>";
						echo '</a><br>';
					}
					*/
				?>
            </marquee>
          </div-->
          <!-- /Like us on Facebook -->

        </div>

      </div>

    </div>
    <!-- /Main Footer -->



    <!-- Lower Footer -->
    <div class="col-lg-12 col-md-12 col-sm-12">

      <div id="lower-footer">

        <div class="row">

          <div class="col-lg-6 col-md-6 col-sm-6">
            <p class="copyright"><a href="http://www.Jhansishopping.com" target="_blank">Jhansishopping.com</a>| Shop Master © 2016</p>
          </div>

          <!--div class="col-lg-6 col-md-6 col-sm-6">
            <ul class="payment-list">
              <li class="payment1"></li>
              <li class="payment2"></li>
              <li class="payment3"></li>
              <li class="payment4"></li>
              <li class="payment5"></li>
            </ul>
          </div-->

        </div>

      </div>

    </div>
    <!-- /Lower Footer -->
  </footer>
  <!-- Footer -->

  <div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog modal-sm">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">LOGIN</h4>
        </div>
        <div class="modal-body">
            <div class="box-wrapper">
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
				  <input id="LoginForm2_username" type="text" placeholder = "User Name" name="LoginForm2[username]" />
				  <i class="icons icon-user"></i>
				</div>
				<div class="iconic-input">
				  <input id="LoginForm2_password" type="password" placeholder = "Password" name="LoginForm2[password]" />
				  <i class="icons icon-lock"></i>
				</div>
				
				
				<div class="pull-right">
					<input type="checkbox" id="remember">
					<label for="remember">Remember me</label>
				</div>	
				<div class="pull-left">
				  <a id='login' class="orange btn btn_red">Login</a>
				</div>
				
				<div class="label" >
				  <input id="LoginForm2_cname" type="hidden" name="LoginForm2[cname]" value="<?php echo $this->uniqueid;?>"/>
				</div>
				<div class="label" >
				  <input id="LoginForm2_aname" type="hidden" name="LoginForm2[aname]" value="<?php echo $this->action->Id;?>" />
				</div> 
					<br class="clearfix">
			  </div>
        </div>
				<?php $this->endWidget(); ?>
        <div class="modal-footer">
			<div class="pull-left">
				<a href="<?php echo Yii::app()->createUrl('/site/register');?>">New User ? Register</a>
			</div>
			<div class="pull-right">
				<a id="forgot" href="#">Forgot password?</a>
			</div>
        </div>
      </div>

    </div>
  </div>

  
  
  <!--div id="modal" class="popupContainer" style="display:none;position: absolute!important;">
    <header class="popupHeader ">
      <span class="header_title">Login</span>
      <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>
    
    <section class="popupBody ">
   
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
          <br/>
		  
          <label>Password</label>
          <input id="LoginForm2_password" type="password" name="LoginForm2[password]"/>
          <br/>
		  
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

        <a href="<?php //echo Yii::app()->createUrl('/site/register');?>" style="float:right">New User ? Register</a>
        </br>
      </div> 
    </section>
</div>

  
  
<!--Footer Part End-->
<style>
input[type="checkbox"] {
    display: none;
}
</style>
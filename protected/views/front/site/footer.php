<?php 
    $controller = Yii::app()->controller->id;
    $action     = Yii::app()->controller->action->id;
    $url = Yii::app()->theme->baseUrl; 
?>

<!--Footer Part Start-->



<div id="footer">
  <div class="column">
    <h3>Information</h3>
    <ul>
      <li><a href="<?php echo Yii::app()->createUrl('//site/aboutus')?>">About Us</a></li> 
      <li><a href="<?php echo Yii::app()->createUrl('//site/contactus')?>">Contact Us</a></li>  
      <li><a href="<?php echo Yii::app()->createUrl('site/careers')?>">Careers</a> </li>
      <li><a href="<?php echo Yii::app()->createUrl('site/enquiry')?>">Enquiry</a> </li>
      <li><a href="<?php echo Yii::app()->createUrl('//site/feedback')?>">Feedback/Suggestion</a></li>  
    </ul>
  </div>
  <div class="column">
    <h3> Service</h3>
    <ul>
      <!--li><a href="<?php echo Yii::app()->createUrl('//site/buy')?>">I Want to Buy</a></li-->
      <li><a href="<?php echo Yii::app()->createUrl('//sale/sell')?>">Used Product</a></li>
      <li><a href="<?php echo Yii::app()->createUrl('//site/classifieds')?>">Classifieds</a></li>
      <li><a href="<?php echo Yii::app()->createUrl('//site/condolences')?>">Condolences</a></li>
    </ul>
  </div>


  
  <div class="contact">
    <ul>
      <li class="address">Frist Address, State, India</li>
      <li class="mobile">000 0000 000</li>
      <li class="email"><a href="#">info@jhansishopping.com</a></li>
      <li class="fax">000 0000 000</li>
    </ul>
  </div>
  <div class="social"> 
  <a href="#" target="_blank"><img src="<?php echo $url; ?>/image/facebook.png" alt="Facebook" title="Facebook"></a>
   <a href="#" target="_blank"><img src="<?php echo $url; ?>/image/twitter.png" alt="Twitter" title="Twitter"></a> 
   <a href="#" target="_blank"><img src="<?php echo $url; ?>/image/googleplus.png" alt="Google+" title="Google+"> </a> 
  </div>
  <div class="clear"></div>
  <div id="powered">Jhansishopping.com <a href="#">  | Shop Master </a> &copy; <?php echo date('Y'); ?>
  
    <div class="payments_types"> 
		<?php $this->widget('application.extensions.hitCounter.hitCounter');?>
      </div>
  </div>
</ >

 <div id="modal" class="popupContainer" style="display:none;position: absolute!important;">
    <header class="popupHeader ">
      <span class="header_title">Login</span>
      <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>
    
    <section class="popupBody ">
      <!-- Social Login -->
      
      <!-- Username & Password Login form -->
      <div class="user_login">
        <?php 
            $form=$this->beginWidget('CActiveForm', array(
                'id'=>'login-form',
                'enableClientValidation'=>true,
                'clientOptions'=>array('validateOnSubmit'=>true),
                'htmlOptions'=>array("class"=>"form-signin"),
              )
            );
          ?>
          <label>Email </label>
          

          <input id="LoginForm2_username" type="text" name="LoginForm2[username]">
          <br />

          <label>Password</label>
          
          <input id="LoginForm2_password" type="password" name="LoginForm2[password]">
          <br />

          <div class="checkbox">
            <input id="remember" type="checkbox" />
            <label for="remember">Remember me on this computer</label>
          </div>

          <div class="action_btns">
            <div class="one_half"><a href="#" class="btn modal_close">Cancel</a></div>
            <div class="one_half last"><a id='login' class="btn btn_red">Login</a></div>
			
          </div>
        <?php $this->endWidget(); ?>
        </br>
        <a href="#" id="forgot" style="float:left">Forgot password?</a>

        <a href="<?php echo Yii::app()->createUrl('/site/register');?>" style="float:right">New User ? Register</a>

        </br>
      </div>

 
    </section>
  </div>

  
  
<!--Footer Part End-->

<?php $this->pageTitle='citynext.co.in | Login';?>
  <div id="container">
   <?php $this->renderPartial('left');?>

    <!--Middle Part Start-->
    <div id="content">
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="index.html">Home</a> » <a href="#">Account</a> » <a href="login.html">Login</a> </div>
      <!--Breadcrumb Part End-->
      <h1>Account Login</h1>
      <div class="login-content">
        <div class="left">
         <!-- <h2>New Customer</h2>-->
          <div class="content">
            <p><b>Register Account</b></p>
            <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
            <a class="button" href="<?php echo Yii::app()->createUrl('site/register');?>">Continue</a></div>
        </div>
        <div class="right">
          <h2>Login</h2>
          <?php 
            $form=$this->beginWidget('CActiveForm', array(
                'id'=>'login-form',
                'enableClientValidation'=>true,
                'clientOptions'=>array('validateOnSubmit'=>true),
                'htmlOptions'=>array("class"=>"form-signin"),
              )
            );
          ?>



            <div class="content">
              
              <b>E-Mail Address:</b><br>
              <?php echo $form->textField($model,'username'); ?>
              <?php echo $form->error($model,'username'); ?>
              <br>
              <br>
              <b>Password:</b><br>
              <?php echo $form->passwordField($model,'password'); ?>
              <?php echo $form->error($model,'password'); ?>
              <br>
              <br>
              <a href="#">Forgotten Password</a><br>
              <br>
              
              <?php echo CHtml::submitButton('Login',array("class"=>"button")); ?>
            </div>

        <?php $this->endWidget(); ?>
        </div>
      </div>
    </div>
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>
  </div>
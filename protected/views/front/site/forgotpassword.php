<?php $this->pageTitle='Jhansishopping.com | Forgot Password';?>
  <div id="container">
   <?php $this->renderPartial('left');?>
    <!--Middle Part Start-->
    <!--Middle Part Start-->
    <div id="content">
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"><a href="<?php echo Yii::app()->createUrl('site/index')?>">Home</a> » <a href="#">Forgot Password</a></div>
      <!--Breadcrumb Part End-->
      <h1>Forgot Password</h1>
      
      <p>
      <h2><label><input type="radio" value="1" class="pw" checked="checked" name="newsletter"> Send Password on Email Id</label></h2>
         <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'users-form',
            'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
            'enableAjaxValidation'=>false,
        ));?>
          <div class="content">

          <table class="form">
           <tbody>

              <tr>
                <td><span class="required"></span> Email Id:</td>
                <td>
                    <?php echo $form->textField($model,'email',array('class'=>'large-field','readonly'=>'readonly')); ?>
                    
                </td>
              </tr>
              <tr>
                <td><span class="required"></span> Security Question:</td>
                <td>
                <?php echo CHtml::textField('',$model->question->question,array('class'=>'large-field','readonly'=>'readonly')); ?>
                    
                </td>
              </tr>

              <tr>
                <td><span class="required">*</span>Security Answer:</td>
                <td>
                    <?php echo $form->textField($model,'forgotpassword',array('class'=>'large-field')); ?>
                    <?php echo $form->error($model,'forgotpassword'); ?>
                </td>
              </tr>
            </tbody>
          </table>

              <div class="right">
                <?php echo CHtml::submitButton('Send Email',array('class'=>'button','id'=>'email')); ?>
              </div>
       </div>

        <?php $this->endWidget(); ?>
      </p>

       <p>
      <h2><label><input type="radio" class="pw" value="2" name="newsletter"> Send Password on Mobile</label></h2>
         <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'users-form1',
            'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
            'enableAjaxValidation'=>false,
        ));?>
          <div class="content">

          <table class="form">
           <tbody>

              <tr>
                <td><span class="required"></span> Mobile Number :</td>
                <td>
                    <?php echo $form->textField($model,'contact_no',array('class'=>'large-field','readonly'=>'readonly')); ?>
                    
                </td>
              </tr>   

              
            </tbody>
          </table>

            <div class="right">
                <?php echo CHtml::submitButton('Send SMS',array('class'=>'button','id'=>'sms','disabled'=>"true")); ?>
            </div>
       </div>

        <?php $this->endWidget(); ?>
      </p>


    </div>
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>
  </div>

  <script>
  $('.pw').click(function(){

      var id=$(this).val();
      if(id==2)
      {
        $('#sms').removeAttr('disabled');
        $('#email').attr('disabled','disabled');
      } 
      else
      {
        $("#sms").attr('disabled','disabled');
        $("#email").removeAttr('disabled');
      }
  })
  </script>
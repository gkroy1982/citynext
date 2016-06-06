   <?php $this->pageTitle='Jhansishopping.com | Dealer Account';?>
  <div id="container">
   <?php $this->renderPartial('left');?>

    <!--Middle Part Start-->
    <div id="content">
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="<?php echo Yii::app()->createUrl('site/index');?>">Home</a> » <a href="#">Register</a> </div>
      <!--Breadcrumb Part End-->
      <h1>Register Account</h1>
     

        <?php 

        

        $form=$this->beginWidget('CActiveForm', array(
            'id'=>'users-form',
            'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
            'enableAjaxValidation'=>false,
        )); 


       // echo $form->errorSummary($model);
        $model->user_type = 2;
        echo $form->hiddenField($model,'user_type'); 
        ?>

        <div class="content">
          <table class="form">
            <tbody>
              <tr>
                
                <td>
                <a href="<?php echo Yii::app()->createUrl('site/register');?>"><input type="radio" value="1" name="newsletter">
                    User/Customer Account
                </a>
                </td>
                <td>
                <a href="<?php echo Yii::app()->createUrl('site/sellerregister');?>"><input type="radio" checked="checked" value="2" name="newsletter">
                    Vendor/Seller Account
                </a>
                </td>
              </tr>
              <tr>
                
              </tr>
            </tbody>
          </table>
        </div>
        <h2>Vendor/Seller Account Form</h2>
        <div class="content">

          <table class="form">
           <tbody>
              <tr>
                <td><span class="required">*</span> First Name:</td>
                <td>
                    <?php echo $form->textField($model,'first_name',array('class'=>'large-field')); ?>
                    <?php echo $form->error($model,'first_name'); ?>
                </td>
              </tr>
              <tr>
                <td><span class="required">*</span> Last Name:</td>
                <td>
                    <?php echo $form->textField($model,'last_name',array('class'=>'large-field')); ?>
                    <?php echo $form->error($model,'last_name'); ?>
                </td>
              </tr>
              
			  <tr>
                <td><span class="required">*</span> Date Of Birth:</td>
                <td>
                    <?php echo $form->textField($model,'dob',array('class'=>'large-field datepicker')); ?>
                    <?php echo $form->error($model,'dob'); ?>
                </td>
              </tr>
				  
              <tr id="company-id-display">
                <td><span class="required">*</span>Business/Firm/Brand Name :</td>
                <td>
                    <?php echo $form->textField($model,'business_name',array('class'=>'large-field')); ?>
                    <?php echo $form->error($model,'business_name'); ?>
                </td>
              </tr>  

                <td><span class="required">*</span> Contact No:</td>
                <td>
                    <?php echo $form->textField($model,'contact_no',array('class'=>'large-field')); ?>
                    <?php echo $form->error($model,'contact_no'); ?>
                </td>
              </tr>

              <tr>
                <td><span class="required">*</span> E-Mail:</td>
                <td>
                    <?php echo $form->textField($model,'email',array('class'=>'large-field')); ?>
                    <?php echo $form->error($model,'email'); ?>
                </td>
              </tr>
              <tr>
              <tr>
                <td><span class="required">*</span>Password:</td>
                <td>
                    <?php echo $form->passwordField($model,'password',array('class'=>'large-field')); ?>
                    <?php echo $form->error($model,'password'); ?>
                </td>
              </tr>
               <tr>
                <td><span class="required">*</span>Confirm Password:</td>
                <td>
                    <?php echo $form->passwordField($model,'confirm_pw',array('class'=>'large-field')); ?>
                    <?php echo $form->error($model,'confirm_pw'); ?>
                </td>
              </tr>

            <tr>
                <td><span class="required">*</span> Security Question:</td>
                <td>
                    <?php echo $form->dropDownList($model,'question_id', Question::getQuestion(),array( 'empty'=>'select' ,'class'=>'large-field')); ?>
                    <?php echo $form->error($model,'question_id'); ?>
                </td>
              </tr>

              <tr>
                <td><span class="required">*</span>Security Answer:</td>
                <td>
                    <?php echo $form->textField($model,'answer',array('class'=>'large-field')); ?>
                    <?php echo $form->error($model,'answer'); ?>
                </td>
              </tr>
			 <tr>
                <td> <span class="required">*</span> Address:</td>
                <td>
                    <?php echo $form->textArea($model,'address',array('class'=>'large-field','style'=>'width:41%')); ?>
                    <?php echo $form->error($model,'address'); ?>
                </td>
              </tr>

             

               <tr>
                <td><span class="required">*</span> State:</td>
                <td>
                    <?php echo $form->dropDownList($model,'country',States::getStates(),
                     array(
                    'class'=>'large-field',
                    'empty'=>'Select ',
                    'ajax' => array(
                        'type'=>'POST',
                        'url'=>CController::createUrl('site/cities'),
                        'data'=> array('state_id'=>'js:$(this).val()'),
                        'update'=>"#Users_city",
                        ) )); ?>
                    <?php echo $form->error($model,'country'); ?>
                </td>
              </tr>

              <tr>
                <td><span class="required">*</span> City:</td>
                <td>
                    <?php echo $form->dropDownList($model,'city',City::getCity(),array('empty'=>'Select','class'=>'large-field')); ?>
                    <?php echo $form->error($model,'city'); ?>
                </td>
              </tr>

              <tr>
                <td><span class="required" id="postcode-required">*</span> Pin Code:</td>
                <td>
                    <?php echo $form->textField($model,'post_code',array('class'=>'large-field')); ?>
                    <?php echo $form->error($model,'post_code'); ?>
                </td>
              </tr>
	
              <!--
              <tr>
                <td><span class="required">*</span> Category:</td>
                <td>
                    <?php echo $form->dropDownList($model,'main_category_id',MainCategory::getMainCategory(),
                     array(
                    'class'=>'large-field',
                    'empty'=>'Select ',
                    'ajax' => array(
                        'type'=>'POST',
                        'url'=>CController::createUrl('site/sellercategory'),
                        'data'=> array('cat_id'=>'js:$(this).val()'),
                        'update'=>"#subcat",
                        ) )); ?>
                    <?php echo $form->error($model,'main_category_id'); ?>
                </td>
              </tr>

              <tr>
                <td><span class="required">*</span> Sub Category:</td>
                <td>
                <style>
                .cat
                {
                	background: none repeat scroll 0 0 #f8f8f8;
				    border: 1px solid #cccccc;
				    padding: 7px 2px;
				    overflow: auto; 
				    width: 42%; 
				    height: 30px; 
				}
                </style>
                    <div id="subcat" class="cat">
                    	

                    </div>
                    <?php echo $form->error($model,'sub_category_id'); ?>
                </td>
              </tr>-->


             
              
              <tr>
                <td> Profile Image :</td>
                <td>
                    <?php echo $form->fileField($model,'photo'); ?>
                     <?php echo $form->error($model,'photo'); ?>
                </td>
              </tr>


            </tbody>
          </table>

       </div>

        <div class="content">
         
           <div class="buttons">
          <div class="right">I have read and agree to the <a href="<?php echo Yii::app()->createUrl('site/policy')?>"><b>Term & Conditions</b></a>
            <input type="checkbox" value="1" name="agree">
            <?php echo CHtml::submitButton('Submit',array('class'=>'button')); ?>
          </div>
        </div>
        </div>
       
      <?php $this->endWidget(); ?>
    </div>
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>
  </div>

  <script>

  var cat_id=$('#Users_main_category_id').val();
  var dat='cat_id='+cat_id;

	
	$.ajax({
		type:'post',
		url:"<?php echo Yii::app()->createUrl('site/sellercategory')?>",
		data:dat,
		success:function( res )
			{
				$('#subcat').append(res);
			}
	});

  </script>

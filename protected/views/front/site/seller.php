   <?php $this->pageTitle='Jhansishopping.com | Dealer Account';?>
	<div id="container" class="content">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<?php $this->renderPartial('left');?>
          <!--Middle Part Start-->
		</div>

    <!--Middle Part Start-->
    <section class="main-content col-lg-9 col-md-9 col-sm-9">
	
      <!--Breadcrumb Part Start-->
		<div class="box">
			<div class="box-heading">
				<div class="breadcrumb"> 
					<a href="<?php echo Yii::app()->createUrl('site/index');?>">Home</a> » <a href="#">Register</a> 
				</div>
			</div>
		</div>
      <!--Breadcrumb Part End-->

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

        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="carousel-heading no-margin">
              <h4>Register Account</h4>
            </div>
            <div class="page-content">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 align-right align-xs">
                 
                <a href="<?php echo Yii::app()->createUrl('site/register');?>"><input type="radio" value="1" name="newsletter">
                    User/Customer Account
              	</a>
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 align-left align-xs">
                <a href="<?php echo Yii::app()->createUrl('site/sellerregister');?>"><input type="radio" checked="checked" value="2" name="newsletter">
                    Vendor/Seller Account
            	</a>
                </div>
              </div>
            </div>
          </div>
        </div>
		
		
		
		
	<div class="row">
	  <div class="col-lg-12 col-md-12 col-sm-12 register-account">
		<div class="carousel-heading no-margin">
		  <h4>Register Vendor/Seller Account</h4>
		</div>
        
		<div class="page-content">
		  <div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
			  <p><strong>Vendor/Seller Information</strong></p>
			</div>
		  </div>

		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p>First name*</p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<?php echo $form->textField($model,'first_name',array('class'=>'large-field')); ?>
				<?php echo $form->error($model,'first_name'); ?>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p>Last name*</p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<?php echo $form->textField($model,'last_name',array('class'=>'large-field')); ?>
				<?php echo $form->error($model,'last_name'); ?>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p>Date Of Birth*</p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<?php echo $form->textField($model,'dob',array('class'=>'large-field datepicker')); ?>
				<?php echo $form->error($model,'dob'); ?>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p>Business/Firm/Brand Name*</p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">				                
				<?php echo $form->textField($model,'business_name',array('class'=>'large-field')); ?>
				<?php echo $form->error($model,'business_name'); ?>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p>Contact No*</p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">				                
				<?php echo $form->textField($model,'contact_no',array('class'=>'large-field')); ?>
				<?php echo $form->error($model,'contact_no'); ?>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p>E-Mail*</p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">				                
				<?php echo $form->textField($model,'email',array('class'=>'large-field')); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p>Password*</p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">				                
				<?php echo $form->passwordField($model,'password',array('class'=>'large-field')); ?>
				<?php echo $form->error($model,'password'); ?>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p>Confirm Password*</p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">				                
				<?php echo $form->passwordField($model,'confirm_pw',array('class'=>'large-field')); ?>
				<?php echo $form->error($model,'confirm_pw'); ?>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p>Security Question*</p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">				                
				<?php echo $form->dropDownList($model,'question_id', Question::getQuestion(),array( 'empty'=>'select' ,'class'=>'large-field')); ?>
				<?php echo $form->error($model,'question_id'); ?>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p>Address*</p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">				                
				<?php echo $form->textArea($model,'address',array('class'=>'large-field',
				'rows'=>'2','cols'=>'2' )); ?>
				<?php echo $form->error($model,'address'); ?>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p>State*</p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">				                
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
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p>City*</p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">				                
				<?php echo $form->dropDownList($model,'city',City::getCity(),array('empty'=>'Select','class'=>'large-field')); ?>
				<?php echo $form->error($model,'city'); ?>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p>Pin Code*</p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">				                
				<?php echo $form->textField($model,'post_code',array('class'=>'large-field')); ?>
				<?php echo $form->error($model,'post_code'); ?>
			</div>
		  </div>
  		  
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p>Profile Image </p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">				                
				<?php echo $form->fileField($model,'photo'); ?>
				<?php echo $form->error($model,'photo'); ?>
			</div>
		  </div>
	 
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

			
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  
			  <p>I have read and agree to the <a href="<?php echo Yii::app()->createUrl('site/policy')?>"><b> Term & Conditions </b> </a></p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8"> 
			  <input type="checkbox" value="1" name="agree" id="i-agree-to-terms">
			  <label for="i-agree-to-terms"></label>
			</div>
		  </div>
         
		 
		  <div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12" style="text-align:right">
			  <?php echo CHtml::submitButton('Register',array('class'=>'button big')); ?>
			  <input class="big" type="reset" value="Cancel">
			</div>
		  </div>
		   
        </div>
     </div>
	</div>
      <?php $this->endWidget(); ?>
   </section>
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

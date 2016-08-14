<?php $this->pageTitle='Jhansishopping.com | Forgot Password';?>

    <div id="container" class="content">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <?php $this->renderPartial('left');?>
      </div>
      <!--Middle Part Start-->
      <section class="main-content col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div id="content">
          
            <div class="box">
              <div class="box-heading">
                <div class="breadcrumb">
                  <?php  echo $nav;?>
                </div>
              </div>
              <div class="box-content">
                <div class="box-product">
					 <div class="col-lg-12 col-md-12 col-sm-12 register-account">
                        	
                            <div class="carousel-heading no-margin">
                                <h4>Forgot Password</h4>
                            </div>
                            
             <div class="page-content">
                            	<div class="row">
                                	
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                    	<label class="radio-inline">
										  <input type="radio" value="1" checked="checked" name="newsletter">Send Password on Email Id
										</label>
                                    </div>
                                    
                                </div>
								
						<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>'users-form',
							'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
							'enableAjaxValidation'=>false,
						));?>		
								<div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Email Id:</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php echo $form->textField($model,'email',array('class'=>'large-field','readonly'=>'readonly')); ?>
                                    </div>	
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Security Question:</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php echo CHtml::textField('',$model->question->question,array('class'=>'large-field','readonly'=>'readonly')); ?>
                                    </div>	
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Security Answer:</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php echo $form->textField($model,'forgotpassword',array('class'=>'large-field')); ?>
										<?php echo $form->error($model,'forgotpassword'); ?>
                                    </div>	
                                </div>
                                <div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12" style="text-align:right">
                                    	<?php echo CHtml::submitButton('Send Email',array('class'=>'button','id'=>'email')); ?>
                                    </div>
                                    
                                </div>
					<?php $this->endWidget(); ?>
					
					
					<div class="row">
                                	
						<div class="col-lg-12 col-md-12 col-sm-12">
							<label class="radio-inline">
							  <input type="radio" value="2" checked="checked" name="newsletter">Send Password on Mobile
							</label>
						</div>
						
					</div>
								
						<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>'users-form1',
							'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
							'enableAjaxValidation'=>false,
						));?>		
								<div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                    	<p>Mobile Number :</p>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                    	<?php echo $form->textField($model,'contact_no',array('class'=>'large-field','readonly'=>'readonly')); ?>
                                    </div>	
                                </div>
								
                                <div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12" style="text-align:right">
                                    	<?php echo CHtml::submitButton('Send SMS',array('class'=>'button','id'=>'sms','disabled'=>"true")); ?>
                                    </div>
                                    
                                </div>
					<?php $this->endWidget(); ?>
					
               </div>
							
							
                            
                    	</div>
                        
				</div>
              </div>
            </div>
        </div>
      </section>

      <div class="clear"></div>
      <div class="social-part"></div>
    </div>
    <!--Middle Part End-->
	
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
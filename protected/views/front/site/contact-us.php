<?php $this->pageTitle='Jhansishopping.com | Contact Us';?>
  <div id="container" class="content">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
      <?php $this->renderPartial('left');?>
    </div>
    <!--Middle Part Start-->
    <section class="main-content col-lg-9 col-md-9 col-sm-9 col-xs-12">
      <div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="<?php echo Yii::app()->createUrl('site/index')?>">Home</a> » <a href="#">Contact Us</a> </div>
        <!--Breadcrumb Part End-->
        <div class="row">

          <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="carousel-heading no-margin">
              <h4>Contact Information</h4>
            </div>

            <div class="page-content contact-info">

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3782.463879414711!2d73.82243021441721!3d18.553113973021517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf0eed1beca7%3A0xf07ab6b613c2af51!2sSavitribai+Phule+Pune+University!5e0!3m2!1sen!2sin!4v1466272422006" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="contact-item green">
                    <i class="icons icon-location-3"></i>
                    <p>401, Sample Plaza, New Way Road, Sample Address, Maharashtra </p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="contact-item blue">
                    <i class="icons icon-mail"></i>
                    <p>
                      <a href="mailto:info@jhansishopping.com">info@jhansishopping.com</a>
                      <br>
                      <a href="mailto:sales@jhansishopping.com">sales@jhansishopping.com</a>
                    </p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="contact-item orange">
                    <i class="icons icon-phone"></i>
                    <p>123456789
                      <br>
                    </p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="contact-item blue">
                    <i class="icons icon-mail"></i>
                    <p>
                      <a href="mailto:support@jhansishopping.com">support@jhansishopping.com</a>
                      <br>
                      <a href="mailto:careers@jhansishopping.com">careers@jhansishopping.com</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--
<?php 


if(Yii::app()->user->hasFlash('contactus'))
{    ?>    
      <div class="alert alert-success">
        <?php echo Yii::app()->user->getFlash('contactus');  ?>    
      </div>
<?php  
}
else
{

$form=$this->beginWidget('CActiveForm', array(
  'id'=>'contactus-form',
  'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
  'enableAjaxValidation'=>false,
)); ?>

      <div class="content"> 


      <div class="row">
    <label class="control-label">
    <?php echo $form->labelEx($model,'name'); ?>
    </label>
    <div class="controls">
    <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200,'class'=>'large-field')); ?>
    <?php echo $form->error($model,'name'); ?>
    </div>
  </div>

  <div class="row">
    <label class="control-label">
    <?php echo $form->labelEx($model,'phone_no'); ?>
    </label>
    <div class="controls">
    <?php echo $form->textField($model,'phone_no',array('size'=>15,'maxlength'=>15,'class'=>'large-field')); ?>
    <?php echo $form->error($model,'phone_no'); ?>
    </div>
  </div>

  <div class="row">
    <label class="control-label">
    <?php echo $form->labelEx($model,'email'); ?>
    </label>
    <div class="controls">
    <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>200,'class'=>'large-field')); ?>
    <?php echo $form->error($model,'email'); ?>
    </div>
  </div>

  <div class="row">
    <label class="control-label">
    <?php echo $form->labelEx($model,'enquiry'); ?>
    </label>
    <div class="controls">
    <?php echo $form->textArea($model,'enquiry',array('size'=>60,'maxlength'=>200,'class'=>'large-field','style'=>'width:34%;')); ?>
    <?php echo $form->error($model,'enquiry'); ?>
    </div>
  </div>

      <div class="buttons">
        <div class="right">
          
          <?php echo CHtml::submitButton('Continue',array('class'=>'button')); ?>
        </div>
      </div>
</div>
<?php $this->endWidget();

} ?> -->
        <!--Middle Part End-->
        <div class="clear"></div>
        <div class="social-part">

        </div>
      </div>
    </section>
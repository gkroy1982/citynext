<?php $this->pageTitle='Jhansishopping.com | Enquiry';?>
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
				<a href="<?php echo Yii::app()->createUrl('site/index')?>">Home</a> » <a href="#">Enquiry</a> 
			</div>
		</div>
	  </div>
      <!--Breadcrumb Part End-->
	    
<?php 


if(Yii::app()->user->hasFlash('enquiry'))
{
   ?>    
      <div class="alert alert-success">
        Thank you for visiting Jhansishopping.com, We shall get back to you soon.    
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
	
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 register-account">
		<div class="carousel-heading no-margin">
		  <h4>Enquiry</h4>
		</div>

		<div class="page-content">
		  <div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
			  <p><strong>Enquiry</strong></p>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p><?php echo $form->labelEx($model,'name'); ?> </p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200,'class'=>'large-field')); ?>
				<?php echo $form->error($model,'name'); ?>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p> <?php echo $form->labelEx($model,'phone_no'); ?> </p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<?php echo $form->textField($model,'phone_no',array('size'=>15,'maxlength'=>15,'class'=>'large-field')); ?>
				<?php echo $form->error($model,'phone_no'); ?>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p> <?php echo $form->labelEx($model,'email'); ?> </p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>200,'class'=>'large-field')); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p><?php echo $form->labelEx($model,'enquiry'); ?> </p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<?php echo $form->textArea($model,'enquiry',array('size'=>60,'maxlength'=>200,'class'=>'large-field','rows'=>'2','cols'=>'2' )); ?>
				<?php echo $form->error($model,'enquiry'); ?>
			</div>
		  </div>
			
		  <div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12" style="text-align:right">
			  <?php echo CHtml::submitButton('Submit',array('class'=>'button')); ?>
			  <input class="big" type="reset" value="Cancel">
			</div>
		  </div>
		  
		</div>
	</div>
</div>
  
<?php $this->endWidget();

} ?>
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>
  </section>
</div>
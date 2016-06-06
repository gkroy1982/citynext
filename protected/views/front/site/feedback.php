<?php $this->pageTitle='Jhansishopping.com | Feedback';?>
  <div id="container">
   <?php $this->renderPartial('left');?>
    <!--Middle Part Start-->

    <div id="content">
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="<?php echo Yii::app()->createUrl('site/index')?>">Home</a> » <a href="#">Feedback</a> </div>
      <!--Breadcrumb Part End-->
      <h1>Feedback</h1>
      <!--<h2>Our Location</h2>-->
      
      <!--<h2>Feedback Form</h2>-->
<?php 


if(Yii::app()->user->hasFlash('feedback'))
{
   ?>    
      <div class="alert alert-success">
        Thank you for your valuable feedback. We assure you of the best of our services.  
      </div>
<?php  

}
else
{

$form=$this->beginWidget('CActiveForm', array(
  'id'=>'feedback-form',
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
    <?php echo $form->labelEx($model,'feedback'); ?>
    </label>
    <div class="controls">
    <?php echo $form->textArea($model,'feedback',array('row'=>6,'col'=>6,'class'=>'large-field','style'=>'width:34%;' )); ?>
    <?php echo $form->error($model,'feedback'); ?>
    </div>
  </div>

      <div class="buttons">
        <div class="right">
          
          <?php echo CHtml::submitButton('Submit',array('class'=>'button')); ?>
        </div>
      </div>
</div>
<?php $this->endWidget();

} ?>
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>
  </div>
<?php $this->pageTitle='Jhansishopping.com | Contact Us';?>
  <div id="container">
   <?php $this->renderPartial('left');?>
    <!--Middle Part Start-->

    <div id="content">
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="<?php echo Yii::app()->createUrl('site/index')?>">Home</a> » <a href="#">Contact Us</a> </div>
      <!--Breadcrumb Part End-->
      <h1>Contact Us</h1>
      <h2>Our Location</h2>
      <div class="contact-info">
        <div class="content">
          <div class="left">
            <h4><b>Address:</b></h4>
            <p>401, Sample Plaza, New Way Road, Sample Address, Maharashtra<br>
              Address 1</p>
          </div>
          <div class="right">
            <h4><b>Telephone:</b></h4>
            123456789<br>
            <br>
			
			<h4><b>Email Id:</b></h4>
			<table>
			<tr>
			<th> For Info </th>
			<td>: <a href="mailto:info@jhansishopping.com">info@jhansishopping.com</a> </td>
			</tr>
			<tr>
			<th> For Sales </th>
			<td>: <a href="mailto:sales@jhansishopping.com">sales@jhansishopping.com</a></td>
			</tr>
			<tr>
			<th> For Support </th>
			<td>: <a href="mailto:support@jhansishopping.com">support@jhansishopping.com</a></td>
			</tr>
			<tr>
			<th> For Jobs </th>
			<td>: <a href="mailto:careers@jhansishopping.com">careers@jhansishopping.com</a></td>
			</tr>
			
			</table>
            
          </div>
        </div>
      </div>
    <!--  <h2>Contact Form</h2>-->

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
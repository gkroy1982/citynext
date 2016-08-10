<?php $this->pageTitle='Jhansishopping.com | Careers';?>   
  <div id="container" class="content">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<?php $this->renderPartial('left');?>
	  <!--Middle Part Start-->
	</div> 
	
	<section class="main-content col-lg-9 col-md-9 col-sm-9">
      <!--Breadcrumb Part Start-->  
	  <div class="box">
		<div class="box-heading">
			<div class="breadcrumb"> 
				<a href="<?php echo Yii::app()->createUrl('site/index')?>">Home</a> » <a href="#">Career</a> 
			</div>
		</div>
	  </div>
      <!--Breadcrumb Part End-->
      
<?php 
if(Yii::app()->user->hasFlash('success'))
{
?>    
	<div class="alert alert-success">
		Send resume successfully.  
	</div>
<?php  
}else{
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'career-form',
		'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
		'enableAjaxValidation'=>false,
	)); 
 
//echo $form->errorSummary($model);
?>
		
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 register-account">
		<div class="carousel-heading no-margin">
		  <h4>Personal Details</h4>
		</div>

		<div class="page-content">
		  <div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
			  <p><strong>Personal Details</strong></p>
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
			  <p><?php echo $form->labelEx($model,'b_date'); ?> </p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<?php echo $form->textField($model,'b_date',array('class'=>'large-field','placeholder'=>'YYYY-MM-DD')); ?>
				<?php echo $form->error($model,'b_date'); ?>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p><?php echo $form->labelEx($model,'address'); ?> </p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<?php echo $form->textArea($model,'address',array('class'=>'large-field','rows'=>'2','cols'=>'2' )); ?>
				<?php echo $form->error($model,'address'); ?>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p><?php echo $form->labelEx($model,'email'); ?> </p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<?php echo $form->textField($model,'email',array('class'=>'large-field')); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p><?php echo $form->labelEx($model,'mobile'); ?> </p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<?php echo $form->textField($model,'mobile',array('class'=>'large-field')); ?>
				<?php echo $form->error($model,'mobile'); ?>
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
			  <p><?php echo $form->labelEx($model,'resume'); ?> </p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<?php echo $form->fileField($model,'resume',array('class'=>'large-field')); ?>
				<?php echo $form->error($model,'resume'); ?>
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
</section>

<?php 
	$this->endWidget();
	}
?>

    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>
  </div>

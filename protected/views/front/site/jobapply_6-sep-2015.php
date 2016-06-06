<?php $this->pageTitle='Jhansishopping.com | Careers';?>   
  <div id="container">
   <?php $this->renderPartial('left');?>

    <!--Middle Part Start-->
    <div id="content">
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="<?php echo Yii::app()->createUrl('site/index');?>">Home</a> » Career </div>
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
<h2>Personal Details</h2>
        <div class="content">
		
		          <table class="form">
           <tbody>
              <tr>
                <td><span class="required">*</span> Name:</td>
                <td>
                    <?php echo $form->textField($model,'name',array('class'=>'large-field')); ?>
                    <?php echo $form->error($model,'name'); ?>
                </td>
              </tr>
              <tr>
                <td><span class="required">*</span> Date of Birth:</td>
                <td>
                    <?php echo $form->textField($model,'b_date',array('class'=>'large-field','placeholder'=>'YYYY-MM-DD')); ?>
                    <?php echo $form->error($model,'b_date'); ?>
                </td>
              </tr>

              <tr>
                <td><span class="required">*</span> Address:</td>
                <td>
                    <?php echo $form->textField($model,'address',array('class'=>'large-field')); ?>
                    <?php echo $form->error($model,'address'); ?>
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
                <td><span class="required">*</span> Resume:</td>
                <td>
                    <?php echo $form->fileField($model,'resume',array('class'=>'large-field')); ?>
                    <?php echo $form->error($model,'resume'); ?>
                </td>
              </tr>

            </tbody>
          </table>




   
        </div>

        <div class="content">
         
           <div class="buttons">
          <div class="right">
            <?php echo CHtml::submitButton('Submit',array('class'=>'button')); ?>
          </div>
        </div>
        </div>
                 

    </div>

    <?php 
    $this->endWidget();
    }?>

    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>
  </div>

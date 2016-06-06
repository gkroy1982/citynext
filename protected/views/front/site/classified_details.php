<?php $this->pageTitle='Jhansishopping.com | Classified Details';?>
<?php 

$url = Yii::app()->theme->baseUrl; 
$url_product = Yii::app()->baseUrl.'/upload/classified/'; 
$url_img = Yii::app()->basePath.'/../upload/classified/'; 
?>

   <?php $this->renderPartial('left');?>
  
<!--Middle Part Start-->
    <div id="content">
<?php $this->renderPartial('post_classifieds');?>
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="<?php echo Yii::app()->createUrl('site/index')?>">Home</a> » <a href="<?php echo Yii::app()->createUrl('site/classifieds')?>">CLASSIFIEDS</a> » <?php echo strtoupper($classified->title);?></div>
      <!--Breadcrumb Part End-->
      <div class="product-info">

        <div class="left">

          <?php 
          if (file_exists($url_img.$classified->image) and $classified->image!='') 
          {
              ?>
              <div  id='image1'>               
                  <img style="width:100%;max-height:400px;" src="<?php echo $url_product.$classified->image;?>"  />              
              </div>
              <?php
          }
          ?>
         
         
          <div class="image-additional"> 
         
          
         
         </div>
       </div>


        <div class="right">
          <h1><?php echo ucwords($classified->title);?></h1> 
           
            <br/> 
         
              <div class="cart"><h2>Duration</h2>             
               From Date <?php echo date('d-m-Y',strtotime($classified->from_date)); ?> To Date <?php echo date('d-m-Y',strtotime($classified->to_date)); ?>
              </div>
			<div class="cart"><h2>Description</h2>             
                <?php echo $classified->description; ?>
              </div>

           
        </div>
      </div>

      <!-- Tabs Start -->

      <!--<div id="tabs" class="htabs"> <a href="#tab-description">Description</a>
	 
	  </div>
      <div id="tab-description" class="tab-content">        
          <?php // echo $model->description;?>
      </div>-->

    </div>
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>


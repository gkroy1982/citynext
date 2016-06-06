<?php $this->pageTitle='Jhansishopping.com | City Update';?>
<?php 

$url = Yii::app()->theme->baseUrl; 
$url_product = Yii::app()->baseUrl.'/upload/cityupdate/'; 
$url_img = Yii::app()->basePath.'/../upload/cityupdate/'; 
?>

   <?php $this->renderPartial('left');?>
  
<!--Middle Part Start-->
    <div id="content">

      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="<?php echo Yii::app()->createUrl('site/index')?>">Home</a> » City Update » <?php echo $model->title?></div>
      <!--Breadcrumb Part End-->
      	  
      <div class="product-info">

        <div class="left">

          <?php 
          if (file_exists($url_img.$model->image) and $model->image!='') 
          {
              ?>
              <div  id='image1'>               
                  <img style="width:100%;max-height:400px;" src="<?php echo $url_product.$model->image;?>"  />              
              </div>
              <?php
          }
          ?>
         
         
          <div class="image-additional"> 
         
          
         
         </div>
       </div>


        <div class="right">
          <h1><?php echo ucwords($model->title);?></h1> 
           
            <br/> 
         
              <div class="cart"><h2>Date : <?php echo date('d-m-Y',strtotime($model->date)); ?></h2></div>
			<div class="cart"><h2>News</h2>             
                <?php echo $model->news; ?>
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
  </div>
</div>

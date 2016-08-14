<?php $this->pageTitle='Jhansishopping.com | Condolence Details';?>
<?php 

$url = Yii::app()->theme->baseUrl; 
$url_product = Yii::app()->baseUrl.'/upload/condolence/'; 
$url_img = Yii::app()->basePath.'/../upload/condolence/'; 
?>

   <?php $this->renderPartial('left');?>
  
<!--Middle Part Start-->
    <div id="content">
 <?php $this->renderPartial('post_condo');?>
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="<?php echo Yii::app()->createUrl('site/index')?>">HOME</a> » <a href="<?php echo Yii::app()->createUrl('site/condolences')?>">OBITURIES</a> » <a><?php echo strtoupper( $condolence->title);?></a></div>
      <!--Breadcrumb Part End-->
      <div class="product-info">

        <div class="left">

          <?php 
          if (file_exists($url_img.$condolence->image) and $condolence->image!='') 
          {
              ?>
              <div  id='image1'>               
                  <img style="width:100%;max-height:400px;" src="<?php echo $url_product.$condolence->image;?>"  />              
              </div>
              <?php
          }
          ?>
         
         
          <div class="image-additional"> 
         
          
         
         </div>
       </div>


        <div class="right">
          <h1><?php echo ucwords($condolence->title);?></h1>          
  
            <br/> 
			<?php if($classified->date!='')
			{ 	?>
					<div class="cart"><h2>Date</h2>             
						<?php echo date('d-m-Y',strtotime($classified->date)); ?> 
					</div>
				<?php 
			} ?>
              <div class="cart"><h2>Description</h2>             
                <?php echo $condolence->description; ?>
              </div>
           

           
        </div>
      </div>

      <!-- Tabs Start -->

      <!--<div id="tabs" class="htabs"> <a href="#tab-description">Description</a>
	 
	  </div>
      <div id="tab-description" class="tab-content">        
          <?php //echo $model->description;?>
      </div>-->

    </div>
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>
  


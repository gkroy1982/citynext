
<?php $this->pageTitle='Jhansishopping.com | Vendors';?>
<?php 


$url = Yii::app()->theme->baseUrl; 

?>

  <div id="container">
   <?php $this->renderPartial('left');?>
    <!--Middle Part Start-->
    <div id="content">
    
      <!--Slideshow Part Start-->
      <!--<div class="slider-wrapper">
        <div id="slideshow" class="nivoSlider"> 
          <?php 
          $url_ads = Yii::app()->baseUrl.'/upload/ads/'; 
          foreach ($ads as $ad )
          {
            ?>
                <a href="#"><img src="<?php echo $url_ads.$ad->image; ?>"/></a>                   
               <?php
          } ?>
        </div>
      </div>
      <script type="text/javascript">
        $(document).ready(function() {
            $('#slideshow').nivoSlider();
        });
      </script>
      <!--Slideshow Part End-->


      <!--Featured Product Part Start-->
	  
	  <!--Breadcrumb Part Start-->
      
	  
	  
      <div class="box">
        <div class="box-heading">
		
		
		<div class="breadcrumb"> <?php  echo $nav;?></div>
      <!--Breadcrumb Part End-->
		
		
		
		</div>
        <div class="box-content">
          <div class="box-product">

         <?php 
         $p_url=Yii::app()->baseUrl.'/upload/profile/';
          foreach($vendors as $user)
          {
            ?>
            <div style='width:155px;height:200px;'>
		<a href="<?php echo Yii::app()->createUrl('site/products',array('id'=>$cid,'uid'=>$user->uid));?>">
              		<div class="image">
                            <img src="<?php echo $p_url.$product->photo;?>" style='width:152px;height:152px;' />
              		</div>
              		<div class="name" style="text-align:center;">
                		<?php
						if($user->business_name!='')
							echo ucwords($user->business_name);
						else
							echo ucwords($user->first_name.' '.$user->last_name);
						?>
              		</div>
		</a>
              
             
            </div>
            <?php
          }
          ?>

          </div>
        </div>
      </div>
      <!--Featured Product Part End-->
    </div>
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>
  </div>



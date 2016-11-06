<?php 
$this->pageTitle='Jhansishopping.com | Home';
$url = Yii::app()->theme->baseUrl; 
$url_product = Yii::app()->baseUrl.'/upload/cityupdate/'; 
//$url_img_city_update = Yii::app()->basePath.'/../upload/cityupdate/'; 
//$products=array();
?>

  <div id="container">
   <?php 
   
   $this->renderPartial('left');?>
    <!--Middle Part Start-->
    <div id="content">
		<!--div style='padding:10px;width:23%;float:right;height:500px;overflow:hidden;border:2px solid #e0e0e0; color:#e0e0e0;border-radius: 10px;'-->
		
		  <div class="slider-wrapper" style='width:67%;'>
        <div id="slideshow" class="nivoSlider"> 
        <?php 
          $url_ads = Yii::app()->baseUrl.'/upload/ads/'; 
          foreach ($ads as $ad )
          {
			  $url = 'vendor/id/'.$ad->user_id;
				if($ad->url!='' )
					$url = $ad->url;
			
			?>
                <a href="<?php echo $url; ?>"><img src="<?php echo $url_ads.$ad->image; ?>" style='height:250px;'/></a>                   
               <?php
          } ?> 
        </div>
      </div>
	
           <!--Advertisement section-->
	  <div class="" style='padding-block-end:10px;width:23%;float:right;margin-top:-270px;'>
		<div class="center">
			<div>               
					<?php 
						if(!empty($company_ads)) 
							$home_page_company_ads=Yii::app()->baseUrl.'/upload/company_advertisement/'.$company_ads->image;
						else
							$home_page_company_ads=Yii::app()->baseUrl.'/upload/company_advertisement/default.png';
							//http://dummyimage.com/medrect Link for default image
					?>
				 <img style="width:300px;max-height:250px;float:right;" src="<?php echo $home_page_company_ads; ?>" />              
            </div>
		</div>
	  </div>
	  
		<div class="clear"></div>
	   <div style='padding:10px;width:23%;float:right;height:500px;overflow:hidden;border:2px border-radius: 10px;margin-top:-442px;width:278px'>
		<h3 style='margin-left:-11px;margin-right:-11px;margin-top:-11px;text-align:center;background-color:#FFDAB9;color:black;border-radius: 10px;'>City Update </h3>
			<marquee style='height:480px;' direction="up" onmouseover="this.stop();" onmouseout="this.start();">
				<?php
				
				foreach($news as $obj )
				{
					echo '<a href="'.Yii::app()->createUrl('//site/news',array('id'=>$obj->id)).'">';
					echo "<p><div class='image' style='float:left;'><img src=$url_product$obj->image height='40px' width='40px'></div>
					<div style='font-size:14px'><strong>
					".ucwords($obj->title)."
					</strong></div>
					<span style='float:right;'><b>By ". $obj->user->first_name.'</b> '.date('d-m-Y h:s a',strtotime($obj->created_on))."</span></p>";
					echo '</a><br>';
					
				}
				?>
			</marquee>
		</div>
	   
    
     
	  <!-- second slider -->
	  
	 <!-- <div class="slider-wrapper" style='width:74%;'>
        <div id="slideshow2" class="nivoSlider"> 
        <?php 
          $url_ads = Yii::app()->baseUrl.'/upload/ads/'; 
          foreach ($ads2 as $ad )
          {
            ?>
                <a href="#"><img src="<?php echo $url_ads.$ad->image; ?>" style='height:250px;'/></a>                   
               <?php
          } ?> 
        </div>
      </div>-->
	  

	  
      <!--Slideshow Part End-->
      <!--Featured Product Part Start-->
	  <?php /*?>
      <div class="box">
        		<div class="box-heading">Special Products</div>
		        <div class="box-content">
		          <div class="box-product">

				         <?php 
				         $p_url=Yii::app()->baseUrl.'/upload/products/';
				          foreach($products as $product)
				          {
				            ?>
				            <div style='width:155px;height:225px;'>
				              <div class="image">
				                  <a href="<?php echo Yii::app()->createUrl('site/productdetails',array('id'=>$product->pid));?>">
                          <img style='width:152px;height:152px;' src="<?php echo $p_url.$product->image;?>"  /></a>
				              </div>

				              <div class="rating" style="color:green;text-align:center;">
				                  Offer
				              </div>
				              <div class="name" style="text-align:center;"> 
				                <a href="<?php echo Yii::app()->createUrl('site/productdetails',array('id'=>$product->pid));?>">
                        <?php echo substr(ucwords($product->product),0,20);?>..</a>
				              </div>
				              <div class="price">Rs. <?php echo $product->price;?></div>

				              <!--<div class="rating">
				                  <img src="<?php echo $url; ?>/image/stars-<?php echo $product->rating;?>.png" />
				              </div>
				              <div class="cart">
				                <a href="<?php echo Yii::app()->createUrl('card/addcard',array('id'=>$product->pid));?>"><input type="button" value="Add to Cart" class="button" /></a>
				              </div> -->
				            </div>
				            <?php
				          }
				          ?>

		          	</div>
		        </div>
      		</div>
		 <?php */ ?>
		 	
	  
	 
     
    </div>

    	<div class="clear"></div>
    	<div class="social-part"></div>
    </div>
    <!--Middle Part End-->
    




<?php $this->pageTitle='Jhansishopping.com | Search';?>
<?php 

$url = Yii::app()->theme->baseUrl; 

?>

  <div id="container">
   <?php $this->renderPartial('left');?>
    <!--Middle Part Start-->
    <div id="content">
    
      <!--Slideshow Part Start-->
     <!-- <div class="slider-wrapper">
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
      </div>-->
      <script type="text/javascript">
        $(document).ready(function() {
            $('#slideshow').nivoSlider();
        });
      </script>
      <!--Slideshow Part End-->


      <!--Featured Product Part Start-->
      <div class="box">
        <div class="box-heading"><?php echo $nav;?></div>
        <div class="box-content">
          <div class="box-product">

         <?php 
         $p_url=Yii::app()->baseUrl.'/upload/products/';
          foreach($products as $product)
          {
            ?>
            <div style='width:155px;height:200px;'>
              <div class="image">
                  <a href="<?php echo Yii::app()->createUrl('site/productdetails',array('id'=>$product->pid));?>">
                  <img src="<?php echo $p_url.$product->image;?>" style='width:152px;height:152px;' /></a>
              </div>
              <div class="name" style="text-align:center;">
                <a href="<?php echo Yii::app()->createUrl('site/productdetails',array('id'=>$product->pid));?>"><?php echo substr(ucwords($product->product),0,20);?>..</a>
              </div>
              <div class="price"><?php echo $product->price;?></div>
             <!-- <div class="rating">
                  <img src="<?php echo $url; ?>/image/stars-<?php echo $product->rating;?>.png" />
              </div>
              <div class="cart">
                <a href="<?php echo Yii::app()->createUrl('card/addcard',array('id'=>$product->pid));?>"><input type="button" value="Add to Cart" onClick="addToCart('40');" class="button" /></a>
              </div>-->
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



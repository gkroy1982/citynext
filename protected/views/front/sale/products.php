<?php $this->pageTitle='Jhansishopping.com | Products';?>
  <?php 


$url = Yii::app()->theme->baseUrl; 

?>

    <div id="container">
      <aside class="sidebar col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <?php $this->renderPartial('left');?>
      </aside>
      <!--Middle Part Start-->
      <section class="main-content col-lg-9 col-md-9 col-sm-9 col-xs-12">
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
      </div>
      <script type="text/javascript">
        $(document).ready(function() {
            $('#slideshow').nivoSlider();
        });
      </script>
      <!--Slideshow Part End-->
          <div style="margin:15px -15px 5px 0;">
            <?php $this->renderPartial('post_sell');?>
          </div>
          <!--Featured Product Part Start-->
          <div class="box">
            <div class="box-heading">
              <div class="breadcrumb">
                <?php  echo $nav;?>
              </div>
            </div>
            <div class="box-content">
              <div class="box-product">


                <div class="row">
                  <?php 
         $p_url=Yii::app()->baseUrl.'/upload/sell/';
          foreach($products as $product)
          {
            ?>
                    <!-- Product Item -->
                    <div class="col-lg-4 col-md-4 col-sm-4 product">

                      <div class="product-image">
                        <img src="<?php echo $p_url.$product->image;?>" alt="Product">
                        <a href="<?php echo Yii::app()->createUrl('sale/productdetails',array('id'=>$product->pid));?>" class="product-hover">
                          <i class="icons icon-eye-1"></i> Quick View
                        </a>
                      </div>

                      <div class="product-info">
                        <h5><a href="<?php echo Yii::app()->createUrl('sale/productdetails',array('id'=>$product->pid));?>"><?php echo substr(ucwords($product->product),0,20);?>..</a></h5>
                        <span class="price">Rs.<?php echo $product->price;?></span>
                      </div>

                    </div>
                    <!-- Product Item -->
                </div>
                <!-- <div class="rating">
<div class="rating readonly-rating" data-score="4"></div>
                  <img src="<?php echo $url; ?>/image/stars-<?php echo $product->rating;?>.png" />
              </div>
              <div class="cart">
                <a href="<?php echo Yii::app()->createUrl('card/addcard',array('id'=>$product->pid));?>"><input type="button" value="Add to Cart" onClick="addToCart('40');" class="button" /></a>
              </div>
              <div class="product-actions">
  <span class="add-to-cart">
                      <span class="action-wrapper">
                          <i class="icons icon-basket-2"></i>
                          <span class="action-name">Add to cart</span>
  </span>
  </span>
</div>

-->

                <?php
          }
          ?>
              </div>
            </div>
          </div>
          <!--Featured Product Part End-->
        </div>
        <!--Middle Part End-->
      </section>
      <div class="clear"></div>
      <div class="social-part">

      </div>
    </div>
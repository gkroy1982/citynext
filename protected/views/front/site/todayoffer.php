<?php 
$this->pageTitle='Jhansishopping.com | Home';
$url = Yii::app()->theme->baseUrl; 

//$products=array();
?>

  <div id="container" class="content">
    <aside class="sidebar col-lg-3 col-md-3 col-sm-3 col-xs-12">
      <?php $this->renderPartial('left');?>
    </aside>
    <!--Middle Part Start-->
    <section class="main-content col-lg-9 col-md-9 col-sm-9 col-xs-12">
      <div id="content">
        <!--section class="slider">
          <div class="tp-banner-container">
            <div class="tp-banner">
              <ul>
                <?php /*
          $url_ads = Yii::app()->baseUrl.'/upload/ads/'; 
          foreach ($ads as $ad )
          {
            */
			?>
                  <li data-transition="fade" data-slotamount="7" data-masterspeed="1500">
                    <img src="<?php echo $url_ads.$ad->image; ?>" alt="slidebg" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                  </li>
                  <?php
          //} ?>
              </ul>
            </div>
          </div>
        </section-->

        <!--Featured Product Part Start-->
        <div class="box">
          <div class="box-heading">Today's Offers</div>
          <div class="box-content">
            <div class="box-product">
              <?php 
				         $p_url=Yii::app()->baseUrl.'/upload/products/';
						 if(!empty($products)){
							  foreach($products as $product)
							  {
								?>

                <!-- Product Item -->
                <div class="col-lg-4 col-md-4 col-sm-4 product">
                  <div class="product-image">
				  <a href="<?php echo Yii::app()->createUrl('site/productdetails',array('id'=>$product->pid));?>"> 
                    <img src="<?php echo $p_url.$product->image;?>" alt="Product">
					</a>
                  </div>

                  <div class="product-info">
                    <h5><a href="<?php echo Yii::app()->createUrl('site/productdetails',array('id'=>$product->pid));?>"><?php echo substr(ucwords($product->product),0,18);?>..</a></h5>
                    <div style="color:green;text-align:center;">
                      Offer
                    </div>
                    <del>
                        <span class="price-old"> Rs.
                    <?php 
                      if(!empty($product->old_price) && $product->old_price>0)
                          echo "<strikethrough>".$product->old_price."</strikethrough>";
                    ?></span>
                        </del>
                    <span class="price">&nbsp;Rs. <?php echo $product->price;?>
</span>
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
						 }
							  ?>
          </div>
        </div>
      </div>
  </div>
  </section>
  <!--Middle Part End-->
  <div class="clear"></div>
  <div class="social-part"></div>
  </div>
  <!--Middle Part End-->
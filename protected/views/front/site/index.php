<?php 
$this->pageTitle='Jhansishopping.com | Home';
$url = Yii::app()->theme->baseUrl; 
$url_product = Yii::app()->baseUrl.'/upload/cityupdate/'; 
$url_offer_product = Yii::app()->baseUrl.'/upload/products/'; 

//$url_img_city_update = Yii::app()->basePath.'/../upload/cityupdate/'; 
//$products=array();
?>



  <div id="container" class="content">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
      <?php 
        $this->renderPartial('left');?>
        <!--Middle Part Start-->
    </div>
    <div class="content">
      <!--div style='padding:10px;width:23%;float:right;height:500px;overflow:hidden;border:2px solid #e0e0e0; color:#e0e0e0;border-radius: 10px;'-->

      <section class="main-content col-lg-9 col-md-9 col-sm-9 col-xs-12">



        <section class="slider">
          <div class="tp-banner-container">
            <div class="tp-banner">
              <ul>
                <!-- SLIDE  -->
                <?php
				  $url_ads = Yii::app()->baseUrl.'/upload/ads/'; 
				  foreach($ads as $ad) {
					$url = 'vendor/id/'.$ad->user_id;
						if($ad->url!='' )
							$url = $ad->url;
				?>
                  <li data-transition="fade" data-slotamount="7" data-masterspeed="1500">
                    <!-- MAIN IMAGE -->
                    <img src="<?php echo $url_ads.$ad->image; ?>" alt="" data-bgfit="100%" data-bgposition="left top" data-bgrepeat="no-repeat">
                    <!-- LAYERS -->
                    <!--div class="tp-caption skewfromrightshort fadeout" data-x="40" data-y="60" data-speed="500" data-start="1200" data-easing="Power4.easeOut">
                    <h2>The New <strong>Laptop</strong></h2>
                  </div>
                  <div class="tp-caption skewfromrightshort fadeout" data-x="40" data-y="140" data-speed="500" data-start="1200" data-easing="Power4.easeOut">
                    <h3>All the power in your hands!</h3>
                  </div>
                  <div class="tp-caption skewfromrightshort fadeout" data-x="40" data-y="250" data-speed="500" data-start="1200" data-easing="Power4.easeOut"><span>From <span class="price">$960.00</span></span>
                  </div>
                  <div class="tp-caption skewfromrightshort fadeout" data-x="40" data-y="300" data-speed="500" data-start="1200" data-easing="Power4.easeOut"><a class="button big red" href="#">Buy Now</a>
                  </div-->
                  </li>
                  <?php
					} ?>
                    <!-- SLIDE  -->
              </ul>
              <div class="tp-loader" style="display: none;"></div>
              <div class="tp-bannertimer" style="visibility: hidden; overflow: hidden; width: 0%;"></div>
            </div>
            <div style="position: absolute; margin-top: -25px; left: 20px; top: 186px;" class="tp-leftarrow tparrows default hidearrows"></div>
            <div style="position: absolute; margin-top: -25px; right: 20px; top: 186px;" class="tp-rightarrow tparrows default hidearrows"></div>
          </div>
        </section>



        <!-- News -->
        <div class="products-row row">

          <!-- Carousel Heading -->
          <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="carousel-heading">
              <h4>Offer Ending Today</h4>
              <div class="carousel-arrows">
                <i class="icons icon-left-dir"></i>
                <i class="icons icon-right-dir"></i>
              </div>
            </div>

          </div>
          <!-- /Carousel Heading -->


          <!-- Carousel -->
          <div class="carousel owl-carousel-wrap col-lg-12 col-md-12 col-sm-12">

            <div class="owl-carousel" data-max-items="4">

              <?php
		if(!empty($product_offer1)) {
			foreach($product_offer1 as $product_offer_row1) {
				$product_name1=$product_offer_row1->product->product;
				$old_price1=$product_offer_row1->product->old_price;
				$new_price1=$product_offer_row1->product->price;
				$offer_prod_url1=Yii::app()->baseUrl.'/index_new.php/site/productdetails/'.$product_offer_row1->product_id;
				$image_offer_prod_url1=$url_offer_product.$product_offer_row1->product->image;
		?>
                <!-- Slide -->
                <div>
                  <!-- Carousel Item -->
                  <article class="news">

                    <div class="news-background">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 news-thumbnail">
                          <a href="#"><img src="<?php echo $image_offer_prod_url1; ?>" class="img-responsive center-block" alt="News1"></a>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 news-content">
                          <h5>
						<a href="<?php echo $offer_prod_url1; ?>">
						  <?php
                           if(strlen($product_name1) >= 40)
                             echo substr(ucwords($product_name1), 0, 40)."..."; 
                           else
                             echo ucwords($product_name1);
                          ?>
						</a>
					</h5>
                          <span class="oldPrice"><?php echo "Rs." . $old_price1; ?></span> <span class="newPrice"><?php echo "Rs." . $new_price1; ?></span>
                        </div>
                      </div>
                    </div>

                  </article>
                  <!-- /Carousel Item -->
                </div>
                <!-- /Slide -->

                <?php 
				}
			}
		?>
            </div>
          </div>
          <!-- /Carousel -->
        </div>
        <!-- /News -->
        <!--<div class="col-sm-3 col-md-3">
  <div class="center" style="width:20%">
    <div>
      <?php /*
			if(!empty($company_ads))
				$home_page_company_ads=Yii::app()->baseUrl.'/upload/company_advertisement/'.$company_ads->image;
			else
				$home_page_company_ads=Yii::app()->baseUrl.'/upload/company_advertisement/default.png';
				//http://dummyimage.com/medrect Link for default image
		*/	 ?> 
        <img src="<?php /* echo $home_page_company_ads; */ ?>" style="max-width:290px; width:auto; max-height:290px; height:auto" />
    </div>
  </div>
</div>-->
        <div class="clear"></div>
      </section>


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
                  <div class="price">Rs.
                    <?php echo $product->price;?>
                  </div>

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
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
    <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-12" id="content ">
      <!--div style='padding:10px;width:23%;float:right;height:500px;overflow:hidden;border:2px solid #e0e0e0; color:#e0e0e0;border-radius: 10px;'-->
      <div class="col-sm-9 col-md-9 slider-wrapper" style="width:55%">
        <!--div id="slideshow" class="nivoSlider"> 
        <?php 
          $url_ads = Yii::app()->baseUrl.'/upload/ads/'; 
          foreach($ads as $ad)
          {
			$url = 'vendor/id/'.$ad->user_id;
				if($ad->url!='' )
					$url = $ad->url;
			
			?>
                <a href="<?php echo $url; ?>"><img src="<?php echo $url_ads.$ad->image; ?>" /></a>                   
               <?php
          } ?> 
        </div-->

        <!--start-->
        <div id="ninja-slider">
          <div class="slider-inner">
            <ul>
              <?php 
          $url_ads = Yii::app()->baseUrl.'/upload/ads/'; 
          foreach($ads as $ad)
          {
			$url = 'vendor/id/'.$ad->user_id;
				if($ad->url!='' )
					$url = $ad->url;
			
			?>
                <li>
                  <a class="ns-img" href="<?php echo $url_ads.$ad->image; ?>"></a>
                </li>
                <?php
          } ?>
            </ul>
            <div class="navsWrapper">
              <div id="ninja-slider-prev"></div>
              <div id="ninja-slider-next"></div>
            </div>
          </div>
        </div>
        <!--end-->

      </div>
      <div class="col-sm-3 col-md-3">
        <div class="center" style="width:20%">
          <div>
            <?php 
						if(!empty($company_ads)) 
							$home_page_company_ads=Yii::app()->baseUrl.'/upload/company_advertisement/'.$company_ads->image;
						else
							$home_page_company_ads=Yii::app()->baseUrl.'/upload/company_advertisement/default.png';
							//http://dummyimage.com/medrect Link for default image
					?>
              <img src="<?php echo $home_page_company_ads; ?>" style="max-width:290px; width:auto; max-height:290px; height:auto" />
          </div>
        </div>
      </div>

      <div class="clear"></div>
      <div style='padding:10px;width:23%;float:right;height:500px;overflow:hidden;border:2px border-radius: 10px;margin-top:-442px;width:278px'>
        <h4 style='margin-left:-11px;margin-right:-11px;margin-top:-11px;text-align:center;background-color:#FFDAB9;color:black;border-radius: 10px;'>City Update </h4>
        <marquee style='height:480px;' direction="up" onmouseover="this.stop();" onmouseout="this.start();">
          <?php
				/*
				foreach($news as $obj )
				{
					echo '<a href="'.Yii::app()->createUrl('//site/news',array('id'=>$obj->id)).'">';
					echo "<p><div class='image' style='float:left;'><img src=$url_product$obj->image height='40px' width='40px'></div>
					<div style='color:#0E0C0A;margin:2%; font-size:14px'><strong>
					".ucwords($obj->title)."
					</strong></div>
					<span style='color:#0E0C0A;margin:2%;float:right;'><b>By ". $obj->user->first_name.'</b> '.date('d-m-Y h:s a',strtotime($obj->created_on))."</span></p>";
					echo '</a><br>';
					
				}
				*/
				?>
        </marquee>
      </div>



      <!-- second slider -->

      <!--div class="slider-wrapper" style='width:74%;'>
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
      </div-->

      <div id="ninja-slider">
        <div class="slider-inner">
          <ul>
            <?php 
          $url_ads = Yii::app()->baseUrl.'/upload/ads/'; 
          foreach($ads as $ad)
          {
			$url = 'vendor/id/'.$ad->user_id;
				if($ad->url!='' )
					$url = $ad->url;
			
			?>
              <li>
                <a class="ns-img" href="<?php echo $url_ads.$ad->image; ?>"></a>
              </li>
              <?php
          } ?>
          </ul>
          <div class="navsWrapper">
            <div id="ninja-slider-prev"></div>
            <div id="ninja-slider-next"></div>
          </div>
        </div>
      </div>


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



    <div class="">
      <div class="">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-9">
            <center>
              <h3>Offer Ending Today!</h3></center>
          </div>
          <div class="col-md-3">
            <!-- Controls -->
            <div class="controls pull-right hidden-xs">
              <a class="left fa fa-chevron-left btn btn" href="#carousel-example" data-slide="prev"></a>
              <a class="right fa fa-chevron-right btn" href="#carousel-example" data-slide="next"></a>
            </div>
          </div>
        </div>
        <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <div class="row">
                <?php
						if(!empty($product_offer1)){
							foreach($product_offer1 as $product_offer_row1){
								$product_name1=$product_offer_row1->product->product;
								$old_price1=$product_offer_row1->product->old_price;
								$new_price1=$product_offer_row1->product->price;
								$offer_prod_url1=Yii::app()->baseUrl.'/index_new.php/site/productdetails/'.$product_offer_row1->product_id;
								$image_offer_prod_url1=$url_offer_product.$product_offer_row1->product->image;
					?>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="col-item">
                      <div class="photo">
                        <img src="<?php echo $image_offer_prod_url1; ?>" class="img-responsive img-resized" alt="a" />
                      </div>
                      <div class="info">
                        <div class="separator clear-left">
                          <p class="btn-add">
                            <i class="fa fa-list-alt"></i>
                            <a href="<?php echo $offer_prod_url1; ?>" class="hidden-sm">
                              <?php echo ucwords($product_name1); ?>
                            </a>
                          </p>
                          <p class="btn-details">
                            <i class="fa fa-inr"></i>
                            <a href="<?php echo $offer_prod_url1; ?>" class="hidden-sm">
												Rs. <?php echo $new_price1; ?>
												</a>
                          </p>
                        </div>
                        <div class="clearfix">
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php 
							}
						}
					?>

              </div>
            </div>

            <div class="item">
              <div class="row">
                <?php
						if(!empty($product_offer2)){
							foreach($product_offer2 as $product_offer_row2){
								$product_name2=$product_offer_row2->product->product;
								$old_price2=$product_offer_row2->product->old_price;
								$new_price2=$product_offer_row2->product->price;
								$offer_prod_url2=Yii::app()->baseUrl.'/index_new.php/site/productdetails/'.$product_offer_row2->product_id;
								$image_offer_prod_url2=$url_offer_product.$product_offer_row2->product->image;
						?>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="col-item">
                      <div class="photo">
                        <img src="<?php echo $image_offer_prod_url2; ?>" class="img-responsive img-resized" alt="a" />
                      </div>
                      <div class="info">
                        <div class="separator clear-left">
                          <p class="btn-add">
                            <i class="fa fa-list-alt"></i>
                            <a href="<?php echo $offer_prod_url2; ?>" class="hidden-sm">
                              <?php echo ucwords($product_name2); ?>
                            </a>
                          </p>
                          <p class="btn-details">
                            <i class="fa fa-inr"></i>
                            <a href="<?php echo $offer_prod_url2; ?>" class="hidden-sm">
												Rs. <?php echo $new_price2; ?>
												</a>
                          </p>
                        </div>
                        <div class="clearfix">
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php 
							}
						}
					?>
              </div>
            </div>

            <div class="item">
              <div class="row">
                <?php
						if(!empty($product_offer3)){
							foreach($product_offer3 as $product_offer_row3){
								$product_name3=$product_offer_row3->product->product;
								$old_price3=$product_offer_row3->product->old_price;
								$new_price3=$product_offer_row3->product->price;
								$offer_prod_url3=Yii::app()->baseUrl.'/index_new.php/site/productdetails/'.$product_offer_row3->product_id;
								$image_offer_prod_url3=$url_offer_product.$product_offer_row3->product->image;
						?>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="col-item">
                      <div class="photo">
                        <img src="<?php echo $image_offer_prod_url3; ?>" class="img-responsive img-resized" alt="a" />
                      </div>
                      <div class="info">
                        <div class="separator clear-left">
                          <p class="btn-add">
                            <i class="fa fa-list-alt"></i>
                            <a href="<?php echo $offer_prod_url3; ?>" class="hidden-sm">
                              <?php echo ucwords($product_name3); ?>
                            </a>
                          </p>
                          <p class="btn-details">
                            <i class="fa fa-inr"></i>
                            <a href="<?php echo $offer_prod_url3; ?>" class="hidden-sm">
												Rs. <?php echo $new_price3; ?>
												</a>
                          </p>
                        </div>
                        <div class="clearfix">
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php 
							}
						}
					?>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>

    <div class="clear"></div>
    <div class="social-part"></div>
  </div>
  <!--Middle Part End-->
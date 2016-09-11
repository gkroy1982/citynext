<?php $this->pageTitle='Jhansishopping.com | Product Details';?>
  <?php 

$url = Yii::app()->theme->baseUrl; 
$url_product = Yii::app()->baseUrl.'/upload/products/'; 
$url_img = Yii::app()->basePath.'/../upload/products/'; 
?>
    <div id="container" class="content">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <?php $this->renderPartial('left');?>
      </div>

      <!--Middle Part Start-->
      <!-- Main Content -->
      <section class="main-content col-lg-9 col-md-9 col-sm-9">

        <!--Breadcrumb Part Start-->
        <div class="box">
          <div class="box-heading">
            <div class="breadcrumb"> <a href="<?php echo Yii::app()->createUrl('site/index')?>">Home</a> » <a href="<?php echo Yii::app()->createUrl('site/subcategories',array('id'=>$product->main_category_id))?>"><?php echo ucwords(strtolower ($product->mainCategory->category)); ?></a> »
              <a href="<?php echo Yii::app()->createUrl('site/products',array('id'=>$product->sub_category_id))?>">
                <?php echo ucwords(strtolower($product->subCategory->sub_category)).'</a> » <a>'.ucwords(strtolower($product->product));?></a>
            </div>
          </div>
        </div>
        <!--Breadcrumb Part End-->

        <div id="product-single">

          <!-- Product -->
          <div class="product-single">

            <div class="row">

              <!-- Product Images Carousel -->
              <div class="col-lg-5 col-md-5 col-sm-5 product-single-image">

                <div id="product-slider">
                  <ul class="slides">
                    <?php 
						if (file_exists($url_img.$product->image) and $product->image!='') {
					?>
                      <li>
                        <img class="cloud-zoom" src="<?php echo $url_product.$product->image;?>" data-large="<?php echo $url_product.$product->image;?>" alt="" />
                      </li>
                      <?php 
						}else if (file_exists($url_img.$product->image2) and $product->image2!='') {
					?>
                        <li>
                          <img class="cloud-zoom" src="<?php echo $url_product.$product->image2;?>" data-large="<?php echo $url_product.$product->image2;?>" alt="" />
                        </li>
                        <?php 		
						}else if (file_exists($url_img.$product->image3) and $product->image3!='') {
					?>
                          <li>
                            <img class="cloud-zoom" src="<?php echo $url_product.$product->image3;?>" data-large="<?php echo $url_product.$product->image3;?>" alt="" />
                          </li>
                          <?php 		
						} 
					?>
                  </ul>
                </div>
                <div id="product-carousel">
                  <ul class="slides">
                    <?php 
					if (file_exists($url_img.$product->image) and $product->image!='') 
					{
					?>
                      <li>
                        <a class="fancybox" rel="product-images" href="<?php echo $url_product.$product->image;?>"></a>
                        <img src="<?php echo $url_product.$product->image;?>" data-large="<?php echo $url_product.$product->image;?>" alt="" />
                      </li>
                      <?php
					}
					?>
                        <?php 
					if (file_exists($url_img.$product->image2) and $product->image2!='') 
					{
					?>
                          <li>
                            <a class="fancybox" rel="product-images" href="<?php echo $url_product.$product->image2;?>"></a>
                            <img src="<?php echo $url_product.$product->image2;?>" data-large="<?php echo $url_product.$product->image2;?>" alt="" />
                          </li>
                          <?php
					}
					?>
                            <?php 
					if (file_exists($url_img.$product->image3) and $product->image3!='') 
					{
					?>
                              <li>
                                <a class="fancybox" rel="product-images" href="<?php echo $url_product.$product->image3;?>"></a>
                                <img src="<?php echo $url_product.$product->image3;?>" data-large="<?php echo $url_product.$product->image3;?>" alt="" />
                              </li>
                              <?php
					}
					?>

                  </ul>
                </div>
              </div>
              <!-- /Product Images Carousel -->


              <div class="col-lg-7 col-md-7 col-sm-7 product-single-info">

                <h2><?php echo ucwords($product->product);?></h2>
                <table>
                  <tr>
                    <td>Availability</td>
                    <td><span class="green">in stock</span></td>
                  </tr>
                </table>

                <span class="price">
                  <?php if( $product->old_price!='') { ?>
                <del>
                      &#x20B9; <span class="price-old"><?php echo $product->old_price?></span>
                </del>
                <?php } ?> &#x20B9; <span class="price-new"><?php echo $product->price?></span>
                  </span>
                  <br />
                  <strong>Contact Details</strong>
                  <table>
                    <tr>
                      <td>Address</td>
                      <td>
                        <?php echo $product->user->business_name.', '.$product->user->address.', '.$product->user->area->area_name.', '.$product->user->states->state_name.'-'.$product->user->post_code; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>
                        <?php echo $product->user->email; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Mobile</td>
                      <td>
                        <?php echo $product->user->contact_no; ?>
                      </td>
                    </tr>
                  </table>
                  <br />

                  <?php 
                      $offer = Productoffers::model()->findAll(array('condition'=>'status="active" and product_id='.$product->pid ) );

                      foreach ($offer as $off ) 
                        {  
                    ?>
                    <strong>Offer: </strong>
                    <span class="price">
                      <span class="price-new"><?php echo $off->description; ?></span>
                    </span>
                    <?php
                        } 
                    ?>


              </div>

            </div>

          </div>
          <!-- /Product -->


          <!-- Product Tabs -->

          <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">

              <div class="tabs">

                <div class="tab-heading">
                  <a href="#tab1" class="button big">Description</a>
                </div>

                <div class="page-content tab-content">

                  <div id="tab1">
                    <p>
                      <?php echo $product->description;?>
                    </p>
                  </div>


                </div>
              </div>
            </div>
          </div>
          <!-- /Product Tabs -->
        </div>
      </section>


      <script type="text/javascript">
        function fun(tmp) {
          if (tmp == 'image1') {
            $('#image3').hide();
            $('#image2').hide();
            $('#image1').show();
          }
          if (tmp == 'image2') {
            $('#image3').hide();
            $('#image1').hide();
            $('#image2').show();
          }
          if (tmp == 'image3') {
            $('#image1').hide();
            $('#image2').hide();
            $('#image3').show();
          }

        }
      </script>

      <div class="right">


      </div>
    </div>


    </div>
    <!--Middle Part End-->
    <div class="clear"></div>

    </div>
    </div>


    <?php
if(Yii::app()->user->getState('uid')!=null)
{
    $info=Users::model()->findByPk( Yii::app()->user->getState('uid') );
     ?>
      <!--div id="sale_modal" class="popupContainer" style="display:none;position: absolute!important;">
    <header class="popupHeader ">
      <span class="header_title">Request for Product</span>
      <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>
    
    <section class="popupBody ">      
      <!-- Username & Password Login form -->
      <!--div class="user_login">
        <form id="request-form1">

          <label>Vendor/Seller : <strong> <?php echo ucwords( $info->first_name.' '.$info->last_name ) ;?></strong></label>
          <label>E Mail : <strong> <?php echo $info->email;?></strong></label>

          <label>Contact Number : <strong> <?php echo $info->contact_no;?></strong></label>

          <label>Your Message : </label> 
          <input type="hidden" name="owner_id" value="<?php echo $info->uid;?>">    
          <input type="hidden" name="product_id" value="<?php echo $product->pid;?>">  

          <textarea id="message" name="message"> </textarea>
          <br /> <br />          

          <div class="action_btns">
            <div class="one_half"><a href="#" class="btn modal_close">Cancel</a></div>
            <div class="one_half last"><a href="#" id="send1"  class="btn btn_red send">Send</a></div>
          </div>
        </form>
      </div>

    </section>
  </div-->


      <?php 
} ?>
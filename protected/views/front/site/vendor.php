
<?php $this->pageTitle='Jhansishopping.com | Vendors';?>
<?php 


$url = Yii::app()->theme->baseUrl; 

?>

  <div id="container">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <?php $this->renderPartial('left');?>
      </div>
    <!--Middle Part Start-->
	<section class="main-content col-lg-9 col-md-9 col-sm-9 col-xs-12">
    <div id="content">
      <div class="box">
        <div class="box-heading">
		
		
		<div class="breadcrumb"> <?php  echo $nav;?></div>
      <!--Breadcrumb Part End-->
		
		
		
		</div>
        <div class="box-content">
          <div class="box-product">
			<div class="row">
                  <?php 
         $p_url=Yii::app()->baseUrl.'/upload/products/';
          foreach($products as $product)
          {
            ?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			  <div class="product-image">
			  <a href="<?php echo Yii::app()->createUrl('site/productdetails',array('id'=>$product->pid));?>">
				<img src="<?php echo $p_url.$product->image;?>" />
			   </a>
			  </div>

			  <div class="product-info">
				<h5><a href="<?php echo Yii::app()->createUrl('site/productdetails',array('id'=>$product->pid));?>"><?php echo substr(ucwords($product->product),0,20);?>..</a></h5>
				<span class="price">Rs. <?php echo $product->price;?></span>
			  </div>
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
      </div>
      <!--Featured Product Part End-->
    </div>
	</section>
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>
  </div>




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
	<div id="content">
      <!--Slideshow Part Start-->
      <!--<div class="slider-wrapper">
        <div id="slideshow" class="nivoSlider"> 
          <?php 
          $url_ads = Yii::app()->baseUrl.'/upload/ads/'; 
          if(!empty($ads)){
			  foreach ($ads as $ad )
			  {
				?>
					<a href="#"><img src="<?php echo $url_ads.$ad->image; ?>"/></a>                   
				   <?php
			  } 
		  }?>
        </div>
      </div>
      <script type="text/javascript">
        $(document).ready(function() {
            $('#slideshow').nivoSlider();
        });
      </script>
      <!--Slideshow Part End-->


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
					$p_url=Yii::app()->baseUrl.'/upload/products/';
					$pb_url = Yii::app()->basePath.'/../upload/products/';
		 			if(!empty($products)){
					foreach($products as $product){
				?>
                    <!-- Product Item -->
					
                    <div class="col-lg-4 col-md-4 col-sm-4 product">

                      <div class="product-image">
					  <a href="<?php echo Yii::app()->createUrl('site/productdetails',array('id'=>$product->pid));?>">
						<img src="<?php  if($product->image!='' and file_exists($pb_url.$product->image) ){ 
							echo $p_url.$product->image;
						}else{
							echo $p_url.'images.jpg';
						}?>" />
					   </a>
                      </div>

                      <div class="product-info">
                        <h5><a href="<?php echo Yii::app()->createUrl('site/productdetails',array('id'=>$product->pid));?>"><?php echo substr(ucwords($product->product),0,20);?>..</a></h5>
                        <span class="price">Rs. <?php echo $product->price;?></span>
                      </div>

                    </div>
                    <!-- Product Item -->
				<!--
                <div class="rating">
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
		  <br><br><div class="box-heading"><div class="breadcrumb"> Today's Offer</div></div><br><br>

		 
		 		<div class="row">
                <?php 
					$p_url=Yii::app()->baseUrl.'/upload/products/';
		 			   if(!empty($products1)){
						foreach($products1 as $product){
				?>
                    <!-- Product Item -->
					
                    <div class="col-lg-4 col-md-4 col-sm-4 product">

                      <div class="product-image">
					  <a href="<?php echo Yii::app()->createUrl('site/productdetails',array('id'=>$product->pid));?>">
						<img src="<?php if($product->image!='' and file_exists($pb_url.$product->image) ){ 
							echo $p_url.$product->image;
						}else{
							echo $p_url.'images.jpg';
						}?>" />
					   </a>
                      </div>

                      <div class="product-info">
                        <h5><a href="<?php echo Yii::app()->createUrl('site/productdetails',array('id'=>$product->pid));?>"><?php echo substr(ucwords($product->product),0,20);?>..</a></h5>
                        <span class="price">Rs. <?php echo $product->price;?></span>
                      </div>

                    </div>
                    <!-- Product Item -->
				<!--
                <div class="rating">
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
		  
		  <br><br><div class="box-heading"><div class="breadcrumb"> Discounts Vouchers</div></div><br><br>
		  
		  
<?php 
         $p_url=Yii::app()->baseUrl.'/upload/profile/';
		 $ppb_url = Yii::app()->basePath.'/../upload/profile/';
          if(!empty( $user))
          {
			 $model = DiscountVouchers::model()->findAll( array( 'condition'=>' vender_id='.$user->uid.' and status="Active" and total > 0') );

				/*$voucher_code ='';
				foreach( $model as $u )
				{
					$voucher_code .=$u->code.',';
				}	*/
				if(!empty($model)){
					foreach( $model as $obj ){ 
						$rem_voucher= Reservevouchers::model()->findAll(array('condition'=>"user_id=$user->uid and voucher_id= $obj->id"));
					
						$rem_voucher = $obj->total - count( $rem_voucher );
						if( $rem_voucher>0)
						{
					?>
					
					<div class="vouchers col-lg-6 col-md-6 col-sm-6">
						<article class="news">
						  <div class="news-background" >
								  <a class="row" href="#<?php //echo Yii::app()->createUrl('site/voucherdetails',array('id'=>$user->uid));?>">
									<div class="col-lg-3 col-md-4 col-sm-6 news-thumbnail">
									  <a href="#"><img src="<?php 
								if($user->photo!='' and file_exists($ppb_url.$user->photo) ){ 
									echo $p_url.$user->photo;
								}else{
									echo $p_url.'user.jpg';
								}  ?>" alt=""></a>
									</div>
									<div class="col-lg-9 col-md-8 col-sm-6 news-content">
									  <h5><a href="blog_post.html"><?php
											if($user->business_name!='')
												echo ucwords($user->business_name);
											else
												echo ucwords($user->first_name.' '.$user->last_name);
											
											?>	</a></h5>
									  <span class="date"><i class="icons icon-location-7"></i><?php echo $user->address.', '.$user->area->area_name.', '.$user->cities->city_name.', '.$user->cities->state->state_name; ?></span>
									  <p>
										<?php echo substr($obj->description,0,150); ?>
									  </p>
									  <p><b><?php echo " Valid Upto :". date('d-M-Y',strtotime($obj->to_date)).', '." Remaining Vouchers : $rem_voucher of $obj->total ";?></b></p>
									</div>
								  </a>
						  </div>
						</article>
						<a href="#" class="voucherClick" <?php if(!Yii::app()->user->isGuest){ ?> onclick="reserve_voucher('<?php echo $obj->id;?>')"
							  <?php } else { ?> data-toggle="modal" data-target="#loginModal"
								<?php } ?>>
								<h3>Click to get Voucher</h3>
						</a>
					</div>
					
					<?php
						}
					}
				}
          }
          ?>

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
<script>
reserve_voucher = function( vid )
{	  
      var data='vid='+vid;
      $.ajax( {
      type: "POST",
      url: "<?php echo Yii::app()->createUrl('site/reservevoucher');?>",
      data: data,
      success: function( response ) {            
            alert('Request Send Successful.');
			location.reload();
        }
      } );      
}
</script>
<style>	

.voucher:hover 
{					
   background-image: url('<?php echo Yii::app()->theme->baseUrl.'/image/voucher.png';?>') ;
	background-repeat: no-repeat;
	background-size: 100% 100%;
   height:100px;

	width:400px;
    opacity: 0.5;
    -webkit-opacity: 0.5;
    -moz-opacity: 0.5;
    transition: 0.5s ease;
    -webkit-transition: 0.5s ease;
    -moz-transition: 0.5s ease;

   
}
.voucher:hover :nth-child(1) 
{ 

  display: none; 
}		
</style>



<?php $this->pageTitle='Jhansishopping.com | Product Details';?>
<?php 

$url = Yii::app()->theme->baseUrl; 
$url_product = Yii::app()->baseUrl.'/upload/products/'; 
$url_img = Yii::app()->basePath.'/../upload/products/'; 
?>

   <?php $this->renderPartial('left');?>
  
<!--Middle Part Start-->
    
<div id="content">
      <!--Breadcrumb Part Start-->
	  <div class="box">
	  <div class="box-heading">
      <div class="breadcrumb"> <a href="<?php echo Yii::app()->createUrl('site/index')?>">Home</a> » <a href="<?php echo Yii::app()->createUrl('site/subcategories',array('id'=>$product->main_category_id))?>"><?php echo ucwords(strtolower ($product->mainCategory->category)); ?></a> » <a href="<?php echo Yii::app()->createUrl('site/products',array('id'=>$product->sub_category_id))?>"> <?php echo ucwords(strtolower($product->subCategory->sub_category)).'</a> » <a>'.ucwords(strtolower($product->product));?></a></div>
	  </div>
      <!--Breadcrumb Part End-->
	  </div>
      <div class="product-info">

        <div class="left">

          <?php 
          if (file_exists($url_img.$product->image) and $product->image!='') 
          {
              ?>
              <div  id='image1'>               
                  <img style="width:350px;height:400px;" src="<?php echo $url_product.$product->image;?>"  /> 
				  
              </div>
              <?php
          }
          ?>
          <?php 
          if (file_exists($url_img.$product->image2) and $product->image2!='') 
          {
              ?>
              <div  id='image2' style="display:none;">                
                  <img style="width:350px;height:400px;" src="<?php echo $url_product.$product->image2;?>" />              
              </div>
              <?php
          }
          ?>
          <?php 
          if (file_exists($url_img.$product->image3) and $product->image3!='') 
          {
              ?>
              <div  id='image3' style="display:none;">               
                  <img style="width:350px;height:400px;" src="<?php echo $url_product.$product->image3;?>" />              
              </div>
              <?php
          }
          ?>

          <div class="image-additional"> 
          <?php 
          if (file_exists($url_img.$product->image) and $product->image!='') 
          {
              ?>
              <a onClick='fun("image1")'> 
              <img src="<?php echo $url_product.$product->image ?>" width="40" /></a> 
              <?php
          }
          ?>
          <?php 
          if (file_exists($url_img.$product->image2) and $product->image2!='') 
          {
              ?>
              <a onClick='fun("image2")'> 
              <img src="<?php echo $url_product.$product->image2 ?>" width="40" /></a> 
              <?php
          }
          ?>
          <?php 
          if (file_exists($url_img.$product->image3) and $product->image3!='') 
          {
              ?>
              <a onClick='fun("image3")'> 
              <img src="<?php echo $url_product.$product->image3 ?>" width="40"/></a>
              <?php
          }
          ?>
           </div>
        </div>
<script type="text/javascript">
  
  function fun( tmp )
  {
    if(tmp=='image1')
    {
        $('#image3').hide();
        $('#image2').hide();
        $('#image1').show();
    }
    if(tmp=='image2')
    {
        $('#image3').hide();        
        $('#image1').hide();
        $('#image2').show();
    }
    if(tmp=='image3')
    {
        $('#image1').hide();
        $('#image2').hide();
        $('#image3').show();  
    }
      
  }
</script>

        <div class="right">
          <h1><?php echo ucwords($product->product);?></h1>


          

          <div class="cart">      

            <span>Availability:</span> In Stock
          </div>
          <div class="price"> 
		  <?php if( $product->old_price!='') { ?>
              Old Price Rs. <span class="price-old"><?php echo $product->old_price?></span> <br><?php } ?>
             Current Price Rs. <span class="price-new"><?php echo $product->price?></span>
          </div>

            <strong>Contact :</strong> <br><?php echo $product->user->business_name.', '.$product->user->address.', '.$product->user->area->area_name.', '.$product->user->states->state_name.'-'.$product->user->post_code; ?>
			<br>
			Email: <?php echo $product->user->email; ?>
			<br>
			Mobile: <?php echo $product->user->contact_no; ?>
			
			<?php
            // if(Yii::app()->user->getState('uid')!=null)
            // {  ?>   
                <!--a class="button popup" href="#sale_modal">Contact Seller</a--> 
              <?php
              // } else {?>
                  <!--a class="button" id="login_buy_now" onclick="login()">Contact Seller</a--> 
              <?php
              // } ?>
            <br/> <br/>
         <?php 
          $offer = Productoffers::model()->findAll(array('condition'=>'status="active" and product_id='.$product->pid ) );

          foreach ($offer as $off ) 
          {  
               ?>
              <div class="cart"><h2>Offer</h2>             
                <?php echo $off->description; ?>
              </div>
              <?php
          } ?>

           
        </div>
      </div>


      <!-- Tabs Start -->

      <div id="tabs" class="htabs"> <a href="#tab-description">Description</a> <!--<a href="#tab-review">Reviews</a>--> </div>
      <div id="tab-description" class="tab-content">        
          <?php echo $product->description;?>
      </div>

    </div>
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>
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
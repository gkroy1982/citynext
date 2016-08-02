<?php   $p_url=Yii::app()->baseUrl.'/upload/products/';  ?>

  <!--
<div style='width:155px;height:200px;'>
  <div class="image">
    <a href="">
      <img src="" style='width:152px;height:152px;' /></a>
  </div>
  <div class="name" style="text-align:center;">

  </div>
  <div class="price">

  </div>
  <div class="rating">
    <img src="<?php echo $url; ?>/image/stars-<?php echo $data->rating;?>.png" />
  </div>
  <div class="cart">
    <a href="<?php echo Yii::app()->createUrl('card/addcard',array('id'=>$data->pid));?>">
      <input type="button" value="Add to Cart" onClick="addToCart('40');" class="button" />
    </a>
  </div>
</div>
-->

  <!-- Product Item -->
  <div class="col-lg-4 col-md-4 col-sm-4 product">
    <div class="product-image">
      <a href="<?php echo Yii::app()->createUrl('site/productdetails',array('id'=>$data->pid));?>" class="product-hover">
      <img src="<?php echo $p_url.$data->image;?>" alt="Product">
      </a>
    </div>

    <div class="product-info">
      <h5><a href="<?php echo Yii::app()->createUrl('site/productdetails',array('id'=>$data->pid));?>"><?php echo substr(ucwords($data->product),0,20);?>..</a></h5>
      <span class="price">Rs.<?php echo $data->price;?></span>
    </div>

  </div>
  <!-- Product Item -->
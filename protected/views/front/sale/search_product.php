﻿

<?php   $p_url=Yii::app()->baseUrl.'/upload/products/';  ?>

  <div style='width:155px;height:200px;'>
    <div class="image">
        <a href="<?php echo Yii::app()->createUrl('site/productdetails',array('id'=>$data->pid));?>">
        <img src="<?php echo $p_url.$data->image;?>" style='width:152px;height:152px;' /></a>
    </div>
    <div class="name" style="text-align:center;">
      <a href="<?php echo Yii::app()->createUrl('site/productdetails',array('id'=>$data->pid));?>"><?php echo substr(ucwords($data->product),0,20);?>..</a>
    </div>
    <div class="price"><?php echo $data->price;?></div>
   <!-- <div class="rating">
        <img src="<?php echo $url; ?>/image/stars-<?php echo $data->rating;?>.png" />
    </div>
    <div class="cart">
      <a href="<?php echo Yii::app()->createUrl('card/addcard',array('id'=>$data->pid));?>"><input type="button" value="Add to Cart" onClick="addToCart('40');" class="button" /></a>
    </div>-->
  </div>





﻿<div style="float:right;">
  <?php
  
    if(Yii::app()->user->getState('uid')!=null)
    {  ?>   
       <!-- <a class="button" id="trigger_sale_modal" href="#sale_modal">Sell Now</a> -->
        <a class="button"  href="<?php echo Yii::app()->createUrl('/saleproduct/create');?>">Post Product To Sell</a> 
        
      <?php
      } else {?>
		<a href="#" class="button" data-toggle="modal" data-target="#loginModal">Post Product To Sell</a> 
      <?php
      } ?>   
</div>








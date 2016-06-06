<div style="float:right;">
  <?php
    if(Yii::app()->user->getState('uid')!=null)
    {  ?>   
       
        <a class="button"  href="<?php echo Yii::app()->createUrl('/classifieds/create');?>">Post Classifieds</a> 
        
      <?php
      } else {?>
          <a class="button" id="login_buy_now" onclick="login()">Post Classifieds</a> 
      <?php
      } ?>   
</div>








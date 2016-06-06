<div style="float:right;">
  <?php
    if(Yii::app()->user->getState('uid')!=null)
    {  ?>   
       
        <a class="button"  href="<?php echo Yii::app()->createUrl('/condolences/create');?>">Post Obituaries</a> 
        
      <?php
      } else {?>
          <a class="button" id="login_buy_now" onclick="login()">Post Obituaries</a> 
      <?php
      } ?>   
</div>








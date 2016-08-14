<div style="float:right;">
  <?php
    if(Yii::app()->user->getState('uid')!=null)
    {  ?>   
       
        <a class="button"  href="<?php echo Yii::app()->createUrl('/classifieds/create');?>">Post Classifieds</a> 
        
      <?php
      } else {?>
	  <a href="#" class="button" data-toggle="modal" data-target="#loginModal">Post Classifieds</a> 
      <?php
      } ?>   
</div>








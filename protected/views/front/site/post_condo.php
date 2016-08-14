<div style="float:right;">
  <?php
    if(Yii::app()->user->getState('uid')!=null)
    {  ?>   
       
        <a class="button"  href="<?php echo Yii::app()->createUrl('/condolences/create');?>">Post Obituaries</a> 
        
      <?php
      } else {?>
          <a href="#" class="button" data-toggle="modal" data-target="#loginModal">Post Obituaries</a>
      <?php
      } ?>   
</div>








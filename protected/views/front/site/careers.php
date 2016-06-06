<?php $this->pageTitle='Jhansishopping.com | Careers';?>   
  <div id="container">
   <?php $this->renderPartial('left');?>

    <!--Middle Part Start-->
    <div id="content">
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="<?php echo Yii::app()->createUrl('site/index');?>">Home</a> » Career </div>
      <!--Breadcrumb Part End-->
  


        <div class="content">
      <?php 
      foreach ($model as $job)
      {
        ?>
          <div class="accordion">
              <div class="accordion-heading"><?php echo ucwords($job->job_profile);?></div>
              <div class="accordion-content">
                <div class="content" id="coupon">
                  <table style="width:100%;">
                    <tr>
                      <th style="width:20%;">Job Profile : </th>
                      <td> <?php echo $job->job_profile;?> </td>
                    </tr>
                    <tr>
                      <th style="width:20%;">Key Responsibility : </th>
                      <td> <?php echo $job->key_responsibility;?> </td>
                    </tr>
                    <tr>
                      <th style="width:20%;">Qualification : </th>
                      <td> <?php echo $job->qualification;?> </td>
                    </tr>
                    <tr>
                      <th style="width:20%;">No Of Vacancy : </th>
                      <td> <?php echo $job->no_of_vacancy;?> </td>
                    </tr>
                    <tr>
                      <th style="width:20%;">Experience : </th>
                      <td> <?php echo $job->experience;?> </td>
                    </tr>
                    <tr>
                      <th style="width:20%;"> </th>
                      <td> <a class='button' href="<?php echo Yii::app()->createUrl('site/jobapply',array('id'=>$job->cid));?>"> Apply</a> </td>
                    </tr>
                  </table>
                    
                  
                </div>
              </div>
            </div>
          <?php
        }
      ?>
        

    </div>
     </div>
 

    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>
  </div>

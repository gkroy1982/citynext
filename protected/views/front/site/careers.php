<?php $this->pageTitle='Jhansishopping.com | Careers';?>
  <div id="container" class="content">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
      <?php $this->renderPartial('left');?>
    </div>
    <!--Middle Part Start-->
    <section class="main-content col-lg-9 col-md-9 col-sm-9 col-xs-12">
      <div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="<?php echo Yii::app()->createUrl('site/index');?>">Home</a> » Career </div>
        <!--Breadcrumb Part End-->
        <div class="content">
          <div class="panel-group" id="accordion">
		<?php 
		foreach ($model as $job) {
        ?>
              <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $job->cid ?>">
                  <div class=" carousel-heading " style="margin-bottom:0px">
                    <h4 class="panel-title"><?php echo ucwords($job->job_profile);?></h4>
                  </div>
                </a>
                <div id="collapse<?php echo $job->cid ?>" class="panel-collapse collapse ">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <table class="orderinfo-table">
                          <tr>
                            <th>Job Profile</th>
                            <td>
                              <?php echo $job->job_profile;?>
                            </td>
                          </tr>

                          <tr>
                            <th>Keys & Responsibilities</th>
                            <td>
                              <?php echo $job->key_responsibility;?>
                            </td>
                          </tr>

                          <tr>
                            <th>Qualification</th>
                            <td>
                              <?php echo $job->qualification;?>
                            </td>
                          </tr>

                          <tr>
                            <th>No. Of Vacancies</th>
                            <td>
                              <?php echo $job->no_of_vacancy;?>
                            </td>
                          </tr>

                          <tr>
                            <th>Experience</th>
                            <td>
                              <?php echo $job->experience;?>
                            </td>
                          </tr>
                          <!--
<tr>
  <th>Details</th>
  <td>A worker at a car dealership who sells the most cars month after month is an example of a person with great salesmanship skills.</td>
</tr>
-->

                          <table>
                            <tr>
                              <input href="<?php echo Yii::app()->createUrl('site/jobapply',array('id'=>$job->cid));?>" class="big" type="submit" value="Apply Here">
                            </tr>
                          </table>

                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
        }
      ?>
          </div>

          <!--
 <div class="accordion">
  <div class="accordion-heading">

  </div>
  <div class="accordion-content">
    <div class="content" id="coupon">
      <table style="width:100%;">
        <tr>
          <th style="width:20%;">Job Profile : </th>
          <td>

          </td>
        </tr>
        <tr>
          <th style="width:20%;">Key Responsibility : </th>
          <td>

          </td>
        </tr>
        <tr>
          <th style="width:20%;">Qualification : </th>
          <td>

          </td>
        </tr>
        <tr>
          <th style="width:20%;">No Of Vacancy : </th>
          <td>

          </td>
        </tr>
        <tr>
          <th style="width:20%;">Experience : </th>
          <td>

          </td>
        </tr>
        <tr>
          <th style="width:20%;"> </th>
          <td> <a class='button' href=""> Apply</a> </td>
        </tr>
      </table>


    </div>
  </div>
</div>
-->

        </div>
      </div>
    </section>

    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">

    </div>
  </div>
<?php 

$url = Yii::app()->theme->baseUrl; 
?>

    <div id="container">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <?php $this->renderPartial('/products/left');?>
      </div>
      <!--Middle Part Start-->
      <section class="main-content col-lg-9 col-md-9 col-sm-9 col-xs-12 content">
        <div id="content">
            <div class="box">
              <div class="box-heading">
                <div class="">
                  <?php echo $nav;?>
                </div>
              </div>
              <div class="col-lg-9 col-md-9 col-sm-9">
				<?php  if(Yii::app()->user->hasFlash('success')):  ?>    <div class="alert alert-success">
				<?php echo Yii::app()->user->getFlash('success');  ?>    </div>
				<?php  endif;  ?>

				<?php Yii::app()->clientScript->registerScript(
				   'myHideEffect',
				   '$(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
				   CClientScript::POS_READY
				);

				?>
					<div class="carousel-heading">
						<h4><?php echo $model->full_name; ?></h4>
					</div>
					
					<table class="orderinfo-table">
						<tr>
							<th>User Type</th>
							<td><?php echo (($model->user_type==1)?"Customer":"Dealer"); ?></td>
						</tr> 									
						<tr>
							<th>Full Name</th>
							<td><?php echo $model->full_name; ?></td>
						</tr>
						<tr>
							<th>Age</th>
							<td><?php echo $model->age; ?></td>
						</tr>									
						<tr>
							<th>Profession</th>
							<td><?php echo $model->business_type; ?></td>
						</tr>									
						<tr>
							<th>Email</th>
							<td><?php echo $model->email; ?></td>
						</tr>									
						<tr>
							<th>Contact No.</th>
							<td><?php echo $model->contact_no; ?></td>
						</tr>									
						<tr>
							<th>Address</th>
							<td><?php echo $model->address; ?></td>
						</tr> 									
						<tr>
							<th>Pin Code</th>
							<td><?php echo $model->post_code; ?></td>
						</tr> 									
						<tr>
							<th>Area Name</th>
							<td><?php echo $model->area->area_name; ?></td>
						</tr> 									
						<tr>
							<th>Business Name</th>
							<td><?php echo $model->business_name; ?></td>
						</tr> 									
						<tr>
							<th>Solution</th>
							<td><?php echo $model->solution; ?></td>
						</tr> 
															
						<tr>
							<th>Company</th>
							<td><?php echo $model->company; ?></td>
						</tr> 
															
						<tr>
							<th>Security Question</th>
							<td><?php echo $model->question->question; ?></td>
						</tr> 									
						<tr>
							<th>Answer</th>
							<td><?php echo $model->answer; ?></td>
						</tr> 									
						<tr>
							<th>City</th>
							<td><?php echo $model->cities->city_name; ?></td>
						</tr> 									
						<tr>
							<th>State</th>
							<td><?php echo $model->states->state_name; ?></td>
						</tr> 
						
					</table>
				</div>
				
				<div class="col-lg-3 col-md-3 col-sm-3">
					<div class="carousel-heading">
						<h4>Image</h4>
					</div>
					
					<table class="orderinfo-table ">
					<?php 
  				$url_img = Yii::app()->basePath.'/../upload/profile/'; 
  				if( $model->photo!='' and file_exists( $url_img.$model->photo ) ){?>
						<tr>
							<img src="<?php echo Yii::app()->request->baseUrl.'/upload/profile/'.$model->photo;?>" class="profile-pic img-responsive center-block">
						</tr>
						<?php } else {?>
						<tr>
							<img src="<?php echo Yii::app()->request->baseUrl.'/upload/profile/user.jpg';?>" class="profile-pic img-responsive center-block">
						</tr>
						<?php } ?>
					</table>
				</div>
				
            </div>
        </div>
      </section>

      <div class="clear"></div>
      <div class="social-part"></div>
    </div>
    <!--Middle Part End-->
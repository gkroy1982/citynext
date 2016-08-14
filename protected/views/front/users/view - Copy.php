<?php 

$url = Yii::app()->theme->baseUrl; 
?>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/bootstrap.min.css" media="screen"/>
<style>
.grid-view {
    padding: 15px 0;
    width: 98%;
}
</style>
  <div id="container">
   <?php $this->renderPartial('/products/left');?>
    <!--Middle Part Start-->
    <div id="content">
      <!--Featured Product Part Start-->
      <div class="box">
       <?php //$this->renderPartial('/products/menu');?>
		<div class="box-heading"><?php echo $nav;?></div>
        <div class="box-content">
        <?php  if(Yii::app()->user->hasFlash('success')):  ?>    <div class="alert alert-success">
        <?php echo Yii::app()->user->getFlash('success');  ?>    </div>
		<?php  endif;  ?>

		<?php Yii::app()->clientScript->registerScript(
		   'myHideEffect',
		   '$(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
		   CClientScript::POS_READY
		);

		?>
		<style>
		th
		{
			text-align:right;
		}
		td
		{
			padding-left: 20px;
		}
		</style>
          <div class="box-product"> 
          		<?php 
  				$url_img = Yii::app()->basePath.'/../upload/profile/'; 
  				if( $model->photo!='' and file_exists( $url_img.$model->photo ) ){?>
                    <div style="float:right;margin-right:150px;">
	          			<img style="width:150px;" src="<?php echo Yii::app()->request->baseUrl.'/upload/profile/'.$model->photo;?>">
	          		</div>
                <?php } else {?>
                    <div style="float:right;margin-right:150px;">
	          			<img style="width:150px;" src="<?php echo Yii::app()->request->baseUrl.'/upload/profile/user.jpg';?>">
	          		</div>                             
                <?php } ?>

				<table style="width:60%;margin:20px;">
					<tr>
						<th style="width:25%;">User Type :</th>
						<td><?php echo (($model->user_type==1)?"Customer":"Dealer"); ?></td>
					</tr>
					<tr>
						<th>Full Name :</th>
						<td><?php echo $model->full_name; ?></td>
					</tr>
					<tr>
						<th>Age :</th>
						<td><?php echo $model->age; ?></td>
					</tr>
					<tr>
						<th>Profesion :</th>
						<td><?php echo $model->business_type; ?></td>
					</tr>
					<tr>
						<th>Email :</th>
						<td><?php echo $model->email; ?></td>
					</tr>
					<tr>
						<th>Contact No :</th>
						<td><?php echo $model->contact_no; ?></td>
					</tr>

					<tr>
						<th>Address :</th>
						<td><?php echo $model->address; ?></td>
					</tr>

					<tr>
						<th>Pin Code :</th>
						<td><?php echo $model->post_code; ?></td>
					</tr>
					<tr>
						<th>Area Name :</th>
						<td><?php echo $model->area->area_name; ?></td>
					</tr>

					<tr>
						<th>Business Name :</th>
						<td><?php echo $model->business_name; ?></td>
					</tr>
					<tr>
						<th>Solution :</th>
						<td><?php echo $model->solution; ?></td>
					</tr>
					<tr>
						<th>Company :</th>
						<td><?php echo $model->company; ?></td>
					</tr>
					<tr>
						<th>Question :</th>
						<td><?php echo $model->question->question; ?></td>
					</tr>
					<tr>
						<th>Answer :</th>
						<td><?php echo $model->answer; ?></td>
					</tr>
					<tr>
						<th>City :</th>
						<td><?php echo $model->cities->city_name; ?></td>
					</tr>
					<tr>
						<th>State :</th>
						<td><?php echo $model->states->state_name; ?></td>
					</tr>

				</table>




          </div>

        </div>
      </div>
      <!--Featured Product Part End-->
    </div>
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>
  </div>

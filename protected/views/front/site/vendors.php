
<?php $this->pageTitle='Jhansishopping.com | Vendors';?>
<?php 


$url = Yii::app()->theme->baseUrl; 

?>

  <div id="container">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <?php $this->renderPartial('left');?>
      </div>
    <!--Middle Part Start-->
	<section class="main-content col-lg-9 col-md-9 col-sm-9 col-xs-12">
    <div id="content">
    
      <!--Slideshow Part Start-->
      <!--<div class="slider-wrapper">
        <div id="slideshow" class="nivoSlider"> 
          <?php 
          $url_ads = Yii::app()->baseUrl.'/upload/ads/'; 
          foreach ($ads as $ad )
          {
            ?>
                <a href="#"><img src="<?php echo $url_ads.$ad->image; ?>"/></a>                   
               <?php
          } ?>
        </div>
      </div>
      <script type="text/javascript">
        $(document).ready(function() {
            $('#slideshow').nivoSlider();
        });
      </script>
      <!--Slideshow Part End-->


      <!--Featured Product Part Start-->
	  
	  <!--Breadcrumb Part Start-->
      
	  
	  
      <div class="box">
        <div class="box-heading">
		
		
		<div class="breadcrumb"> <?php  echo $nav;?></div>
      <!--Breadcrumb Part End-->
		
		
		
		</div>
        <div class="box-content">
          <div class="box-product">
			<div class="row">
         <?php 
         $p_url=Yii::app()->baseUrl.'/upload/profile/';
		 $pb_url = Yii::app()->basePath.'/../upload/profile/';
          foreach($vendors as $user)
          {
            ?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			  <div class="product-image" style="height:auto;>
			  <a href="<?php echo Yii::app()->createUrl('site/products',array('id'=>$cid,'uid'=>$user->uid));?>">
				<img src="<?php if($product->photo!='' and file_exists($pb_url.$product->photo) ){ 
					echo $p_url.$product->photo;}else{
						echo $p_url.'user.jpg';
					} ?>" />
			   </a>
			  </div>

			  <div class="product-info">
				<h5><a href="<?php echo Yii::app()->createUrl('site/products',array('id'=>$cid,'uid'=>$user->uid));?>"><?php
				if($user->business_name!='')
					echo ucwords($user->business_name);
				else
					echo ucwords($user->first_name.' '.$user->last_name);
				?></a></h5>
			  </div>
            </div>
            <?php
          }
          ?>
			</div>
          </div>
        </div>
      </div>
      <!--Featured Product Part End-->
    </div>
	</section>
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>
  </div>



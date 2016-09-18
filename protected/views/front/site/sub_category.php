<?php $this->pageTitle='Jhansishopping.com | Sub Categories';?>
<?php 

$url = Yii::app()->theme->baseUrl; 

//$products=array();
?>

  <div id="container" class="content">
      <aside class="sidebar col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <?php $this->renderPartial('left');?>
      </aside>
    <!--Middle Part Start-->
	<section class="main-content col-lg-9 col-md-9 col-sm-9 col-xs-12">
    <div id="content">
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
      <div class="box">
            <div class="box-heading"><div class="breadcrumb"> <?php  echo $nav;?></div></div>
            <div class="box-content"> 
              <div class="box-product">
				<div class="row">
                 <?php 
                 $url_img = Yii::app()->basePath.'/../upload/icons/'; 
                 $p_url=Yii::app()->baseUrl.'/upload/icons/';
                  foreach($categories as $category)
                  {
                    ?>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="product-image">
						  <a href="<?php echo Yii::app()->createUrl('site/products',array('id'=>$category->scid));?>">
							<?php if($category->icon!='' and file_exists($url_img.$category->icon) ){?>
								<img src="<?php echo $p_url.$category->icon;?>" />
							<?php } else {?>
								<img src="<?php echo $p_url.'images.jpg';?>" />
								<?php } ?>
						   </a>
						</div>

					    <div class="product-info">
						  <h5><?php echo substr(ucwords($category->sub_category),0,20);?>..</h5>
					    </div>
					</div>
                    <?php
                  }
                  ?>
					</div>
                </div>
            </div>
          </div>
    </div>
	</section>
      <div class="clear"></div>
      <div class="social-part"></div>
    </div>
    <!--Middle Part End-->
<?php 

$url = Yii::app()->theme->baseUrl; 

//$products=array();
?>

  <div id="container">
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
                <a href=""><img src="<?php echo $url_ads.$ad->image; ?>"/></a>                   
               <?php
          } ?> 
        </div>
      </div>
      <script type="text/javascript">
        $(document).ready(function() {
            $('#slideshow').nivoSlider();
        });
      </script>-->
        <!--Slideshow Part End-->
        <!--Featured Product Part Start-->
        <div style="margin:20px 0 5px;">
          <?php $this->renderPartial('post_sell');?>
        </div>
        <div class="box">

          <div class="box-heading">
            <div class="breadcrumb">
              <?php  echo $nav;?>
            </div>
          </div>
          <div class="box-content">
            <div class="box-product subcategories">

              <?php 
                 $url_img = Yii::app()->basePath.'/../upload/icons/'; 
                 $p_url=Yii::app()->baseUrl.'/upload/icons/';
                  foreach($categories as $category)
                  {
                    ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 subcategory">
                  <a href="<?php echo Yii::app()->createUrl('sale/products',array('id'=>$category->mcid));?>">
                    <?php if($category->icon!='' and file_exists($url_img.$category->icon) ){?>
                      <img src="<?php echo $p_url.$category->icon;?>" alt="product">
                      <?php } else {?>
                        <img src="<?php echo $p_url.'images.jpg';?>" alt="product">
                        <?php } ?>
                          <div class="name" style="text-align:center;">

                          </div>
                          <div class="product-info">
                            <h6><?php echo substr(ucwords($category->category),0,20);?>..</h6>
                          </div>
                  </a>


                  <!--
<a href="<?php echo Yii::app()->createUrl('sale/products',array('id'=>$category->mcid));?>">
  <?php if($category->icon!='' and file_exists($url_img.$category->icon) ){?>
    <div class="image">
      <img style='width:152px;height:125px;' src="<?php echo $p_url.$category->icon;?>" />
    </div>
    <?php } else {?>

      <div class="image">
        <img style='width:152px;height:125px;' src="<?php echo $p_url.'images.jpg';?>" />
      </div>

      <?php } ?>
        <div class="name" style="text-align:center;">
          <?php echo substr(ucwords($category->category),0,20);?>..
        </div>
</a>
-->
                </div>
                <?php
                  }
                  ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="clear"></div>
    <div class="social-part"></div>
  </div>
  <!--Middle Part End-->
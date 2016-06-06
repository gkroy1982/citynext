<?php $this->pageTitle='Jhansishopping.com | Sub Categories';?>
<?php 

$url = Yii::app()->theme->baseUrl; 

//$products=array();
?>

  <div id="container">
   <?php $this->renderPartial('left');?>
    <!--Middle Part Start-->
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

                 <?php 
                 $url_img = Yii::app()->basePath.'/../upload/icons/'; 
                 $p_url=Yii::app()->baseUrl.'/upload/icons/';
                  foreach($categories as $category)
                  {
                    ?><div style='width:155px;height:150px;'>
                    <a href="<?php echo Yii::app()->createUrl('site/products',array('id'=>$category->scid));?>">
                        
                           <?php if($category->icon!='' and file_exists($url_img.$category->icon) ){?>
                              <div class="image">
                                <img style='width:152px;height:125px;' src="<?php echo $p_url.$category->icon;?>"  />
                              </div> 
                          <?php } else {?>
                              <div class="image">
                                  <img style='width:152px;height:125px;' src="<?php echo $p_url.'images.jpg';?>"  />
                              </div>                               
                          <?php } ?>
                          <div class="name" style="text-align:center;"> 
                            
                            <?php echo substr(ucwords($category->sub_category),0,20);?>..
                          </div>             
                        
                    </a></div>
                    <?php
                  }
                  ?>

                </div>
            </div>
          </div>

     
    </div>

      <div class="clear"></div>
      <div class="social-part"></div>
    </div>
    <!--Middle Part End-->
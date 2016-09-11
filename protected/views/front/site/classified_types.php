<?php 

$url = Yii::app()->theme->baseUrl; 

//$products=array();
?>
<div id="container" class="content">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<?php $this->renderPartial('left');?>
	  <!--Middle Part Start-->
	</div>
 
    <!--Middle Part Start-->
    <section class="main-content col-lg-9 col-md-9 col-sm-9 col-xs-12">
      <div id="content">
      
        <!--Slideshow Part End-->
        <!--Featured Product Part Start-->
        <div style="margin:15px -15px 5px 0;">
          <?php $this->renderPartial('post_classifieds');?>
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
                 $url_img = Yii::app()->basePath.'/../upload/classified_types/'; 
                 $p_url=Yii::app()->baseUrl.'/upload/classified_types/';
                  foreach($classifiedtypes as $classifiedtypes_row)
                  {
				?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 subcategory">
                  <a href="<?php echo Yii::app()->createUrl('site/classifieds',array('id'=>$classifiedtypes_row->id));?>">
                    <?php //if($classifiedtypes_row->image!='' and file_exists($url_img.$classifiedtypes_row->image) ){?>
                      <!--img src="<?php echo $p_url.$classifiedtypes_row->image;?>" alt="product"-->
                      <?php //} else {?>
                        <!--img src="<?php echo $p_url.'images.jpg';?>" alt="product"-->
                        <?php //} ?>
                          <div class="name" style="text-align:center;">

                          </div>
                          <div class="product-info">
                            <h6><?php echo substr(ucwords($classifiedtypes_row->name),0,20);?></h6>
                          </div>
                  </a> 
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
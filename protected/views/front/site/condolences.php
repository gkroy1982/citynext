<?php $this->pageTitle='Jhansishopping.com | Condolences';?>
  <?php 

$url = Yii::app()->theme->baseUrl; 

//$products=array();
?>

    <div id="container" class="content">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <?php $this->renderPartial('left');?>
      </div>
      <!--Middle Part Start-->
      <section class="main-content col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div id="content">
          <?php $this->renderPartial('post_condo');?>
            <div class="box">
              <div class="box-heading">
                <div class="breadcrumb">
                  <?php  echo $nav;?>
                </div>
              </div>
              <div class="box-content">
                <div class="box-product">

                  <?php 
                 $url_img = Yii::app()->basePath.'/../upload/condolence/'; 
                 $p_url=Yii::app()->baseUrl.'/upload/condolence/';
                  foreach($condolences as $condolence)
                  {
                    ?>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 classifieds">
                      <a href="<?php echo Yii::app()->createUrl('site/condolencedetails',array('id'=>$condolence->id));?>">
                        <div class="image" style="float:left;">
                          <?php if($condolence->image!='' and file_exists($url_img.$condolence->image) ){?>
                            <img style='width:100px;height:110px;' src="<?php echo $p_url.$condolence->image;?>" />
                            <?php } else {?>
                              <img style='width:100px;height:110px;' src="<?php echo $p_url.'images.jpg';?>" />
                              <?php } ?>
                        </div>
                        <div class="name">
                          <h4><?php echo substr(ucwords($condolence->title),0,20);?>...</h4>
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
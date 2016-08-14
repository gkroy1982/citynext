<?php $this->pageTitle='Jhansishopping.com | Condolence Details';?>
<?php 

$url = Yii::app()->theme->baseUrl; 
$url_product = Yii::app()->baseUrl.'/upload/condolence/'; 
$url_img = Yii::app()->basePath.'/../upload/condolence/'; 
?>


  
    <div id="container" class="content">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <?php $this->renderPartial('left');?>
          <!--Middle Part Start-->
      </div>

      <!--Middle Part Start-->
      <!-- Main Content -->
      <section class="main-content col-lg-9 col-md-9 col-sm-9">
<?php $this->renderPartial('post_condo');?>
        <!--Breadcrumb Part Start-->
        <div class="box">
          <div class="box-heading">
            <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="<?php echo Yii::app()->createUrl('site/index')?>">HOME</a> » <a href="<?php echo Yii::app()->createUrl('site/condolences')?>">OBITURIES</a> » <a><?php echo strtoupper( $condolence->title);?></a></div>
      <!--Breadcrumb Part End-->
          </div>
        </div>
        <!--Breadcrumb Part End-->

        <div id="product-single">

          <!-- Product -->
          <div class="product-single">

            <div class="row">

              <!-- Product Images Carousel -->
              <div class="col-lg-5 col-md-5 col-sm-5 product-single-image">

                <div id="product-slider">
                  <ul class="slides">
                    <?php 
					  if (file_exists($url_img.$condolence->image) and $condolence->image!='') 
					  {
						  ?>
                      <li>
                        <img class="cloud-zoom" src="<?php echo $url_product.$condolence->image;?>" data-large="<?php echo $url_product.$condolence->image;?>" alt="" />
                      </li>
                      <?php
					  }
					  ?>
                  </ul>
                </div>
                <div id="product-carousel">
                  <ul class="slides">
                    <?php 
					  if (file_exists($url_img.$condolence->image) and $condolence->image!='') 
					  {
						  ?>
                      <li>
                        <img src="<?php echo $url_product.$condolence->image;?>" data-large="<?php echo $url_product.$condolence->image;?>" alt="" />
                      </li>
                      <?php
					}
					?>
					</ul>
                </div>
              </div>
              <!-- /Product Images Carousel -->


              <div class="col-lg-7 col-md-7 col-sm-7 product-single-info">

                <h2><?php echo ucwords($condolence->title);?></h2>
               
                  <br />
                  <br />

                  <?php if($classified->date!='')
					{ 	?>
                    <strong>Date</strong>
                    <span class="price">
                      <span class="price-new"><?php echo date('d-m-Y',strtotime($classified->date)); ?></span>
                    </span>
                    <?php
                        } 
                    ?>


              </div>

            </div>

          </div>
          <!-- /Product -->


          <!-- Product Tabs -->

          <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">

              <div class="tabs">

                <div class="tab-heading">
                  <a href="#tab1" class="button big">Description</a>
                </div>

                <div class="page-content tab-content">

                  <div id="tab1">
                    <p>
                      <?php echo $condolence->description; ?>
                    </p>
                  </div>


                </div>
              </div>
            </div>
          </div>
          <!-- /Product Tabs -->
        </div>
      </section>


      <div class="right">


      </div>
    </div>


    </div>
    <!--Middle Part End-->
    <div class="clear"></div>

    </div>
    </div>


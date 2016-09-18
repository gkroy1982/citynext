<?php 

$url = Yii::app()->theme->baseUrl; 

 $letest = Products::model()->findAll();
 $specials = Products::model()->findAll();
 $ads2=Ads::model()->findAll( array('condition'=>'show_in=1 AND status ="active"'));
 $p_url=Yii::app()->baseUrl.'/upload/products/';
//$products=array();
?>



  <!--Left Part-->
  <div id="column-left">
    <!--Categories Part Start-->
    <div class="box">
      <!-- Categories -->
      <div class="sidebar-box purple">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
          <div class="sidebar-box-heading" id="sideMenuHeading">
            <i class="icons icon-folder-open-empty"></i>
            <h4>Categories</h4>
          </div>

          <div class="sidebar-box-content" id="sideMenuContent">
            <ul>
              <?php                  
                $mainMenus = MainCategory::model()->findAll(array('order'=>'category'));
                
				foreach($mainMenus as $menu)
                {
			  ?>
                <li><a><?php echo ucwords($menu->category);?><i class="icons icon-right-dir"></i></a>
                  <ul class="sidebar-dropdown">
                    <li>
                      <ul>
                        <?php 
                          $submenus = SubCategory::model()->findAll( array('condition'=>'main_category_id='.$menu->mcid,'order'=>'sub_category'));
                          foreach($submenus as $sub)
                          {
                            ?>
                          <li><a href="<?php echo Yii::app()->createUrl('site/vendors',array('id'=>$sub->scid))?>"><?php echo ucwords($sub->sub_category);?></a></li>
                          <?php
                          }
                          ?>
                      </ul>
                    </li>
                  </ul>
                </li>
                <?php
                }
                ?>
            </ul>
          </div>
        </div>
      </div>
      <!-- /Categories -->


      <div class="sidebar-box">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sidebar-carousel no-padding">
          <!-- Slider -->
          <section class="sidebar-slider">
            <div class="sidebar-flexslider">
              <ul class="slides">
                <?php
					$url_ads = Yii::app()->baseUrl.'/upload/ads/';
					$pb_url = Yii::app()->basePath.'/../upload/ads/';
					// var_dump($ads2);exit;
					$count_slide=0;
					foreach ($ads2 as $ad ) {
				?>
                  <li>
                    <a href="#">
						<img src="<?php 
						if($ad->image!='' and file_exists($pb_url.$ad->image) ){ 
							echo $url_ads.$ad->image;
						}else{
							echo $url_ads.'images.jpg';
						}  ?>" style='height:250px;'/>
					</a>
                  </li>
                  <?php
					} 
				?>
              </ul>
            </div>
            <div class="slider-nav"></div>
          </section>
        </div>
      </div>
	  <div class="sidebar-box">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sidebar-carousel no-padding">
			
            <h5 class="sidebar-box-heading">City Updates </h5>
            <marquee style="height:200px;" direction="up">
              <?php
				$news =Cityupdate::model()->findAll(array('condition'=>'status ="active"'));
				// var_dump($news[0]->attributes);exit;
					foreach($news as $obj ) {
						if($obj->image!='' and file_exists($pb_url.$obj->image) ){ 
							$furl = $url_ads.$obj->image;
						}else{
							$furl = $url_ads.'images.jpg';
						} 
						echo '<a href="'.Yii::app()->createUrl('//site/news',array('id'=>$obj->id)).'">';
						echo "<p><div class='image' style='float:left;'><img src=$furl height='40px' width='40px'></div>
						<div style='color:#0E0C0A;margin:2%; font-size:14px'><strong>
						".ucwords($obj->title)."
						</strong></div>
						<span style='color:#0E0C0A;margin:2%;float:right;'><b>By ". $obj->user->first_name.'</b> '.date('d-m-Y h:s a',strtotime($obj->created_on))."</span></p>";
						echo '</a><br>';
					}
				?>
            </marquee>
	    </div>
      </div>
    </div>
    <!--Categories Part End-->
    <!--Latest Product Start-->

    <!--
      <div class="box">
        <div class="box-heading">Latest</div>
        <div class="box-content">
          <div class="box-product">

        <?php          
          foreach($letest as $product)
          {
            ?>
            <div>
              <div class="image">
                  <a href="<?php echo Yii::app()->createUrl('site/productdetails',array('id'=>$product->pid));?>">
                  <img style="width:60px;" src="<?php echo $p_url.$product->image;?>"  /></a>
              </div>
              <div class="name">
                <a href="<?php echo Yii::app()->createUrl('site/productdetails',array('id'=>$product->pid));?>"><?php echo ucwords($product->product);?></a>
              </div>
              <div class="price"> <?php echo $product->price;?></div>
             
            </div>
            <?php
          }
          ?>



          </div>
        </div>
      </div>-->
    <!--Latest Product End-->
    <!--Specials Product Start-->
    <!--<div class="box">
        <div class="box-heading">Specials</div>
        <div class="box-content">
          <div class="box-product">

        <?php          
          foreach($specials as $product)
          {
            ?>
            <div>
              <div class="image">
                  <a href="<?php echo Yii::app()->createUrl('site/productdetails',array('id'=>$product->pid));?>">
                  <img style="width:60px;" src="<?php echo $p_url.$product->image;?>"  /></a>
              </div>
              <div class="name">
                <a href="<?php echo Yii::app()->createUrl('site/productdetails',array('id'=>$product->pid));?>"><?php echo ucwords($product->product);?></a>
              </div>
              <div class="price"> <?php echo $product->price;?></div>
             
            </div>
            <?php
          }
          ?>
            
          </div>
        </div>
      </div>
      <!--Specials Product End-->
  </div>
  <!--Left End-->
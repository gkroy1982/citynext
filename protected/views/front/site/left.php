<?php 

$url = Yii::app()->theme->baseUrl; 

 $letest = Products::model()->findAll();
 $specials = Products::model()->findAll();
 $p_url=Yii::app()->baseUrl.'/upload/products/';
//$products=array();
?>



  <!--Left Part-->
  <div id="column-left">
    <!--Categories Part Start-->
    <div class="box">

      <!-- Categories -->
      <div class="row sidebar-box purple">

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
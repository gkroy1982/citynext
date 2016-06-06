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
    <div class="box-heading">Services</div>

      <div class="box-content box-category">
          <ul id="custom_accordion1">		  
            <li class="category25"><a class="cuuchild " href="<?php echo Yii::app()->createUrl('sale/sell')?>">Used Products</a> 
				<!--ul style='display:block;'>
					<!--<li style='display:block;' class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('site/buy')?>">I Want To Buy</a></li>-->
					<!--li style='display:block;' class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('sale/sell')?>">I Want To Sell</a></li>
					
			   </ul-->
			</li> 
			<li class="category25"><a class="cuuchild " href="<?php echo Yii::app()->createUrl('site/classifieds')?>">Classifieds</a> 
				
			</li>
			<li class="category25"><a class="cuuchild " href="<?php echo Yii::app()->createUrl('site/condolences')?>">Obituaries</a> 
				
			</li>
          </ul>
        </div>
        <br>



        <div class="box-heading">Categories</div>
        <div class="box-content box-category" style='height:500px;overflow-x: hidden;overflow-y: scroll;'>
          <ul id="custom_accordion">
          <?php                  
                $mainMenus = MainCategory::model()->findAll(array('order'=>'category'));
                foreach($mainMenus as $menu)
                {
                  ?>
                  <li class="category25"><span class="down"><a class="cuuchild "><?php echo ucwords($menu->category);?></a> </span>
                    <ul>
                  
                        <?php 
                          $submenus = SubCategory::model()->findAll( array('condition'=>'main_category_id='.$menu->mcid,'order'=>'sub_category'));
                          foreach($submenus as $sub)
                          {
                            ?>
                                <li class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('site/vendors',array('id'=>$sub->scid))?>"><?php echo ucwords($sub->sub_category);?></a></li>
                             <?php
                          }
                          ?>
                      </ul>
                  </li>
                  <?php
                }
                ?>

          </ul>
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




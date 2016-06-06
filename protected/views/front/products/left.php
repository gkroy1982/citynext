<?php 

$url = Yii::app()->theme->baseUrl; 

 $letest = Products::model()->findAll();
 $specials = Products::model()->findAll();
 $p_url=Yii::app()->baseUrl.'/upload/products/'; 
//$products=array();

	$controller = Yii::app()->controller->id;
    $action     = Yii::app()->controller->action->id;
    $url = Yii::app()->theme->baseUrl; 

  if( $controller=='users' and $action=='view')
      $profile_view='active';
  if( $controller=='users' and $action=='update')
      $profile_update='active';

?>

    <!--Left Part-->
    <div id="column-left">
      <!--Categories Part Start-->
     <div class="box">
    <div class="box-heading">Profile</div>

      <div class="box-content box-category">
          <ul id="custom_accordion1">
            <li class="category25 <?php echo $profile_view;?>"><a class="cuuchild " href="<?php echo Yii::app()->createUrl('users/view',array('id'=>Yii::app()->user->getState('uid')));?>">View Profile</a> </li>
            <li class="category18 <?php echo $profile_update;?>"><a class="cuuchild " href="<?php echo Yii::app()->createUrl('users/update',array('id'=>Yii::app()->user->getState('uid')));?>">Update Profile</a></li>                         
          </ul>
        </div>
        <br>



        <div class="box-heading">Menu</div>
        <div class="box-content box-category">
          <ul id="custom_accordion">
	<!--li class="category25 <?php if( $controller=='ads'){ echo 'active';} ?>"><span class="down"><a class="cuuchild " >History</a> </span>
        <ul>
			<li class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('producthistory/admin')?>">Products / Services </a></li>
            <li class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('adshistory/admin')?>">Ads</a></li>
        </ul>
      </li-->


          <?php /*                 
                $mainMenus = MainCategory::model()->findAll();
                foreach($mainMenus as $menu)
                {
                  ?>
                  <li class="category25"><a class="cuuchild " href="<?php echo Yii::app()->createUrl('site/subcategories',array('id'=>$menu->mcid))?>"><?php echo ucwords($menu->category);?></a> <span class="down"></span>
                    <ul>
                  
                        <?php 
                          $submenus = SubCategory::model()->findAll( array('condition'=>'main_category_id='.$menu->mcid));
                          foreach($submenus as $sub)
                          {
                            ?>
                                <li class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('site/products',array('id'=>$sub->scid))?>"><?php echo ucwords($sub->sub_category);?></a></li>
                             <?php
                          }
                          ?>
                      </ul>
                  </li>
                  <?php
                }*/
                ?>

				
    <li class="category25 <?php if( $controller=='saleproduct'){ echo 'active';} ?>"><span class="down"><a class="cuuchild " >Used Products <span style="padding-left:76px;">( Free )</span></a> </span>
        <ul>
		<li class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('saleproduct/admin')?>">View</a></li>
            <li class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('saleproduct/create')?>">Add</a></li>
        </ul>
      </li>
    
	
	<li class=" category25 <?php if( $controller=='classifieds'){ echo 'active';} ?>"><span class="down">
		<a class="cuuchild " >Classifieds <span style="padding-left:96px;">( Free )</span></a> </span>
        <ul>
			<li class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('classifieds/admin')?>">View</a></li>
			<li class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('classifieds/create')?>">Add</a></li>     
		</ul>
     </li>
	
	<li class=" category25 <?php if( $controller=='cityupdate'){ echo 'active';} ?>"><span class="down">
		<a class="cuuchild " >City Updates <span style="padding-left:87px;">( Free )</span></a> </span>
        <ul>
			<li class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('cityupdate/admin')?>">View</a></li>
			<li class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('cityupdate/create')?>">Add</a></li>     
		</ul>
     </li>

	<li class=" category25 <?php if( $controller=='condolences'){ echo 'active';} ?>"><span class="down">
		<a class="cuuchild " >Obituaries <span style="padding-left:99px;">( Free )</span></a> </span>
        <ul>
			<li class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('condolences/admin')?>">View</a></li>
			<li class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('condolences/create')?>">Add</a></li>     
		</ul>
     </li>
				

                <?php 
    $record=Users::model()->findByPk(Yii::app()->user->getState('uid'));
    
    if(2==$record->user_type)
    {
    ?>
      <li class=" category25 <?php if( $controller=='products'){ echo 'active';} ?>"><span class="down">
	  <a class="cuuchild ">Products / Services <span style="padding-left:55px;">( Free )</span> </a> </span>
        <ul>
            <li class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('products/admin')?>">View</a></li>
	   <li class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('products/create')?>">Add</a></li>     
   </ul>
      </li>

      <li class="category25 <?php if( $controller=='productoffers'){ echo 'active';} ?>"><span class="down"><a class="cuuchild " >Today's Offers <span style="padding-left:82px;">( Paid )</span></a> </span>
        <ul>
            <li class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('productoffers/admin')?>">View </a></li>
      		   <li class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('productoffers/create')?>">Add </a></li>
	  </ul>
      </li>

      <li class="category25 <?php if( $controller=='ads'){ echo 'active';} ?>"><span class="down"><a class="cuuchild " >Home Page Image <span style="padding-left:55px;">( Paid )</span></a> </span>
        <ul>
		<li class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('ads/admin')?>">View</a></li>
            <li class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('ads/create')?>">Add</a></li>
        </ul>
      </li>
	  
	  <li class="category25 <?php if( $controller=='discountvouchers'){ echo 'active';} ?>"><span class="down"><a class="cuuchild " >Discount Vouchers <span style="padding-left:55px;">( Paid )</span></a> </span>
        <ul>
		<li class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('discountvouchers/admin')?>">View</a></li>
            <li class="category30"><a class="nochild " href="<?php echo Yii::app()->createUrl('discountvouchers/create')?>">Add</a></li>
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




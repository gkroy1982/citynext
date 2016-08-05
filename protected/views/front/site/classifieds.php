<?php $this->pageTitle='Jhansishopping.com | Classifieds';?>
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
		<div style="margin:15px -15px 5px 0;">
			<?php $this->renderPartial('post_classifieds');?>
        </div>
      <div class="box">
            <div class="box-heading"><div class="breadcrumb"> <?php  echo $nav;?></div></div>
            <div class="box-content"> 
              <div class="box-product">

                <?php 
                 $url_img = Yii::app()->basePath.'/../upload/classified/'; 
                 $p_url=Yii::app()->baseUrl.'/upload/classified/';
                  foreach($classifieds as $classified)
                  {
					  
                    ?><div style='width:40%;height:100px;border: 1px solid #98978f'>
					<!--
                    <a href="<?php echo Yii::app()->createUrl('site/classifieddetails',array('id'=>$classified->id));?>">
                        <div class="image" style="float:left;">
							<?php if($classified->image!='' and file_exists($url_img.$classified->image) ){?>
                                 <img style='width:100px;height:110px;' src="<?php echo $p_url.$classified->image;?>"  />
                                 <?php } else {?>                              
                                  <img style='width:100px;height:110px;' src="<?php echo $p_url.'images.jpg';?>"  />
                           <?php } ?>
						   </div> -->
                          <div class="name" style="text-align:left;float:right;width:98%;height:100px;"> 
                            
                            <h3><?php echo ucwords($classified->title);?></h3>
							<h5><?php //echo 'Category: '.ucwords($classified->classified->name);?></h5>
							<p><?php echo substr( $classified->description,0,25);?></p>
                          </div>             
                        
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
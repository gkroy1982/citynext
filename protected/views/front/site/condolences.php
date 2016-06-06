<?php $this->pageTitle='Jhansishopping.com | Condolences';?>
<?php 

$url = Yii::app()->theme->baseUrl; 

//$products=array();
?>

  <div id="container">
   <?php $this->renderPartial('left');?>
    <!--Middle Part Start-->
    <div id="content">
     <?php $this->renderPartial('post_condo');?>
      <div class="box">
            <div class="box-heading"><div class="breadcrumb"> <?php  echo $nav;?></div></div>
            <div class="box-content"> 
              <div class="box-product">

                 <?php 
                 $url_img = Yii::app()->basePath.'/../upload/condolence/'; 
                 $p_url=Yii::app()->baseUrl.'/upload/condolence/';
                  foreach($condolences as $condolence)
                  {
                    ?><div style='width:155px;height:150px;'>
                    <a href="<?php echo Yii::app()->createUrl('site/condolencedetails',array('id'=>$condolence->id));?>">
                        
                           <?php if($condolence->image!='' and file_exists($url_img.$condolence->image) ){?>
                              <div class="image">
                                <img style='width:152px;height:125px;' src="<?php echo $p_url.$condolence->image;?>"  />
                              </div> 
                          <?php } else {?>
                              <div class="image">
                                  <img style='width:152px;height:125px;' src="<?php echo $p_url.'images.jpg';?>"  />
                              </div>                               
                          <?php } ?>
                          <div class="name" style="text-align:center;"> 
                            
                            <?php echo substr(ucwords($condolence->title),0,20);?>...
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
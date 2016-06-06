	
 <div id="container">
   <?php $this->renderPartial('/products/left');?>
    <!--Middle Part Start-->
    <div id="content">
      <!--Featured Product Part Start-->
      <div class="box">
	  <div class="box-heading"><?php echo $nav;?></div>
       <?php //$this->renderPartial('/products/menu');?>

        <div class="box-content">
          <div class="box-product"> 
			<div class="col-sm-12 col-md-12 col-xs-12">
				<div class="section-title text-left"> <!-- Left Section Title -->
					<div class="msg-succ">
					<?php echo $response_text;?>
					</div>
				</div>
			</div>
          </div>
        </div>
      </div>
      <!--Featured Product Part End-->
    </div>
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>
  </div>
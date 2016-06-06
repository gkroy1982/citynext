<?php 

$url = Yii::app()->theme->baseUrl; 
?>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/bootstrap.min.css" media="screen"/>
<style>
.grid-view {
    padding: 15px 0;
    width: 98%;
}
</style>
  <div id="container">
   <?php $this->renderPartial('/products/left');?>
    <!--Middle Part Start-->
    <div id="content">
      <!--Featured Product Part Start-->
      <div class="box">
       <?php //$this->renderPartial('/products/menu');?>
	   <div class="box-heading"><?php echo $nav;?></div>

        <div class="box-content">
        <?php  if(Yii::app()->user->hasFlash('success')):  ?>    <div class="alert alert-success">
        <?php echo Yii::app()->user->getFlash('success');  ?>    </div>
		<?php  endif;  ?>

		<?php Yii::app()->clientScript->registerScript(
		   'myHideEffect',
		   '$(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
		   CClientScript::POS_READY
		);

		?>
          <div class="box-product"> 
		

			<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(
					'product',
					'mainCategory.category',
					'subCategory.sub_category',
					'version.version',
					'old_price',
					'price',
					'quantity',
					'description:html',
					'rating',					
					'status',
					'image',
					'image2',
					'image3',
				),
			)); ?>


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






<?php 

$url = Yii::app()->theme->baseUrl; 
?>
 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 <?php $this->renderPartial('/products/left');?>
  </div>
<section class="main-content col-lg-9 col-md-9 col-sm-9 content">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="carousel-heading no-margin">
				<h4><?php echo $nav;?></h4>
			</div>
			<?php $this->renderPartial('_form', array('model'=>$model,'price_model'=>$price_model)); ?>
		</div>
      <!--Featured Product Part End-->
    </div>
    <!--Middle Part End-->
</section>

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
			<?php  if(Yii::app()->user->hasFlash('success')):  ?>    
			<div class="alert alert-success">
				<?php echo Yii::app()->user->getFlash('success');  ?>    
			</div>
			<?php  endif;  ?>
			
			<?php Yii::app()->clientScript->registerScript(
			   'myHideEffect',
			   '$(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
			   CClientScript::POS_READY
			);

			?>
			
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(
					'product',
					'mainCategory.category',
					//'subCategory.sub_category',
					//'version.version',
					'price',
					'quantity',
					'description:html',
					//'rating',					
					'status',
					'image',
					'image2',
					'image3',
				),
			)); ?>
		</div>
      <!--Featured Product Part End-->
    </div>
    <!--Middle Part End-->
</section>

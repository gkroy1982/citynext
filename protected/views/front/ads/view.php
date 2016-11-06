
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

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	<?php $this->renderPartial('/products/left');?>
</div>

<section class="main-content col-lg-9 col-md-9 col-sm-9 content">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="carousel-heading no-margin">
				<h4><?php echo $nav; ?></h4>
			</div>
			
 
        <div class="box-content">
			<?php  if(Yii::app()->user->hasFlash('success')):  ?>    
			<div class="alert alert-success">
				<?php echo Yii::app()->user->getFlash('success');  ?>    
			</div>
			<?php  endif;  ?>
		</div>
		<?php Yii::app()->clientScript->registerScript(
		   'myHideEffect',
		   '$(".alert-success").animate({opacity: 1.0}, 3000).fadeOut("slow");',
		   CClientScript::POS_READY
		);

		?>
       
		
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(
					/*'aid',
					'user_id',*/
					'image',
					'description:html',
					'validity_days',
					array(
						'name'=>'start_date',
						'value'=>date("d-m-Y",strtotime($model->start_date)) ,
					),
					'amount',
					'status',
				),
			)); ?>
       	</div>
      <!--Featured Product Part End-->
    </div>
    <!--Middle Part End-->
</section>

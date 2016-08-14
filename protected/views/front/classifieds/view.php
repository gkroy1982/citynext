<?php 
$url = Yii::app()->theme->baseUrl; 
?>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	<?php $this->renderPartial('/products/left');?>
</div>
<section class="main-content col-lg-9 col-md-9 col-sm-9">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="carousel-heading no-margin">
				<h4>View Classifieds #<?php echo $model->id; ?></h4>
			</div>
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(
					'id',
					'classified_id',
					'user_id',
					'title',
					'description',
					'image',
					array(
						'name'=>'from_date',
						'value'=>date("d-m-Y",strtotime($model->from_date)) ,
					),
					array(
						'name'=>'to_date',
						'value'=>date("d-m-Y",strtotime($model->to_date)) ,
					),
					array(
						'name'=>'created_on',
						'value'=>date("d-m-Y H:i:s",strtotime($model->created_on)) ,
					),
					'status',
				),
			)); ?>
		</div>
      <!--Featured Product Part End-->
    </div>
    <!--Middle Part End-->
</section>

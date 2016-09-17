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
					'product.product',
					'offer.days',
					'description:html',
					array(
						'name'=>'start_date',
						'value'=>date("d-m-Y",strtotime($model->start_date)) ,
					),
					array(
						'name'=>'end_date',
						'value'=>date("d-m-Y",strtotime($model->end_date)) ,
					),
					'status',
					array(
						'name'=>'Transaction ID',
						'value'=>(($model->paymentstatus->txnid!='')?('TO-'.$model->paymentstatus->txnid):'-') ,
					),					
					array(
						'name'=>'Payment Amount',
						'value'=>(($model->paymentstatus->net_amount_debit!='')?($model->paymentstatus->net_amount_debit):'-') ,
					),
					
					array(
						'name'=>'Payment Date',
						'value'=>(($model->paymentstatus->addedon!='' & $model->paymentstatus->addedon!='1970-01-01')?(date("d-m-Y",strtotime($model->paymentstatus->addedon))):'-') ,
					),
					
				),
			)); ?>
		</div>
      <!--Featured Product Part End-->
    </div>
    <!--Middle Part End-->
</section>

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
	  <div class="box-heading"><?php echo $nav;?></div>
       <?php //$this->renderPartial('/products/menu');?>

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
        </div>
      </div>
      <!--Featured Product Part End-->
    </div>
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>
  </div>
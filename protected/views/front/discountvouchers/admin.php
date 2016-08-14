<!--- -->
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
				<h4><?php echo $nav;?></h4>
				<?php

				Yii::app()->clientScript->registerScript('search', "
				$('.search-button').click(function(){
					$('.search-form').toggle();
					return false;
				});
				$('.search-form form').submit(function(){
					$('#discountvouchers-grid').yiiGridView('update', {
						data: $(this).serialize()
					});
					return false;
				});
				");
				
				$this->title="List Discount vouchers";
				?>

			</div>
			<!--
			<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
			<div class="search-form" style="display:none;display:inline;">
				<?php //$this->renderPartial('_search',array('model'=>$model,)); ?>
			</div>
			-->

			<div class="panel-group" id="1accordion">
				<div class="panel panel-default">
				  <div class=" carousel-heading " style="margin-bottom:0px">
					<h4 class="panel-title">
					  <a data-toggle="collapse" data-parent="#1accordion" href="#collapsez" >Advanced Search</a>
					</h4>
				  </div>
				  <div id="collapsez" class="panel-collapse collapse ">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<?php $this->renderPartial('_search',array(
								  'model'=>$model,
								)); ?>
							</div>
						</div>
					</div>
				  </div>
				</div>
			</div>
			<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'discountvouchers-grid',
					'dataProvider'=>$model->search( array('condition'=>'vender_id='.Yii::app()->user->getState('uid')) ),
					'itemsCssClass'=>'table table-bordered',
					'enableSorting'=>false,
					
					'columns'=>array(
					array('header'=>'#','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize+($row+1)'),
				
						'code',
						'description',
						array(
							'name'=>'From Date',
							'header'=>'From Date',
							'value'=>'date("d-m-Y", strtotime($data->from_date))',
						),
						array(
							'name'=>'To Date',
							'header'=>'To Date',
							'value'=>'date("d-m-Y", strtotime($data->to_date))',
						),
						'total',
						array(
							'name'=>'Amount',
							'header'=>'Amount',
							'value'=>'$data->amount',
						),
						
						'status',
						/*
						'created_on',
						*/
						array(
						'name' => 'Pay Now',
						'header'=>'Pay Now',
						'id' => 'selectedIds',
						'value' => '$data->id',
						'class' => 'CCheckBoxColumn',
						'selectableRows' => '100', 							 
					),
					/*'user_id',
					'description',
					
					'created_on',
					*/
					
					array('class'=>'ButtonColumn',
							'template'=>'{view}  {update}  {paid}  {paynow} ',
							// 'template'=>'{view}  {update}  {paid}  {paynow}',
							// 'template'=>'($data->paymentstatus->status=="success" && $data->paymentstatus->net_amount_debit!=0)?"Paid":{view}{update}{delete}{paynow}',
							'evaluateID'=>true,
							'buttons'=>array(
								'paynow'=>array(
									'label'=>'Click to pay',
									# 'url'=>'Yii::app()->createUrl("site/doStuff", array("id"=>$data->id))',
									// 'options'=>array(
										// 'class'=>'btn_paynow','id'=>'$data->poid',
									// ),
									'visible'=>'($data->paymentstatus->status!="success" && $data->status=="Active")',
								),
								
								
								'update'=>array(
									'label'=>'Pay Now',
									// 'url'=>'Yii::app()->createUrl("site/doStuff", array("id"=>$data->id))',
									'options'=>array(
										'class'=>'btn_paynow','id'=>'$data->id',
									),
									'visible'=>'($data->status!="Active")',
								),
								'paid'=>array(
									'label'=>'Paid',
									// 'url'=>'Yii::app()->createUrl("site/doStuff", array("id"=>$data->id))',
									'options'=>array(
										  'style'=>'color:green;font-weight:bold;',
									),
									'visible'=>'($data->paymentstatus->status=="success" && $data->status=="Active")',
								),
							),
						),
					),
				)); ?>
		</div>
	</div>
</section>
  

  
  
  <?php $action = PAYU_BASE_URL . '/_payment';//PAYU_BASE_URL ?>
  
  <form  style="display: none;" id="frm_paynow" action="<?php echo $action; ?>" method="POST" name="payuForm" target="_blank">
  <!--form  style="display: block;" id="frm_paynow" action="<?php echo $action; ?>" method="POST" name="payuForm" target="_blank"-->
		
	<input type="hidden" name="key" id="key" value="<?php echo PAYU_MERCHANT_KEY; ?>" />
	<input type="hidden" name="hash" id="hash" value=""/>
	<input type="hidden" name="txnid" id="txnid" value="" />
	<input type="hidden" name="service_provider" id="service_provider" value="payu_paisa" />
	<input type="hidden" name="surl" id="surl" value="<?php echo $surl; ?>" />
	<input type="hidden" name="furl" id="furl" value="<?php echo $furl; ?>" />
	<input type="hidden" name="udf1" id="udf1" value=""  placeholder="reference product_offers(poid)"/>
	<input type="hidden" name="udf2" id="udf2" value=""  placeholder="reference discount_vouchers(id)"/>
	<input type="hidden" name="udf3" id="udf3" value=""  placeholder="reference ads(aid)"/>
	

<?php //echo 'domain= '.Yii::app()->getBaseUrl(true); ?>
	<input type="text" autocomplete="off"   placeholder="Your First Name *" id="firstname" name="firstname" value="" required data-validation-required-message="Please enter your name."  class='input-block'/>
										
	<input type="text" autocomplete="off"   placeholder="Your Last Name *" id="lastname" name="lastname" value="" required data-validation-required-message="Please enter your last name."  />
	
	<input type="email" autocomplete="off"   placeholder="Your Email " id="email" name="email" value="" required data-validation-required-message="Please enter your email address."/>
	
	<input type="text" autocomplete="off"   placeholder="Your Mobile " id="phone" name="phone" value="" required data-validation-required-message="Please enter your Mobile No." maxlength="10"/>
	
	<input type="text" autocomplete="off"   placeholder="Your Amount*" id="amount" name="amount" value="" required data-validation-required-message="Please enter amount." maxlength=""/>
	
	<!--input type="text" autocomplete="off"   placeholder="Kindly mention for what you are paying..." id="productinfo" name="productinfo" value="test" required data-validation-required-message="Please enter amount." maxlength=""-->
	
	<textarea rows="6" placeholder="Kindly mention for what you are paying..." id="productinfo" name="productinfo" required data-validation-required-message="Please enter a message.">test</textarea>
							
	<input type="submit" value="submit" id="btn_submit"/>						
</form>


<script type="text/javascript">
    $(document).ready(function(){  
		$('.checkbox-column').each(function(){								
			if ($(this).next().children().text()=='Paid' || $(this).next().children().text()=='') {
				$(this).children().attr('disabled',true);
			}
		});
	
	
	
	// $('#frm_paynow').hidden();
		$('#selectedIds_all').hide();
		$('#btn_pay').hide();
		$('.checkbox-column').click(function(){
			var selected_chkbox = $('input[name="selectedIds[]"]:checked').length;
			
			if(selected_chkbox<=0) {
				$('#btn_pay').hide();
				alert('Plese select checkbox to make payment');
				// return false;
			}else{
				$('#btn_pay').show();
			}
		});
		
		$('#btn_pay').click(function(){
		 // alert('jj'); 
			// $('input[name="selectedIds[]"]:checked').
			var ads_ids=$('input[name="selectedIds[]"]:checked').serialize();
			
			var product_offer_id=$(this).attr("id");
			// alert('product_offer_id='+product_offer_id);
			// payment_logid='';
			$.ajax({
				url: "<?php echo Yii::app()->getBaseUrl(true); ?>/index_new.php/discountvouchers/insertpaymentinfo",
				type: "POST",
				data: ads_ids,
				async:false,
			}).done(function(data){
				 // alert('data= '+data);exit;
				
				if(data=='req_field_blank'){
					alert('Some parameter missing.');
				}else{
					var obj = jQuery.parseJSON(data);
					// if(obj.id!=='')
					$("#txnid").val(obj.txnid);
					$("#hash").val(obj.hash);
					$("#firstname").val(obj.firstname);
					$("#lastname").val(obj.lastname);
					$("#email").val(obj.email);
					$("#phone").val(obj.phone);
					$("#udf1").val(obj.udf1);
					// $("#udf2").val(obj.udf2);
					$("#amount").val(obj.amount);
					$("#productinfo").val(obj.productinfo);
									
					var payuForm = document.forms.payuForm;
					payuForm.submit();
				}		
			}); 
			// $('#btn_submit').click();
		});
		
	// $('#filterbydate').click(function(){
		// $('#filterbydatepara').toggle();
	 // });

	 // $('#search_button').click(function(){
		// $('#search_filter').toggle();
	// });			 
	});
</script>
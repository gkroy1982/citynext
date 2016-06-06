<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bulksms-form',
	'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Select Filter Criteria To Send Sms</p>

	
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'user_type'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'user_type',array(''=>'Select','1'=>'Customer','2'=>'Dealer')); ?>
		<?php echo $form->error($model,'user_type'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'main_category_id'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'main_category_id',MainCategory::getMainCategory(),array('empty'=>'Select')); ?>
		<?php echo $form->error($model,'area_id'); ?>
		</div>
	</div>
	
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'contact_no'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'contact_no',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'contact_no'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'post_code'); ?>
		</label>
		<div class="controls">
		<?php echo $form->textField($model,'post_code'); ?>
		<?php echo $form->error($model,'post_code'); ?>
		</div>
	</div>

	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'area_id'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'area_id',Area::getArea(),array('empty'=>'Select')); ?>
		<?php echo $form->error($model,'area_id'); ?>
		</div>
	</div>
	
	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'country'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'country',States::getStates(),
                     array(
                    'class'=>'large-field',
                    'empty'=>'Select ',
                    'ajax' => array(
                        'type'=>'POST',
                        'url'=>CController::createUrl('site/cities'),
                        'data'=> array('state_id'=>'js:$(this).val()'),
                        'update'=>"#Users_city",
                        ) )); ?>
		<?php echo $form->error($model,'country'); ?>
		</div>
	</div>


	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'city'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'city',City::getCity(),array('empty'=>'Select','class'=>'large-field')); ?>
		<?php echo $form->error($model,'city'); ?>
		</div>
	</div>





	<div class="row">
		<label class="control-label">
		<?php echo $form->labelEx($model,'status'); ?>
		</label>
		<div class="controls">
		<?php echo $form->dropDownList($model,'status',Products::getStatus()); ?>
		<?php echo $form->error($model,'status'); ?>
		</div>
	</div>
	
	<div class="row">
		<label class="control-label">
		Message
		</label>
		<div class="controls">
        <?php echo CHtml::textArea('message','',array('class'=>'large-field','style'=>'width:41%')); ?>
		</div>
	</div>


	<div class="row buttons">
		<div class="controls">
		<?php //echo CHtml::submitButton('Check Count',array('class'=>'btn btn-primary','id'=>'btn_chk_cnt')); ?>
		<input type="button" value="Check Count Before Send" class="btn btn-primary" id="btn_chk_cnt">
		</div>
	</div>

	<div class="row buttons">
		<div class="controls">
		<?php 
		// if($clicked_on_send==0)
			
		?>
		<input type="hidden" id="clicked_on_send" name="clicked_on_send" value="<?php if(empty($clicked_on_send)) echo '0'; else echo $clicked_on_send; ?>">
		<?php echo CHtml::submitButton('Send',array('class'=>'btn btn-primary','id'=>'btn_send')); ?>
		</div>
	</div>


<?php $this->endWidget(); ?>
<script type="text/javascript">
 $('#btn_chk_cnt').click(function(){

      var data= $('#bulksms-form');

      $.ajax( {
      type: "POST",
      url: "<?php echo Yii::app()->createUrl('bulksms/bulksmscount');?>",
      data: data.serialize(),
      success: function( response ) {
		alert(response);
        }
      } );      
    });
	
	$('#clicked_on_send').val('0');
	
	$('#btn_send').click(function(){
		var message= $('#message').val();
		$('#clicked_on_send').val('1');
		if(message==''){
			$('#clicked_on_send').val('0');
	
			alert('Please enter message to send');
			$('#message').focus();
			return false; 			
		}			
	});
</script>
</div><!-- form -->
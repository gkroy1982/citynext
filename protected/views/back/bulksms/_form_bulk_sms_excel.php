<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bulksmsexcel-form',
	'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>
<p class="note" style="color:red;"><?php echo $error==''?'':$error; ?></p>
	
	<div class="row">
		<label class="control-label">
			<input type="radio" value="1" name="sms_id" class="sms_option" checked="checked">
				Simple SMS
		</label>
		<label class="control-label">
			<input type="radio"  value="2" name="sms_id" class="sms_option">
				Bulk SMS
		</label>
	</div>
	
	<div class="row hide_on_bulk">
		<label class="control-label">
			Enter comma separated Mobile number	
		</label>
		<div class="controls">
			<?php echo CHtml::textArea('mobiles',"$_POST[mobiles]",array('class'=>'large-field','style'=>'width:51%;height:150px;')); ?>
		</div>
	</div>
	
	<div class="row hide_on_simple">
		<label class="control-label">
			* Upload Excel Format Only
		</label>
		<div class="controls">
			<input type="file" value="" id="fileMobileNo" name="fileMobileNo">
		</div>
		<label class="controls">
		* For Sample Excel Format <a href="<?php echo Yii::app()->getBaseUrl(true);?>/upload/bulksms/default.xlsx"  style="font-size: 13px;">Click Here</a>
		</label>
	</div>
	
	<div class="row">
		<label class="control-label">
			Message
		</label>
		<div class="controls">
		
			<?php echo CHtml::textArea('message',"$_POST[message]",array('onkeyup'=>'check_length(this.form)','maxlength' => 1000,'class'=>'large-field','style'=>'width:51%')); ?>
		</div>
		<label class="controls">SMS Count : &nbsp;<span id="messages" style="color:red">1</span></label>
		<label class="controls">SMS Characters Count :  &nbsp;<span id="total" style="color:red">0</span></label>
		
	</div>
	
	<div class="row buttons">
		<div class="controls">
		<?php echo CHtml::submitButton('Send',array('class'=>'btn btn-primary','id'=>'bnt_bulksms_excel')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/jquery-1.9.1.min.js"></script>
<script>
 $(document).ready(function(){
	
	hide_show_on_sms_op();
	$('.sms_option').change(function(){
		hide_show_on_sms_op();
	});
	
	$('#bnt_bulksms_excel').click(function(){
		var sms_op = $( 'input[name=sms_id]:checked' ).val();
		var mobiles= $( '#mobiles' ).val();
		var message=$( '#message' ).val();
		var fileMobileNo=$( '#fileMobileNo' ).val();
		// alert(fileMobileNo);
		if(sms_op==1){
			if(mobiles==''){
				alert('Please enter mobile nos ');
				$( '#mobiles' ).focus();
				return false;
			}
			if(message==''){
				alert('Please enter message. ');
				$( '#message' ).focus();
				return false;
			}
		}else if(sms_op==2){
			
			if(fileMobileNo==''){
				alert('Please select a excel file. ');
				$( '#fileMobileNo' ).focus();
				return false;
			}
			if(message==''){
				alert('Please enter message. ');
				$( '#message' ).focus();
				return false;
			}
		}
	});
	
});



function hide_show_on_sms_op(){
	var sms_op = $( 'input[name=sms_id]:checked' ).val();
	if(sms_op==1){//1-simple
		$(".hide_on_simple").hide();
		$(".hide_on_bulk").show();		
	}else if(sms_op==2){//2-bulk
		$(".hide_on_simple").show();
		$(".hide_on_bulk").hide();		
	}else{
		$(".hide_on_simple").hide();
		$(".hide_on_bulk").show();		
	}
}

function check_length(evt)
{
	// alert('kk');
	var theEvent = evt || window.event;
	var key = theEvent.keyCode || theEvent.which;
	//  key = String.fromCharCode( key );
	value=$('#message').val();
	$('#total').text(value.length);
	// alert(value.length);
	$('#total_char').text(value.length);
	if(value.length>160)
	{
		sms=value.length;
		sms_value=1;
		if(sms > 160)
		sms_value=2;
		if(sms > 320)
		sms_value=3;
		if(sms > 480)
		sms_value=4;

		$('#messages').text(sms_value);
	}else{
		sms_value=1;    
		$('#messages').text(sms_value); 
	}
	//alert(value.length);
}
</script>
</div><!-- form -->
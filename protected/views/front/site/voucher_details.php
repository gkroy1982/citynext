
<?php $this->pageTitle='Jhansishopping.com | Vouches Details';?>
<?php 


$url = Yii::app()->theme->baseUrl; 

?>

  <div id="container">
   <?php $this->renderPartial('left');?>
    <!--Middle Part Start-->
    <div id="content">
    
    
      <!--Featured Product Part Start-->
      <div class="box">
        <div class="box-heading"><?php echo $nav;?></div>
        <div class="box-content">
          <div class="box-product">
			<table class='table table-bordered' width='100%'>
			<tr> <th>Sr.No</th><th>Voucher Code </th> <th> Description</th><th>Action </th> </tr>
         <?php 
         //$p_url=Yii::app()->baseUrl.'/upload/profile/';
          $cnt=1;
			$vouchers = Discountvouchers::model()->findAll( array( 'condition'=>' vender_id='.$vendor->uid.' and status="Active" and total > 0') );
			foreach( $vouchers as $voucher )
			{				
				?>
				<tr><td> <?php echo $cnt++;?></td> <td><?php echo $voucher->code;?></td> <td><?php echo $voucher->description;?></td><td> <button onclick="reserve_voucher('<?php echo $voucher->id;?>')">send Request</button></td></tr>
				<?php
			}				
		?>	</table>			
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

<script>
reserve_voucher = function( vid )
{	  
      var data='vid='+vid;
      $.ajax( {
      type: "POST",
      url: "<?php echo Yii::app()->createUrl('site/reservevoucher');?>",
      data: data,
      success: function( response ) {            
            alert('Request Send Successful.');
        }
      } );      
}
</script>

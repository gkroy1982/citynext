
<?php //$this->pageTitle='Jhansishopping.com | Vouches';?>
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

         <?php 
         $p_url=Yii::app()->baseUrl.'/upload/profile/';
          foreach($vendors as $user)
          {
			 $model = DiscountVouchers::model()->findAll( array( 'condition'=>' vender_id='.$user->uid.' and status="Active" and total > 0') );

				/*$voucher_code ='';
				foreach( $model as $u )
				{
					$voucher_code .=$u->code.',';
				}	*/
					 
				foreach( $model as $obj )
				{ 
					$rem_voucher= Reservevouchers::model()->findAll(array('condition'=>"user_id=$user->uid and voucher_id= $obj->id"));
				
					$rem_voucher = $obj->total - count( $rem_voucher );
					if( $rem_voucher>0)
					{
				?>
					
				<div class='voucher' style=' width:40%;height:100px;border: 1px solid #98978f' 
				<?php if(!Yii::app()->user->isGuest){ ?>
				
					onclick="reserve_voucher('<?php echo $obj->id;?>')"
				<?php } else { ?>						
					onclick='login()'
				<?php } ?>
				>  
                    <a href="#<?php //echo Yii::app()->createUrl('site/voucherdetails',array('id'=>$user->uid));?>">
                        <div class="image" style="float:left;">
							<img src="<?php echo $p_url.$user->photo;?>" style='width:100px;height:110px;'/>							
						</div> 
                        <div class="name" style="text-align:left;float:right;width:70%;height:100px;"> 
                            
							<h3><?php
							if($user->business_name!='')
								echo ucwords($user->business_name);
							else
								echo ucwords($user->first_name.' '.$user->last_name);
							
							?>	</h3>
							
							<p><?php echo substr( $obj->description ,0,20);?></p>
							
							<strong><?php echo " Remaining Vouchers : $rem_voucher of $obj->total ";?>	</strong>
                        </div>             
                        
                    </a></div>
				
				
				<?php
				}
			}
          }
          ?>

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
			location.reload();
        }
      } );      
}
</script>
<style>	
.voucher:hover 
{					
   content: url('<?php echo Yii::app()->theme->baseUrl.'/image/voucher.png';?>');
   height:100px;			  
}		
</style>

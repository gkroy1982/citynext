<?php //$this->pageTitle='Jhansishopping.com | Vouches';?>
  <?php 


$url = Yii::app()->theme->baseUrl; 

?>

    <div id="container" class="content">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <?php $this->renderPartial('left');?>
          <!--Middle Part Start-->
      </div>
      <!--Middle Part Start-->
      <section class="main-content col-lg-9 col-md-9 col-sm-9 col-xs-12">
      
			<div class="carousel-heading no-margin">
             <h4> <?php echo $nav;?> </h4>
             </div>
			 
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

                  <div class="vouchers col-lg-6 col-md-6 col-sm-6">
                    <article class="news">
                      <div class="news-background" <?php if(!Yii::app()->user->isGuest){ ?> onclick="reserve_voucher('
                        <?php echo $obj->id;?>')"
                          <?php } else { ?> onclick='login()'
                            <?php } ?>>
                              <a class="row" href="#<?php //echo Yii::app()->createUrl('site/voucherdetails',array('id'=>$user->uid));?>">
                                <div class="col-lg-3 col-md-4 col-sm-6 news-thumbnail">
                                  <a href="#"><img src="<?php echo $p_url.$user->photo;?>" alt=""></a>
                                </div>
                                <div class="col-lg-9 col-md-8 col-sm-6 news-content">
                                  <h5><a href="blog_post.html"><?php
									if($user->business_name!='')
										echo ucwords($user->business_name);
									else
										echo ucwords($user->first_name.' '.$user->last_name);
									
									?>	</a></h5>
                                  <span class="date"><i class="icons icon-location-7"></i><?php echo $user->address.', '.$user->area->area_name.', '.$user->cities->city_name.', '.$user->cities->state->state_name; ?></span>
                                  <p>
                                    <?php echo substr($obj->description,0,150); ?>
                                  </p>
                                  <p><b><?php echo " Valid Upto :". date('d-M-Y',strtotime($obj->to_date)).', '." Remaining Vouchers : $rem_voucher of $obj->total ";?></b></p>
                                </div>
                              </a>
                      </div>
                    </article>
                  </div>
                  <?php
				}
			}
          }
          ?>

              </div>
            </div>
          
          
      </section>
      <!--Middle Part End-->
      <div class="clear"></div>
      <div class="social-part"></div>
    </div>
    <script>
      reserve_voucher = function (vid) {
        var data = 'vid=' + vid;
        $.ajax({
          type: "POST",
          url: "<?php echo Yii::app()->createUrl('site/reservevoucher');?>",
          data: data,
          success: function (response) {
            alert('Request Send Successful.');
            location.reload();
          }
        });
      }
    </script>
    <style>
      .voucher:hover {
        background-image: url('<?php echo Yii::app()->theme->baseUrl.'/image/voucher.png';?>');
        height: 100px;
        width: 400px;
        opacity: 0.5;
        -webkit-opacity: 0.5;
        -moz-opacity: 0.5;
        transition: 0.5s ease;
        -webkit-transition: 0.5s ease;
        -moz-transition: 0.5s ease;
      }
      
      .voucher:hover:nth-child(1) {
        display: none;
      }
    </style>
 
   <?php $this->renderPartial('/site/left');?>

    <!--Middle Part Start-->
    <div id="content">
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="#">Home</a> » <a href="#">Shopping Cart</a></div>
      <!--Breadcrumb Part End-->
      <h1>Shopping Cart </h1>
      <form enctype="multipart/form-data" method="post" action="#">

   
        <div class="cart-info">
          <table>
            <thead>
              <tr>
                <td class="image">Image</td>
                <td class="name">Product Name</td>
                
                <td class="quantity">Quantity</td>
                <td class="price">Unit Price</td>
                <td class="total">Total</td>
              </tr>
            </thead>
            <tbody>

            <?php 
            $total=0;
            $url=Yii::app()->baseUrl.'/upload/products/';
            $turl= Yii::app()->theme->baseUrl;

            foreach ($products as $product ) 
            {                          
                ?>
                  <tr>
                    <td class="image"><a href="#"><img style='width:50px;' src="<?php echo $url.$product->product->image; ?>" ></a></td>
                    <td class="name"><a href="#">
                    <?php echo ucwords( $product->product->product ); ?>
                    
                    </a></td>
                    <td class="quantity"><input type="text" id="qnt_<?php echo $product->cid; ?>" size="2" value="<?php echo $product->quantity; ?>" name="" class="w30">
                      &nbsp;
                      <a href="#" onclick="fun_update( <?php echo $product->cid ?>)"><img title="Update" alt="Update" src="<?php echo $turl?>/image/update.png"></a>
                      &nbsp;<a href="<?php echo Yii::app()->createUrl('card/delete',array('id'=>$product->product_id));?>"><img title="Remove" alt="Remove" src="<?php echo $turl?>/image/remove.png"></a></td>
                    <td class="price"><?php echo $product->unit_price; ?></td>


                    <td class="total"><?php echo ( number_format($product->unit_price*$product->quantity,2) );$total+=( $product->unit_price*$product->quantity ) ?></td>
                  </tr>
                <?php 
            }
            ?>

           
            </tbody>
          </table>
        </div>
      </form>

 <script type="text/javascript">
function fun_update( pid )
{
    var kk='#qnt_'+pid;

    var qnt = $(kk).val();

    var string='pid='+pid+'?qnt='+qnt;
    alert();
     $.ajax(
        {
            url:"<?php Yii::app()->createUrl('site/cardupdate')?>",
            method:'post',
            data:string,
            success:function(result)
            {
                alert(hi);
                $("#div1").html(result);
            }
        });

}


 </script>  


   
      <div class="cart-total">
        <table id="total">
          <tbody>
            <tr>
              <td class="right"><b>Sub-Total:</b></td>
              <td class="right"><?php echo number_format($total,2); ?></td>
            </tr>
            <tr>
              <td class="right"><b>Total:</b></td>
              <td class="right"><?php echo number_format($total,2); ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="buttons">
        <div class="right"><a class="button" href="#">Checkout</a></div>
        
      </div>
    </div>
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>
  </div>

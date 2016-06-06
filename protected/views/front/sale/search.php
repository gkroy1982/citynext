<?php $this->pageTitle='Jhansishopping.com | Search';?>
<?php 

$url = Yii::app()->theme->baseUrl; 

?>

  <div id="container">
   <?php $this->renderPartial('left');?>
    <!--Middle Part Start-->
    <div id="content">   
     
    <script type="text/javascript">
    $(document).ready(function() {
        $("#yw0" ).removeClass( "list-view").addClass('box-content');
        $( '.items').removeClass( "items").addClass('box-product');

        });
    </script>

      <!--Featured Product Part Start-->
      <div class="box">
        <div class="box-heading"><?php echo $nav;?></div>
        
        <?php $this->widget('zii.widgets.CListView', array(
          'dataProvider'=>$dataProvider,
          'itemView'=>'search_product',
        )); ?>

          
      </div>
      <!--Featured Product Part End-->
    </div>
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>
  </div>



<?php $this->pageTitle='Jhansishopping.com | Search'; ?>
<?php 
	$url = Yii::app()->theme->baseUrl;
?>
<div id="container" class="content">
   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<?php $this->renderPartial('left');?>
          <!--Middle Part Start-->
	</div>
	<section class="main-content col-lg-9 col-md-9 col-sm-9">
    <!--div id="content"-->   
     
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
	</section>
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
     
    </div>
  </div>



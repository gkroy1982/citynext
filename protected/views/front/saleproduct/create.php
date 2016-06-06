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
       <?php //$this->renderPartial('/products/menu');?>
	   <div class="box-heading"><?php echo $nav;?></div>

        <div class="box-content">
          <div class="box-product"> 
		

			<?php $this->renderPartial('_form', array('model'=>$model)); ?>


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
<script src="<?php echo Yii::app()->baseUrl;?>/themes/back/vendors/jquery-1.9.1.min.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/themes/back/vendors/tinymce/js/tinymce/tinymce.min.js">
</script>
<script>
  tinymce.init({
    selector: ".tinymce_full",
     plugins: [
      "advlist autolink lists link image charmap preview hr anchor pagebreak",
      "searchreplace visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "template paste textcolor"
    ],
  
    toolbar1: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image preview media | forecolor backcolor ",
  });
</script>
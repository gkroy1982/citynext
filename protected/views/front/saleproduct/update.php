<?php 

$url = Yii::app()->theme->baseUrl; 
?>
 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 <?php $this->renderPartial('/products/left');?>
  </div>
<section class="main-content col-lg-9 col-md-9 col-sm-9 content">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="carousel-heading no-margin">
				<h4><?php echo $nav;?></h4>
			</div>
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
      <!--Featured Product Part End-->
    </div>
    <!--Middle Part End-->
</section>

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
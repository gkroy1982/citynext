<?php 
	$controller	= Yii::app()->controller->id;
	$action		= Yii::app()->controller->action->id;
	$url = Yii::app()->theme->baseUrl; 
	$Title='citynext | '.strtolower($action);
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode( $Title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">      
	<meta name="author" content="Html5TemplatesDreamweaver.com">
	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"> <!-- Remove this Robots Meta Tag, to allow indexing of site -->
    
  
   <!-- CSS Part Start-->
		<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/stylesheet.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/slideshow.css" media="screen" />
   
		<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/carousel.css" media="screen" />
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo $url ?>/popup/css/style.css" />
   	   <link rel="stylesheet" href="<?php echo $url; ?>/css/bootstrap-datetimepicker.min.css" />
	   <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!-- CSS Part End-->

  <style type="text/css">

  .alert-success {
    background-color: #dff0d8;
    border-color: #d6e9c6;
    color: #468847;
}

.alert {

    border-radius: 4px;
    margin-bottom: 20px;
    padding: 8px 35px 8px 14px;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
}
  </style>
  
 





 
   <!--  JS Part End-->
    
</head>
<body>    	
<div class="main-wrapper">
<div>
    <?php	

    $this->renderPartial("//site/header");

 		echo $content; 
echo '</div>';
	$this->renderPartial("//site/footer");	

	?>
	
	
	    <!-- 
-->

    <script type="text/javascript" src="<?php echo $url; ?>/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>/js/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>/js/jquery.jcarousel.min.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>/js/colorbox/jquery.colorbox-min.js"></script>
   <script type="text/javascript" src="<?php echo $url; ?>/js/tabs.js"></script>
     <script type="text/javascript" src="<?php echo $url; ?>/js/jquery.easing-1.3.min.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>/js/cloud_zoom.js"></script>
    
   
    <script type="text/javascript" src="<?php echo $url; ?>/js/custom.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>/js/jquery.dcjqaccordion.js"></script>

   

  <!--  <script type="text/javascript" src="<?php echo $url ?>/popup/js/jquery-1.11.0.min.js"></script>
 -->
<script type="text/javascript" src="<?php echo $url ?>/popup/js/jquery.leanModal.min.js"></script>
	
	
  <!--	<script src="1http://code.jquery.com/jquery-1.10.2.js"></script> -->
	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	

  
  
 <script type="text/javascript">
  $("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
  $(".popup").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
   $('#slideshow').nivoSlider();
   // $('#slideshow2').nivoSlider();
 
   
	$(".datepicker").datepicker({dateFormat: 'dd-mm-yy',changeMonth: true, changeYear: true,yearRange: "-100:+0"});
	


    $('#login').click(function(){

      var data= $('#login-form');

      $.ajax( {
      type: "POST",
      url: "<?php echo Yii::app()->createUrl('site/login');?>",
      data: data.serialize(),
      success: function( response ) {
      
	   var response = response.split(",");
			var  res = response[1];
			var res1 = response[0];
          if(res.trim()==1 || res1.trim()==1){
			  window.location.reload();
			//window.location="<?php echo Yii::app()->createUrl('/users/view');?>";
			
          } else{
			alert('Invalid Username and Password !');
          }


        }
      } );      
    });


  

      $('#forgot').click(function(){
      	
      var email = $('#LoginForm2_username').val();

      var data='email='+email;
      $.ajax( {
      type: "POST",
      url: "<?php echo Yii::app()->createUrl('site/forgotvalidate');?>",
      data: data,
      success: function( response ) {
      
          if(response==1)
          {          	
            window.location=("<?php echo Yii::app()->createUrl('site/forgotpassword')?>?e="+email);
          } else
          {
            alert('Invalid Email id !');
          }


        }
      } );      
    });
  
	    $('.send').click(function(){
  //alert('hi');
      var data= $('#request-form');

      $.ajax( {
      type: "POST",
      url: "<?php echo Yii::app()->createUrl('site/requestproduct');?>",
      data: data.serialize(),
      success: function( response ) {
      
          if(response==1)
          {
            $('#message').val('');
            window.location.reload();
          }


        }
      } );     
    });


  function login(){
   document.getElementById('modal_trigger').click();
  };
    
</script>
</body>
</html>
  
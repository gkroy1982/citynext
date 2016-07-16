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
	<meta name="author" content="">
	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"> <!-- Remove this Robots Meta Tag, to allow indexing of site -->
    
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,900,700italic,500italic' rel='stylesheet' type='text/css'>
   <!-- CSS Part Start-->
		 <link rel="stylesheet" href="<?php echo $url; ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>/css/perfect-scrollbar.css">
  <link rel="stylesheet" href="<?php echo $url; ?>/css/style.css">
  <link rel="stylesheet" href="<?php echo $url; ?>/css/flexslider.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo $url; ?>/css/fontello.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/settings.css" media="screen" />
  <link rel="stylesheet" href="<?php echo $url; ?>/css/animation.css">
  <link rel="stylesheet" href="<?php echo $url; ?>/css/owl.carousel.css">
  <link rel="stylesheet" href="<?php echo $url; ?>/css/owl.theme.css">
  <link rel="stylesheet" href="<?php echo $url; ?>/css/chosen.css">
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<link rel="stylesheet" href="<?php echo $url; ?>/css/ie.css">
        <![endif]-->
  <!--[if IE 7]>
			<link rel="stylesheet" href="<?php echo $url; ?>/css/fontello-ie7.css">
		<![endif]-->
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
<div class="container">

    <?php
		$this->renderPartial("//site/header");
			echo $content;
		$this->renderPartial("//site/footer");
	?>
	<div id="back-to-top">
		<i class="icon-up-dir"></i>
    </div>	
</div>
	
  <!-- JavaScript -->
  <script src="<?php echo $url; ?>/js/modernizr.min.js"></script>
  <script src="<?php echo $url; ?>/js/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="<?php echo $url; ?>/js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="<?php echo $url; ?>/js/jquery.raty.min.js"></script>

  <!-- Scroll Bar -->
  <script src="<?php echo $url; ?>/js/perfect-scrollbar.min.js"></script>

  <!-- Cloud Zoom -->
  <script src="<?php echo $url; ?>/js/zoomsl-3.0.min.js"></script>

  <!-- FancyBox -->
  <script src="<?php echo $url; ?>/js/jquery.fancybox.pack.js"></script>

  <!-- jQuery REVOLUTION Slider  -->
  <script type="text/javascript" src="<?php echo $url; ?>/js/jquery.themepunch.plugins.min.js"></script>
  <script type="text/javascript" src="<?php echo $url; ?>/js/jquery.themepunch.revolution.min.js"></script>

  <!-- FlexSlider -->
  <script defer src="<?php echo $url; ?>/js/flexslider.min.js"></script>

  <!-- IOS Slider -->
  <script src="<?php echo $url; ?>/js/jquery.iosslider.min.js"></script>

  <!-- noUi Slider -->
  <script src="<?php echo $url; ?>/js/jquery.nouislider.min.js"></script>

  <!-- Owl Carousel -->
  <script src="<?php echo $url; ?>/js/owl.carousel.min.js"></script>

  <!-- Cloud Zoom -->
  <script src="<?php echo $url; ?>/js/zoomsl-3.0.min.js"></script>

  <!-- SelectJS -->
  <script src="<?php echo $url; ?>/js/chosen.jquery.min.js" type="text/javascript"></script>

  <!-- Main JS -->
  <script defer src="<?php echo $url; ?>/js/bootstrap.min.js"></script>
  <script src="<?php echo $url; ?>/js/main-script.js"></script>
  <script>
    
    $("#sideMenuHeading").on('click', function () {
      $("#sideMenuContent").toggle();
    })
  </script>
	 
  
 <script type="text/javascript">
 
 
  // $("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
  // $(".popup").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
   // $('#slideshow').nivoSlider();
   // $('#slideshow2').nivoSlider();
 
	
   
	$('.button-search').click(function(){
		document.frm_search.submit();
	});
	// $(".datepicker").datepicker({dateFormat: 'dd-mm-yy',changeMonth: true, changeYear: true,yearRange: "-100:+0"});
	

$( document ).ready(function() {
   
	function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    };

    $('#login').click(function(evt){
		evt.preventDefault();
		var data= $('#login-form');

   
		if ($("#LoginForm2_username").val()=='') {
			alert("Enter email address.");
			$("#LoginForm2_username").focus;
			return false;			
		}
		if (!ValidateEmail($("#LoginForm2_username").val())) {
			alert("Invalid email address.");
			$("#LoginForm2_username").focus;
			return false;			
		}
		if ($("#LoginForm2_password").val()) {
			alert("Enter password.");
			$("#LoginForm2_password").focus;
			return false;			
		}
   
	  
      $.ajax( {
		  type: "POST",
		  url: "<?php echo Yii::app()->createUrl('site/login');?>",
		  data: data.serialize(),
		  async:false,
		  success: function( response ) {
		   var response = response.split(",");
				var  res = response[1];
				var res1 = response[0];
		  // alert(res.trim());//exit;
		  // alert(res1.trim());exit;
			  if(res.trim()==1 || res1.trim()==1) {
				  window.location.reload();
				//window.location="<?php echo Yii::app()->createUrl('/users/view');?>";
				
			  } else {				  
				alert('Invalid Username and Password !');
				return false;				
			  }
			}
      });
    });
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
		if(response==1) {
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
  
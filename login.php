<?php 
	require_once 'inc-files.php';

	Functions::sessionInIt();
	// check if the user is already logged In
	if(Functions::loggedIn()){
		// redirect the user to index page
		Functions::redirect("index.php");
	}
	$token=Functions::csrf_token();
	Session::setSession('token',$token);

?>	

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" id="login">
		        <h2 class="form-login-heading">Login</h2>
		        <div class="login-wrap">
		            <input type="text" name="email" class="form-control" placeholder="Email" autofocus>
		            <br>
		            <input type="password" name="password" class="form-control mb" placeholder="Password">
                  <input type="hidden" name="token" value="<?php echo $token;?>">
		            
		            <button class="btn btn-theme btn-block"  type="submit">
                  <i class="fa fa-lock"></i>  
                    Submit
                </button>
		        </div>
                <div id="sign"></div> 
		      </form>	
		       	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
	
	
	
  

	  <script type="text/javascript">
	   $(document).on('submit', '#login', function()
        {       
           $(document).ajaxStart(function () {
               $(".loading").css("display","block");
                }).ajaxStop(function () {

                   $(".loading").css("display","none");
				})

                var data = $(this).serialize();
                $.ajax({

                type : 'POST',
                url  : 'ajax/ajax-login.php',
                data : data,

                success :  function(data)
                           {						
                                $("#sign").html(data).fadeIn('slow');
                                

                           },

                error:function(){
                    // failed request; give feedback to user
                    alert("Something Went Wrong");
                  }    
                });
            return false;
        });
     </script>



    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>

<?php 
	require_once '../inc-files.php';
	if($_SERVER['REQUEST_METHOD']=='POST' && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
		
		$token= $_POST['token'];
		$validRequest=Functions::csrf_match($token);
		if($validRequest){
			
		       $captcha=$_POST['g-recaptcha-response'];
		       $validRe=Functions::reCaptcha($captcha);
		      if ($validRe) {
		      	if(strlen($_POST['password'])>=6){
		      		if($_POST['password']===$_POST['passwordAgain']){
		      			// Everything is simply ok you can procced now... 
		      			
		      			$firstName=Functions::cleanInput($_POST['firstName']);
		      			$lastName=Functions::cleanInput($_POST['lastName']);
		      			$email=Functions::cleanInput($_POST['email']);
		      			$number=Functions::cleanInput($_POST['number']);
		      			$password=Functions::cleanInput($_POST['password']);
		      			$acc_type=Functions::cleanInput($_POST['acc_type']);

		      			$user= new Users();
		      			 $regUser=$user->regUser($firstName,$lastName,$email,$number,$password,$acc_type);
		      			echo $regUser;

		      			if($regUser>0){
		      				// start the session and assign the user id in the session
		      				Functions::sessionInIt();
							Session::setSession('pet_user_id',$regUser);
							Functions::jsRedirect("index.php");
							
							
		      			}



		      		}else{
		      			echo '<div class="alert alert-danger">
			                    <strong>Oops!</strong> Password repeat doesn\'t match with password.
			                </div>';
		      			
		      		}


		      	}else{
		      		echo '<div class="alert alert-danger">
                    <strong>Oops!</strong> Password must be six charecthers long.
                </div>';
		      		
		      	}





		      }else{
		      	 echo '<div class="alert alert-danger">
                    <strong>Oops!</strong> reCAPTCHA test failed. Please correct the reCAPTCHA and try again.
                </div>';
		      }





		}

	


	}

?>
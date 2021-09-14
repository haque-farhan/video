<?php 
	require_once '../inc-files.php';
	if($_SERVER['REQUEST_METHOD']=='POST' && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){

		
		
		$token= $_POST['token'];
		$validRequest=Functions::csrf_match($token);

		
		if($validRequest){			
					$password=Functions::cleanInput($_POST['password']);
		      		$email=Functions::cleanInput($_POST['email']);

		      		$user= new main();
		      	    $login=$user->login($email,$password);
		      	   	
		      	}else{
		      		echo '<div class="alert alert-danger">
                    <strong>Oops!</strong> Incorrect Details Please Check!
                </div>';
		      		
		      	}

		}

?>
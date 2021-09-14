<?php 
	require_once '../inc-files.php';
	
 
 	if ($_SERVER['REQUEST_METHOD']==='POST') {
 		
 		
 		$token= $_POST['token'];
		$validRequest=Functions::csrf_match($token);
		if ($validRequest) {
 			
 			// process the request///
			$username=Functions::cleanInput($_POST['email']);
		    $password=Functions::cleanInput($_POST['password']);

		    $main=new main();
		    $login=$main->login($username,$password);
		  	echo $login;



		    


 		}

 		
 	



 	}


?>

<style type="text/css">
		
		.error{
			color: red;
			font-weight: 900;
		}
		.succ{
			background: green;
		}


</style>
<?php 
	require_once '../inc-files.php';
	
 
 	if ($_SERVER['REQUEST_METHOD']==='POST') {
 		
 		$main=new main();
 		// clean the user inputs using cleanInput method

 		$insert=$main->enterMedicne($_POST);
 		
		
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
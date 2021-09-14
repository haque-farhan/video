<?php 
	
	require_once '../inc-files.php';
	$main=new main();
	
        if($_SERVER['REQUEST_METHOD']=='POST' && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
	        $uid=$_POST['uid'];

			
			$firstName=Functions::cleanInput($_POST['firstName']);
		    $lastName=Functions::cleanInput($_POST['lastName']);
		    $email=Functions::cleanInput($_POST['email']);
		    $jointdate=Functions::cleanInput($_POST['jointdate']);
		    $update=$main->updateuserInfo($firstName,$lastName,$email,$jointdate,$uid);  			
		}


?>
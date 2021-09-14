<?php 
	
	require_once 'inc-files.php';
	Functions::sessionInIt();
	Session::unsetSession();
	
	Functions::redirect("login.php");


?>
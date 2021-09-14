<?php 
	
	require_once '../inc-files.php';
	$main=new main();
	
        if($_SERVER['REQUEST_METHOD']=='POST' && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
	        $category_id=$_POST['category_id'];

			
			$category_name=Functions::cleanInput($_POST['category_name']);
		    $update=$main->updatecat($category_name,$category_id);  			
		}


?>
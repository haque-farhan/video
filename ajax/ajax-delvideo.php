<?php 
	
	require_once '../inc-files.php';
	
if($_SERVER['REQUEST_METHOD']=='POST' && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
	 $id=(int)$_POST['ids'];

		$main=new main();
		$delAds=$main->delvideo($id);		
}	



?>
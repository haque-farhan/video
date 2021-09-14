<?php 
	require_once '../inc-files.php';
	if($_SERVER['REQUEST_METHOD']=='POST' && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
		
		$cat_name=Functions::cleanInput($_POST['option_name']);
		$cat=Functions::cleanInput($_POST['cat-name']);
		
		if (!empty($cat_name)) {
			$main = new main();
			

			$cat_insert = $main->cat_opt_insert($cat_name,$cat);

			echo $cat_insert;
		}else{
			echo '<div class="alert alert-danger">
                    <strong>Oops!</strong> Field must not be empty!
                </div>';
		}


	}

?>
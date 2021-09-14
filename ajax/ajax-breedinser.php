<?php 
	require_once '../inc-files.php';
	if($_SERVER['REQUEST_METHOD']=='POST' && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
		
		$cat_name=Functions::cleanInput($_POST['cat-name']);
		$breed_name=Functions::cleanInput($_POST['breed_name']);
		
		if (!empty($cat_name)) {
			$main = new main();
			

			$cat_insert = $main->breedinsert($cat_name,$breed_name);

			echo $cat_insert;
		}else{
			echo '<div class="alert alert-danger">
                    <strong>Oops!</strong> Field must not be empty!
                </div>';
		}


	}

?>
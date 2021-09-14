<?php 
	require_once '../inc-files.php';
	if($_SERVER['REQUEST_METHOD']=='POST' && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
		
		$pet_name=Functions::cleanInput($_POST['pet_name']);
		
		if (!empty($pet_name)) {
			$main = new main();
			$pet_insert = $main->pet_insert($pet_name);

			echo $pet_insert;
		}else{
			echo '<div class="alert alert-danger">
                    <strong>Oops!</strong> Field must not be empty!
                </div>';
		}


	}

?>
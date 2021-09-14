<?php 
	require_once '../inc-files.php';
	if($_SERVER['REQUEST_METHOD']=='POST' && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
		
		$category_name=Functions::cleanInput($_POST['category_name']);
		
		if (!empty($category_name)) {
			$main = new main();
			$cat_insert = $main->addcategory($category_name);

			echo $cat_insert;
		}else{
			echo '<div class="alert alert-danger">
                    <strong>Oops!</strong> Field must not be empty!
                </div>';
		}


	}

?>
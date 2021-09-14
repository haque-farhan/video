<?php 
	require_once '../inc-files.php';
	$insert="";
	if($_SERVER['REQUEST_METHOD']=='POST' && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
		
		// pic array
		$pics=$_FILES['pic']['name'];
		if($pics[0]!="" || $pics[1]!="" || $pics[2]!=""){
			

		
		
		$i=0;
		$main=new main();
		$array=array();
		foreach ($pics as $pic) {
			if(!empty($pic)){
				$vImg=Functions::validImage($pic);
			}else{
				$vImg=false;
			}
			
			
			if($vImg){
				move_uploaded_file($_FILES['pic']['tmp_name'][$i], "../uploads/{$vImg}");
				
				// assigning the vlaues into the array
				$array[] = $vImg;
										
		
			 }
			 if($vImg==2){
			 	echo "not ok";
				foreach ($array as $img) {
					// unlink the uploaded files...
					$file="../".UP_DIR.$img;
					unlink($file);
				}
				
				echo Functions::displayMsg("Please Upload the right image formate, jpg,png");
				exit();
			}

			$i++;
		}

		
		// insert the files and listing...
		Functions::sessionInIt();

		// remove the first element of the array
	    $cat=$_POST['cat'];
	    $description=$_POST['Description'];
	    $name=$_POST['Name'];
	    $price=$_POST['Price'];
	    $breed=$_POST['Breed'];
		$location=$_POST['Location'];		
		unset($_POST['cat']);
		unset($_POST['Description']);
		unset($_POST['Name']);
		unset($_POST['Price']);
		unset($_POST['Breed']);
		unset($_POST['Location']);
		
		$uid=$_SESSION['pet_user_id'];
		$insert=$main->upListing($_POST,$array,$uid,$cat,$description,$name,$price,$breed,$location);
		if($insert){
			echo Functions::displayMsg("Your ad has been uploaded successfully!","suc");
		}
		
		
	}else{
		echo Functions::displayMsg("Please Upload An Image");
		 exit();
	}

}




?>
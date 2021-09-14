<?php 
	
	require_once '../inc-files.php';
	$main= new main();
if($_SERVER['REQUEST_METHOD']=='POST' && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
	$cat=Functions::cleanInput($_POST['cat']);
	$price=Functions::cleanInput($_POST['price']);
	$sort=Functions::cleanInput($_POST['sort']);
	$location=Functions::cleanInput($_POST['location']);
	$perPage=Functions::cleanInput($_POST['perPage']);
	$breed=Functions::cleanInput($_POST['breed']);


	$ads=$main->sf($cat,$price,$sort,$location,$perPage,$breed);
	$num=count($ads);
		echo '<div class="col-xs-12 col-sm-9">
					<div class="row m-b-15 m-t-15">
						<div class="col-xs-12 col-sm-9">
							<p class="bold black _24px">'.$num.' Animals Found</p>
							
						</div>
						
					</div>';
		foreach ($ads as $ad ) {
			$time=Functions::get_time($ad->time);
			$pic=$main->adPic($ad->ad_id);
			echo '<!--row 5 of listing-->
					<div class="row whole-wrapper m-b-15">
						<div class="col-xs-10 col-xs-offset-1 col-sm-3 col-sm-offset-0">
							<a href="ad.php?id='.$ad->ad_id.'">
								<div class="pet-image-wrapper">
									<img src="'.UP_DIR.''.$pic->pic.'" alt="" class="img-responsive">
								</div>
							</a>
						</div>
						<div class="col-xs-12 col-sm-7">
							<div class="blog-wrapper">
								<p class="_30px bold black f-r">$'.$ad->price.'</p>
								<a href="ad.php?id='.$ad->ad_id.'">
									<p class="bold _24px basic-color">'.$ad->name.'</p>
								</a>
								

								<p class="black regular"><i class="fa fa-map-marker m-r-10"></i><span>'.$ad->location.'</span></p>
								
								<p>'.$ad->description.'</p>

								<p class="m-t-30"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i><span>'.$time.'</span></p>
							</div>
						</div>
						
					</div>';

					
				

		}
		echo '</div>';

}

?>
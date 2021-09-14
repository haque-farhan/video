<?php 
	require_once '../inc-files.php';
	$insert="";
	if($_SERVER['REQUEST_METHOD']=='GET' && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
		$main=new main();
		$ads=$main->ads();
		$num=count($ads);
		echo '<div class="col-xs-12 col-sm-9" style="bottom: 24px;">
					<div class="row m-b-15 m-t-15">
						<div class="col-xs-12 col-sm-9">
							<p class="bold black _24px">'.$num.' Animals Found</p>
							
						</div>
						
					</div>';
		foreach ($ads as $ad ) {
			$time=Functions::get_time($ad->time);
			$pic=$main->adPic($ad->ad_id);
			$ad->description=substr($ad->description, 0,122);
			echo '<!--row 5 of listing-->
					<div class="row whole-wrapper m-b-15" style="background:#fff; overflow: hidden;padding: 20px 0px;  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);margin-bottom: 6px;left: 5px; bottom: 20px;">
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
								
								<p>'.$ad->description.'<a style="color: #0366d6;font-weight: bold;" href="ad.php?id='.$ad->ad_id.'">
									Read More...
								</a> </p>

								<p class="m-t-30"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i><span>'.$time.'</span></p>
							</div>
						</div>
						
					</div>';

					
				

		}
		echo '</div>';
	
	}	



?>
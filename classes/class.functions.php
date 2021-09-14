<?php 
	/**
	*  Ganeral Funcitons that are required to use 
	*/
	class Functions
	{
		
	    // Cleaning user input
	    public static function cleanInput($data) {
	      $data = trim($data);
	      $data = stripslashes($data);
	      $data = htmlspecialchars($data);
	        
	      return $data;
	    }

	    

		public static function sessionInIt(){

			Session::sessionStart(0,DOMAIN,'/',SSL);
		}

		
	    public static function csrf_token(){
	    	if (function_exists('mcrypt_create_iv')) {
			    return     $_SESSION['token'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
			    } else {
			      return  $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
			        
			    }
		}
		
		public static function csrf_match($token){

			self::sessionInIt();
			if (!empty($token)) {
		    	if (hash_equals($_SESSION['token'], $token)) {
		        	return true;
		    	} else {
		          return false;
		    	}
			}
		}

		
		
		public static function redirect($page){

		    $page=SITE_URI.$page;
			return header('location:'.$page.'');
		}
		public static function jsRedirect($page){
			$page=SITE_URI.$page;
			echo $ok='<script>window.location.replace("'.$page.'");</script>';
			
		}
		public static function loggedIn(){
			if(isset($_SESSION['id']) && $_SESSION['id']===true){
				return true;
			}else{
				return false;
			}
			
		}

	

	public static  function displayMsg($msg,$type=null){
			if($type=="suc"){
				return $msg='<div class="alert alert-success">
			            <strong>Great!</strong> '.$msg.'
			      </div>';
			}else{
				return $msg='<div class="alert alert-danger">
			            <strong>Oops!</strong> '.$msg.'
			      </div>';
			}

			
		}
			public static function get_time($session_time) 
			{ 
			$time_difference = time() - $session_time ; 

			$seconds = $time_difference ; 
			$minutes = round($time_difference / 60 );
			$hours = round($time_difference / 3600 ); 
			$days = round($time_difference / 86400 ); 
			$weeks = round($time_difference / 604800 ); 
			$months = round($time_difference / 2419200 ); 
			$years = round($time_difference / 29030400 ); 
			// Seconds
			if($seconds <= 60)
			{
			return "$seconds seconds ago"; 
			}
			//Minutes
			else if($minutes <=60)
			{

			   if($minutes==1)
			  {
			   return "one minute ago"; 
			   }
			   else
			   {
			    return "$minutes minutes ago"; 
			   }

			}
			//Hours
			else if($hours <=24)
			{

			   if($hours==1)
			  {
			   return "one hour ago";
			  }
			  else
			  {
			   return "$hours hours ago";
			  }

			}
			//Days
			else if($days <= 7)
			{

			  if($days==1)
			  {
			   return "one day ago";
			  }
			  else
			  {
			   return "$days days ago";
			   }

			}
			//Weeks
			else if($weeks <= 4)
			{

			   if($weeks==1)
			  {
			   return "one week ago";
			   }
			  else
			  {
			   return "$weeks weeks ago";
			  }

			}
			//Months
			else if($months <=12)
			{

			   if($months==1)
			  {
			   return "one month ago";
			   }
			  else
			  {
			   return "$months months ago";
			   }

			}
			//Years
			else
			{

			   if($years==1)
			   {
			    return "one year ago";
			   }
			   else
			  {
			    return "$years years ago";
			   }

			}

			} 


	

















	}
?>
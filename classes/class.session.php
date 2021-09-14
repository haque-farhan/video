<?php 
	/**
	* 
	*/
	class Session
	{
	    public static function sessionStart($lifetime=0, $domain=null, $path='/', $secure){
			if(session_status()==PHP_SESSION_NONE){	
				// start the session 
				if(!isset($domain)){
					$domain=$_SERVER['SERVER_NAME'];
				}	

				session_set_cookie_params($lifetime, $path, $domain, $secure, true);
				session_start();
			}
		}
		
		public static function setSession($key, $value){

			$_SESSION[$key]=$value;
		}

		public static function getSession($key){
			return $_SESSION[$key];
		}


		public static function unsetSession(){
			$params=session_get_cookie_params();
			setcookie(
				session_name(), 
				'', 
				time()-4200, 
				$params['path'], 
				$params['domain'], 
				$params['secure'], 
				$params['httponly']
			);
			session_destroy();	
		}
	}


?>
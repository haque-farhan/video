<?php 
	/**
	* config class for all the settings
	*/
	class Config extends DB
	{
		
		// get options

		public function getOption($optionId){

			// preapring the stetaments
			$this->query( "SELECT * from `cat_option` WHERE `option_id` = :option_id" );
			// binding the values 
			 $this->bind(':option_id', $optionId);
			// select the single row password 
			 return $res=$this->resultset();
		}
		public function Breed(){

			// preapring the stetaments
			$this->query( "SELECT * from `pet_breed` " );
			
			 return $res=$this->resultset();
		}






	}



?>
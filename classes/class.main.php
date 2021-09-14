<?php 
	/**
	* main class 
	*/
	class main extends DB
	{
		public function login($email,$password){
		 	// preapring the stetaments
			$this->query( "SELECT * FROM `admin` WHERE `email` = :email");
			// binding the values 
			 $this->bind(':email', $email);
			// select the single row password 
			 $res=$this->single();
			 if(!empty($res)){
				$hash=$res->password;
				$v=password_verify($password, $hash);
			 		if($v){
				 	// Login is successfull rediected user to a home page;
				 	Functions::sessionInIt();
				 	Session::setSession('id',$res->id);

				 	Session::setSession('name',$res->name);
				 	
				 	Functions::jsRedirect("index.php");
				 }
			 }
			 else{
			 	 echo '<div class="alert alert-danger">
                    <strong>OOPS!</strong>please try again!
                </div>';
			 }
		}
		public function totaluser(){
			$sql = "SELECT COUNT(uid) as totaluser FROM user";
			$this->query($sql);
			 $res=$this->single();
			 if(!empty($res)){
			 	return $res;
			 }else{
			 	return false;
			 }
		}
		public function totalpendingusers(){
			$sql = "SELECT COUNT(uid) as totalpendingusers FROM user WHERE `status` = '0'";
			$this->query($sql);
			 $res=$this->single();
			 if(!empty($res)){
			 	return $res;
			 }else{
			 	return false;
			 }
		}
		public function catNum(){
			$sql = "SELECT COUNT(category_id) as totalcat FROM category";
			$this->query($sql);
			 $res=$this->single();
			 if(!empty($res)){
			 	return $res;
			 }else{
			 	return false;
			 }
		}
		public function videototal(){
			$sql = "SELECT COUNT(vid) as videototal FROM video";
			$this->query($sql);
			 $res=$this->single();
			 if(!empty($res)){
			 	return $res;
			 }else{
			 	return false;
			 }
		}
		public function totalpendingvideo(){
			$sql = "SELECT COUNT(vid) as pendingvideo FROM video where `status` = '0' ";
			$this->query($sql);
			 $res=$this->single();
			 if(!empty($res)){
			 	return $res;
			 }else{
			 	return false;
			 }
		}
	    public function updateuserInfo($firstName,$lastName,$email,$jointdate,$uid){

			$this->query("

				UPDATE `user` SET `fname`=:fname,`lname`=:lname,`email`=:email,
				`joint_date`=:joint_date WHERE `uid`=:uid

				");
			
			$this->bind(':fname', $firstName);
			$this->bind(':lname', $lastName);
			$this->bind(':email', $email);
			$this->bind(':joint_date', $jointdate);
			$this->bind(':uid', $uid);
			$res=$this->execute();
			if($res){
				 echo '<div class="alert alert-success">
                    <strong>Success!</strong> Successfully Updated Data!
                </div>';
			}else{
				 echo '<div class="alert alert-danger">
                    <strong>OOPs!</strong> Try Again!
                </div>';
			}

			 
		} 
		public function pendinguser(){
			$sql="select *from user where `status` = '0' ";
			$this->query($sql);
			return $this->resultset();
		} 
		public function readbyuserid($uid){
			$sql="SELECT *from user where uid=:uid";
			$this->query($sql);
			$this->bind(':uid',$uid);
			return $this->single();
		}
		public function readbycatname($category_id){
			$sql="SELECT *from category where category_id=:category_id";
			$this->query($sql);
			$this->bind(':category_id',$category_id);
			return $this->single();
		}
		public function allcategory(){

			$sql="select *from category";
			$this->query($sql);
			return $this->resultset();
		}
		public function allvideo(){

			$sql="select *from video  where `status` != '0'";
			$this->query($sql);
			return $this->resultset();
		}
		public function pendingvideo(){

			$sql="select *from video where `status` = '0' ";
			$this->query($sql);
			return $this->resultset();
		}
		public function alluser(){

			$sql="select *from user";
			$this->query($sql);
			return $this->resultset();
		}
		public function addcategory($category_name){
			$category_name=$category_name;

			$sql="INSERT INTO `category` (category_name) VALUES (:category_name)";
			$this->query($sql);
			$this->bind(':category_name',$category_name);
			$res=$this->execute();
			if ($res) {
		 		echo '<div class="alert alert-success">
                    <strong>Success!</strong> Successfully Inserted Data!
                </div>';
		 	}
			
		}
		public function updatecat($category_name,$category_id){

			$this->query("

				UPDATE `category` SET `category_name`=:category_name  WHERE `category_id`=:category_id

				");
			
			$this->bind(':category_name', $category_name);
			$this->bind(':category_id', $category_id);
			$res=$this->execute();
			if($res){
				 echo '<div class="alert alert-success">
                    <strong>Success!</strong> Successfully Updated Data!
                </div>';
			}else{
				 echo '<div class="alert alert-danger">
                    <strong>OOPs!</strong> Try Again!
                </div>';
			}

			 
		}
		public function delvideo($vid){
			
			$sql="delete from video where vid=:vid";
			$this->query($sql);
			$this->bind(':vid',$vid);
			if($this->execute()){
				 echo '<div class="alert alert-success">
                    <strong>Success!</strong> Successfully deleted Data!
                </div>';
			}
			else{
				 echo '<div class="alert alert-danger">
                    <strong>OOPS!</strong>plese try again!
                </div>';
			}
			 
		}
		public function deleteuser($uid){
			
			$sql="delete from user where uid=:uid";
			$this->query($sql);
			$this->bind(':uid',$uid);
			if($this->execute()){
				echo '<div class="alert alert-success">
                    <strong>Success!</strong> Successfully deleted Data!
                </div>';
			}
			else{
				echo '<div class="alert alert-danger">
                    <strong>OOPS!</strong>plese try again!
                </div>';
			}
			 
		}
		public function deletecategory($category_id){
			
			$sql="delete from category where category_id=:category_id";
			$this->query($sql);
			$this->bind(':category_id',$category_id);
			if($this->execute()){
				echo '<div class="alert alert-success">
                    <strong>Success!</strong> Successfully deleted Data!
                </div>';
			}
			else{
				echo '<div class="alert alert-danger">
                    <strong>OOPS!</strong>plese try again!
                </div>';
			}
			 
		}
	}
	


	?>
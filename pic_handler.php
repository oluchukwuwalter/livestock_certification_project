<?php
	
	require_once("linkClass.php");
	/*$obj = new pic_handler();
	
	$target_dir = "images/"; $fileToUpload = "file";
		
	$obj->startUpload($target_dir, $fileToUpload);
	$obj->imageFileType($obj->target_file);
	$obj->imageFileTypeTwo($fileToUpload, $obj->target_file);
	$obj->fileTypeInfo($obj->target_file);
	$obj->checkIfake($fileToUpload);
	$obj->checkExistence($obj->target_file);
	$obj->limitFileSize($fileToUpload);
	$obj->limitFileType($obj->imageFileType);
	$obj->completeUpload($fileToUpload, $obj->target_file);*/

	
	

	class pic_handler {
		
		private static $_instance = null;
		private $connect;
		public $target_file;
		
		function __construct(){//construct method
			
			//self::$passs = "goal";
			try{
			$this->connect = new PDO('mysql:host=localhost;dbname=cashlink','root','');
			$this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch( PDOException $e ){
			die($e->getMessage());
			}
			
		
		}
		
		public static function getInstance(){//class instance
			if(isset(self::$_instance)){
			return self::$_instance;
			}
			self::$_instance = new pic_handler();
			return self::$_instance;
			//return self::$connect;
		}
		
		function startUpload($target_dir, $fileToUpload){
			//$target_dir = "uploads/";
			
			$this->target_file = $target_dir . basename($_FILES[$fileToUpload]["name"]);
			$this->uploadOk = 1;
			
			return $this;
		}
		
		function imageFileType($target_file){
			$this->imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			return $this;
		}
		
		function fileTypeInfo($target_file){
			echo $this->fileType = filetype($target_file);
		}
		
		function imageFileTypeTwo($fileToUpload, $target_file){
			$allowed =  array('gif','png' ,'jpg');
			$filename = $_FILES[$fileToUpload]['name'];
			$ext = pathinfo($target_file, PATHINFO_EXTENSION);
			if(!in_array($ext,$allowed) ) {
				//echo 'error';
				$error = "<span style='font-family:candara; font-weight:100; color:red; padding:0px; margin:0px;'>Only jpg, png, jpeg, and gif formats are allowed</span>";
				$error = base64_encode($error);
				$pic = "<img src='../../../../images/icons/warning.png' alt='Logo' width='18px' height='18px'>";
				$pic = base64_encode($pic);
				$color = "color:red";
				$color = base64_encode($color);
				header("location:".$page.$error."&&pic=".$pic."&&color=".$color);
				$this->uploadOk = 0;
			}
			
			if(isset($this->uploadOk)){
				return $this->uploadOk;
			}
		}
		
		function checkIfake($fileToUpload){
			
			// Check if image file is a actual image or fake image
			$check = getimagesize($_FILES[$fileToUpload]["tmp_name"]);
			if($check !== false) {
				//echo "File is an image - " . $check["mime"] . ".";
				$this->uploadOk = 1;
			} else {
				//echo "File is not an image.";
				$error = "<span style='font-family:candara; font-weight:100; color:red; padding:0px; margin:0px;'>File is not an Image.</span>";
				$error = base64_encode($error);
				$pic = "<img src='../../../../images/icons/warning.png' alt='Logo' width='18px' height='18px'>";
				base64_encode($pic);
				$color = "color:red";
				$color = base64_encode($color);
				header("location:".$page.$error."&&pic=".$pic."&&color=".$color);
				$this->uploadOk = 0;
			}
			return $this->uploadOk;
		}
		
		function checkExistence($target_file){
			// Check if file already exists
			if (file_exists($target_file)) {
				//echo "Sorry, file already exists.";
				$error = "<span style='font-family:candara; font-weight:100; color:red; padding:0px; margin:0px;'>File Already Exists</span>";
				$error = base64_encode($error);
				$pic = "<img src='../../../../images/icons/warning.png' alt='Logo' width='18px' height='18px'>";
				$pic = base64_encode($pic);
				$color = "color:red";
				$color = base64_encode($color);
				header("location:".$page.$error."&&pic=".$pic."&&color=".$color);
				$this->uploadOk = 0;
			} 
			if(isset($this->uploadOk)){
				return $this->uploadOk;
			}
		}
		
		function limitFileSize($fileToUpload){
			// Check file size
			if ($_FILES[$fileToUpload]["size"] > 500000) {
				//echo "Sorry, your file is too large.";
				$error = "File size cannot bemore than 500kb";
				$error = base64_encode($error);
				$pic = "<img src='../../../../images/icons/warning.png' alt='Logo' width='18px' height='18px'>";
				$pic = base64_encode($pic);
				$color = "color:red";
				$color = base64_encode($color);
				header("location:".$page.$error."&&pic=".$pic."&&color=".$color);
				$this->uploadOk = 0;
			}
			if(isset($this->uploadOk)){
				return $this->uploadOk;
			}
		}
		
		function limitFileType($imageFileType){
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				$error = "Only jpg, png, jpeg, and gif formats are allowed";
				$error = base64_encode($error);
				$pic = "<img src='../../../../images/icons/warning.png' alt='Logo' width='18px' $pic = height='18px'>";
				$pic = base64_encode($pic);
				$color = "color:red";
				$color = base64_encode($color);
				header("location:".$page.$error."&&pic=".$pic."&&color=".$color);
				die();
				//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$this->uploadOk = 0;
			}
			if(isset($this->uploadOk)){
				return $this->uploadOk;
			}
		}
		
		function completeUpload($fileToUpload, $target_file, $page){
			// Check if $uploadOk is set to 0 by an error
			if ($this->uploadOk == 0) {
				//echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				$error = "Sorry, there was an error uploading your file";
				$error = base64_encode($error);
				$pic = "<img src='../../../../images/icons/warning.png' alt='Logo' width='18px' height='18px'>";
				$pic = base64_encode($pic);
				$color = "color:red";
				$color = base64_encode($color);
				header("location:".$page.$error."&&pic=".$pic."&&color=".$color);
				die();
			} else {
				
				if (!move_uploaded_file($_FILES[$fileToUpload]["tmp_name"], $target_file)) {
					
					$error = "Sorry, there was an error uploading your file";
					$error = base64_encode($error);
					$pic = "<img src='../../../../images/icons/warning.png' alt='Logo' width='18px' height='18px'>";
					$pic = base64_encode($pic);
					$color = "color:red";
					$color = base64_encode($color);
					header("location:".$page.$error."&&pic=".$pic."&&color=".$color);
					die();
					
				}
			}
		}
		
		
			
		


	}
?>
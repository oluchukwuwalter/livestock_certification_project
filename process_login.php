<?php
include('includes/db.php');
include('includes/functions.php');
$Random_key=random_string('alnum', 32);



	if(isset($_POST['login']))
	{
		if($_POST['username']!='' && $_POST['password']!='')
		{
		 	//Use the input username and password and check against 'users' table
			$authenticateUser = 'SELECT ID, Username,contact_person, Active FROM naqs_project_users WHERE Username = "'.mysqli_real_escape_string($db,$_POST['username']).'" AND Password = "'.mysqli_real_escape_string($db,md5($_POST['password'])).'"';
			
			if(!$result = $db->query($authenticateUser)){
    die('Could not retrieve users info [' . $db->error . ']');
}
	
			if(mysqli_num_rows($result) == 1)
			{
				$row = mysqli_fetch_assoc($result);
				if($row['Active'] == 1)
				{
					
					$_SESSION['user_id'] = $row['ID'];
					$_SESSION['logged_in'] = TRUE;
					//$_SESSION['regNo'] = $row['ID'];
					$username=($_POST['username']);
					$userID=$row['ID'];
					$contact_person=$row['contact_person'];
					//$msg="<b>Welcome</b> you are logged in as .$username";
					 setcookie("username", $username, time()+3600);  /* expires in one hr */
				     setcookie("userID", $userID, time()+3600);  /* expires in one hr */
					  setcookie("contact_person", $contact_person, time()+3600);  /* expires in one hr */
				
	                 $userID = $_COOKIE["userID"];
				     $userName = $_COOKIE["username"];
					 $contactPerson = $_COOKIE["contact_person"];
					
					 $Random_key=random_string('alnum', 32);
					 header("Location:welcome?user=front-end&&MVC/K=$Random_key");
					}
				else {
					$info = 'Your account has not been activated. Please open the email that we sent to you and click on the activation link<br>For help contact the System Administartor';
					$msg=base64_encode($info);
			header("Location:sign-in?login-status=error&&tval/error=$msg");
				}
			}
			else {		
					$info = 'Login failed! Make sure you have created an account or type username and password correctly and  try again';
					$msg=base64_encode($info);
					header("Location:sign-in?login-status=error&&tval/error=$msg");
			}
		}
		else {
			$info = 'Please provide both your username and password to access your account';
			$msg=base64_encode($info);
			header("Location:sign-in?login-status=error&&tval/error=$msg");
			
			
		}
}
?>
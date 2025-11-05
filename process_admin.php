<?php
include('includes/db.php');
include('includes/functions.php');
$Random_key=random_string('alnum', 32);



	if(isset($_POST['login']))
	{
		if($_POST['username']!='' && $_POST['password']!='')
		{
		 	//Use the input username and password and check against 'users' table
			$authenticateUser = 'SELECT id,vid, username, access_level, zone, scope FROM administrator WHERE username = "'.mysqli_real_escape_string($db,$_POST['username']).'" AND Password = "'.mysqli_real_escape_string($db,md5($_POST['password'])).'"';
			
			if(!$result = $db->query($authenticateUser)){
    die('Could not retrieve login data [' . $db->error . ']');
}
	
			if(mysqli_num_rows($result) == 1)
			{
				if($row = mysqli_fetch_assoc($result))
				 {
				if($row['access_level'] == 1)
				{
					
					$_SESSION['user_id'] = $row['id'];
					$_SESSION['logged_in'] = TRUE;
					$username=($_POST['username']);
					$userID=$row['id'];
					$zone=$row['zone'];
					$zonal=base64_encode($zone);
					$level_access=$row['access_level'];
					$scope=$row['scope'];
					
					 setcookie("admin_username", $username, time()+3600);  /* expires in one hr */
				     setcookie("admin_userID", $userID, time()+3600);  /* expires in one hr */
					  setcookie("zone", $zone, time()+3600);  /* expires in one hr */
				      setcookie("access_code", $level_access, time()+3600);  /* expires in one hr */
					    setcookie("scope", $scope, time()+3600);  /* expires in one hr */
				
	                 $admin_userID = $_COOKIE["admin_userID"];
				     $admin_userName = $_COOKIE["admin_username"];
					 $admin_zone = $_COOKIE["zone"];
					 $access_code = $_COOKIE["access_code"];
					 $scope_c = $_COOKIE["scope"];
					 $scope_encode=base64_encode($scope);
					 $Random_key=random_string('alnum', 32);
					 header("Location:Admin/workarea?user=admin&&MVC/K=$scope_encode&&tracklLoc=$zonal&&code=$level_access");
					}
					
					elseif($row['access_level'] == 2)
				{
					
					$_SESSION['user_id'] = $row['id'];
					$_SESSION['logged_in'] = TRUE;
					$admin_username=($_POST['username']);
					$userID=$row['id'];
					$vid=$row['vid'];
					$admin_zone=$row['zone'];
					$zonal=base64_encode($zone);
					$level_access=$row['access_level'];
					 setcookie("admin_username", $username, time()+3600);  /* expires in one hr */
				     setcookie("admin_userID", $userID, time()+3600);  /* expires in one hr */
					  setcookie("zone", $zone, time()+3600);  /* expires in one hr */
				       setcookie("access_code", $level_access, time()+3600);  /* expires in one hr */
				  setcookie("vid", $vid, time()+3600);  /* expires in one hr */
				
	                 $admin_userID = $_COOKIE["admin_userID"];
				     $admin_userName = $_COOKIE["admin_username"];
					 $admin_zone = $_COOKIE["zone"];
					
				  $service_provider_rFID = $_COOKIE["vid"];
					  $access_code = $_COOKIE["access_code"];
					  $Random_key=random_string('alnum', 32);
					 header("Location:SP/home?user=service-provider&&MVC/K=$Random_key&&tracklLoc=$zonal&&code=$level_access");
					}
					elseif($row['access_level'] == 3)
				{
					
					$_SESSION['user_id'] = $row['id'];
					$_SESSION['logged_in'] = TRUE;
					$username=($_POST['username']);
					$userID=$row['id'];
					$zone=$row['zone'];
					$zonal=base64_encode($zone);
					$level_access=$row['access_level'];
					$scope=$row['scope'];
					 setcookie("admin_username", $username, time()+3600);  /* expires in one hr */
				     setcookie("admin_userID", $userID, time()+3600);  /* expires in one hr */
					  setcookie("zone", $zone, time()+3600);  /* expires in one hr */
				       setcookie("access_code", $level_access, time()+3600);  /* expires in one hr */
					    setcookie("scope", $scope, time()+3600);  /* expires in one hr */
				
				
	                 $admin_userID = $_COOKIE["admin_userID"];
				     $admin_userName = $_COOKIE["admin_username"];
					 $admin_zone = $_COOKIE["zone"];
					 $access_code = $_COOKIE["access_code"];
					 $scope_c = $_COOKIE["scope"];
					 $scope_encode=base64_encode($scope);
					 $Random_key=random_string('alnum', 32);
					 header("Location:Admin/workarea?user=administrator&&MVC/K=$scope_encode&&tracklLoc=$zonal&&code=$level_access");
					}
					}
				else {
					$info = 'Your have an account but no roles assigned to you. Please contact the administrator for further instructions';
					$msg=base64_encode($info);
			header("Location:admin-login?login-status=error&&tval/error=$msg");
				}
			}
			else {		
					$info = 'Login failed! Incorrect username or password';
					$msg=base64_encode($info);
					header("Location:admin-login?login-status=error&&tval/error=$msg");
			}
		}
		else {
			$info = 'Please provide both your username and password to access your account';
			$msg=base64_encode($info);
			header("Location:admin-login?login-status=error&&tval/error=$msg");
			
			
		}
}
?>
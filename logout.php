<?php
include('includes/db.php');
include('includes/functions.php');
$Random_key=random_string('alnum', 32);
 $userID = $_COOKIE["userID"];
$userName = $_COOKIE["username"];
//$session_id = $_COOKIE["sessionID"];					

clear_cookies ();
//session_destroy();
//$Random_key=random_string('alnum', 32);
//$logou_msg="You are successfully logged out. <a href='login'>Login again?</a>";
//$msg=base64_encode($logou_msg);
//$sessionDestroy = mysql_query("UPDATE session set `active`='0' where session_id='$session_id' AND user_id='$userName'") or die(mysql_error());
$info="You have successfully logged out. Login again if you want to continue";
$msg=base64_encode($info);
header("Location:sign-in?MVC/K=$msg");
?>
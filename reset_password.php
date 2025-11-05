<?php if(!isset($_COOKIE['userID']))
{
$msg="Your Login session has expired. Login again to continue";
$info=base64_encode($msg);
header("Location:sign-in?MVC/K=$info");
}
?><?php
 $userID = $_COOKIE["userID"];
$userName = $_COOKIE["username"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nigeria Agricultural Quarantine Service Official Portal">
    <meta name="author" content="@naqs IT Team">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>NAQS | Nigeria Agricultural Quarantine Service </title>
    <!-- Bootstrap and demo CSS -->
    <link href="sniiplets/components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="sniiplets/components/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="sniiplets/css/main.css" rel="stylesheet">
    <!-- Yamm styles-->
    <link href="naqs_scc/naqs.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js')
    
    -->
	<style type="text/css">
	.dropdown-menu > li{
	border-bottom:#009933 1px solid;
	border-right:#009933 1px solid;
	border-left:#009933 1px solid;
	}
	.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
	</style>
	<script type="text/javascript">
	document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
	</script>
  </head>
  <body style="background-image:url(images/background.png); background-repeat:repeat; padding-bottom:0px; margin-bottom:0px;">
    <?php include('header.php'); ?>
	<?php include('top_nav_bar.php'); ?>
	<?php include('coat_of_arm_section.php'); ?>
    
	
    <div class="container" style="padding:10px;min-height:500px">
	<div class="row" style="padding-right:0px; margin:auto; margin-right:5px;">
	
	</div>
      <div class="row" style="padding-right:0px; margin-right:0px;">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="background:#E2F0D9; border-radius: 40px 0px 40px 5px;box-shadow: -2px 2px 2px 2px #999; border:#00CC33 1px solid;  margin-bottom:50px; padding-bottom:50px;">
		
		
		<div class="row" style="background:#A9D18E; border-radius: 40px 0px 7px 5px; padding:10px;  font-family:Georgia; font-size:16px; font-weight:bold; color:#006600; height:70px; padding-top:30px; margin-bottom:20px;">Reset Password</h3></div>
		
	
	
	
          
		  
		  <div class="container" style="border:#009933 solid 1px; padding:0px;">
		  <div class="row" style="margin:auto; text-align:center">
		  
<?php
$userID = $_COOKIE["userID"];
$userName = $_COOKIE["username"];
require_once('includes/db.php');
include('includes/functions.php');
error_reporting(E_ALL);
ini_set('display_errors', '1');


if(isset($_POST['reset'])) {

if ($_POST['old_pass']=='')
	{
		$errors[] = 'Type your current password';
	}

	if ($_POST['new_pass']=='')
	{
		$errors[] = 'Type your new password';
	}
	if (alpha_numeric($_POST['new_pass'])==FALSE || strlen($_POST['new_pass'])<8)
	{
		$errors[] = 'Your new password must be atleast 8 characters with combination of alphabets and numbers';
	}


	if ($_POST['new_pass2']=='' )
	{
		$errors[] = 'Re-Type your new password';
	}
	
	if($_POST['new_pass']!==$_POST['new_pass2'])
	{
	$errors[] = 'The new password did not match with the confirmation password';
	}
	if($_POST['new_pass']==$_POST['old_pass'])
	{
	$errors[] = 'Your new password is the same as the old one, please change to something different';
	}
	

	
if(isset($errors))
	{
		echo '<div class="message-div" style="text-align:justify; margin-bottom:20px; border: #EF9950 2px solid; background:#CCFFCC; color:#333; padding:5px; font-size:11px; font-weight:bold">';
		echo '<img src="images/icons/warning.png" />';
		echo '<strong><span style="color:#ef9950;"><u>Request failed. Check the following errors</u><span></strong><br>';
	
		while (list($key,$value) = each($errors))
		{

			echo '<span style="color:#666; text-align:justify; padding:10px; font-size:12px; font-weight:normal;">'.$value.'</span><br />';
			
		}
		echo'</div>';
	}
	
	else {
	     
		 if($_POST['old_pass']!='' && $_POST['new_pass']!='' && $_POST['new_pass']==$_POST['new_pass2']) 
		{
		
		
		  $oldPass=mysqli_real_escape_string($db,md5($_POST['old_pass'])); //encrypt the old password
		  
	    //check if the username and password exists
	   $getUser='SELECT ID, Username,Password FROM naqs_project_users WHERE ID = "'.$_COOKIE["userID"].'" AND Password = "'.mysqli_real_escape_string($db,md5($_POST['old_pass'])).'"';
	   
   
   if(!$resultCheckPass = $db->query($getUser)){
    die('Could not retrieve password data this time [' . $db->error . ']');
}
	
			if((mysqli_num_rows($resultCheckPass)==1))
			{//there's  no user with the same username and password
			
			//encrypt the new password
			
		 $newPass=mysqli_real_escape_string($db,md5($_POST['new_pass']));
		
		
		
   $update_query = "UPDATE naqs_project_users SET Password='$newPass' where ID='$userID'";
   
   if(!$resultCreate = $db->query($update_query)){
    die('Could not update password data this time [' . $db->error . ']');
}
			
			$getAdmin = "SELECT ID, Username, Email FROM naqs_project_users WHERE ID = '$userID'";
			
			if(!$resultAdmin = $db->query($getAdmin)){
    die('Could not update password data this time [' . $db->error . ']');
}
	
			if(mysqli_num_rows($resultAdmin)==1)
			{//there's only one MATRIX :PP
			
				$row = mysqli_fetch_assoc($resultAdmin);
				$headers = "From: support@naqs.gov.ng ". "\r\n";
			$headers .= "Reply-To: No- Reply". "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				$subject = "Password Change Notification From NAQS";
				$message = '<html><body>';
				$message .= '<div style="background-image:url(images/home/real/ash-bkg.jpg); background-repeat:repeat; padding:10px; color:#333; border:#8ac956 solid 5px;"><span style="color:#8ac956; font-weight:bold; font-size:14px">'.($subject).'</span><br /><br /><strong>Dear '.$row['Username'].',</strong><br /><br /><p style="text-align:justify">Your password change request was successful. <br/>.<br> <br>Thank you for using this platform.</p><p><strong>Best Regards,</strong><br />NAQS Support Team.</p></div>';
				$message .= '</body></html>';
				if(mail($row['Email'], $subject, $message, $headers)){
				
				//we show the good guy only in one case and the bad one for the rest.
				$msg= ' Password Change successful, Thank you</span>';
				}
				else {
					$msg= 'Password change successful but no validation email sent. Invalid email address found.</span>';
				}
			}
			
							
		}
		else {		
			$msg2= 'Incorrect passwod entered, try again.</span>';
		}
	}
	}
	}
?>
		  </div>
		  
		  <?php if(isset($msg)) {  ?>
	<p style="text-align:center; border: #00CC00 2px solid; margin-bottom:150px; background:#CCFFCC; color:#333; padding:5px; font-size:11px; font-weight:bold"><span><img src="images/icons/good.png"></span><?php echo $msg;  echo ">>"; ?> </p>
	<?php } ?>
	<?php if(isset($msg2)) {  ?>
	<p style="text-align:center; border: #00CC00 2px solid; background:#CCFFCC; color:#333; padding:5px; font-size:11px; font-weight:bold"><span><img src="images/icons/warning.png"></span><?php echo $msg2;  echo ">>"; ?> </p>
	<?php } ?>
	
	<?php if((!isset($msg))){ ?>
		  <form action="password" method="post">
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Current Password</span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto"><input type="password"  style="height:20px; border: #006633 solid 1px; border-radius:0px; padding-left:5px; padding-top:0px; padding-bottom:0px; padding-left:5px; padding-top:0px; padding-bottom:0px;  " class="form-control" required="required"  name="old_pass" value=""></span>
		</div>
		</div>
		
		
		
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">New Password</span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto"><input type="password"  style="height:20px; border: #006633 solid 1px; border-radius:0px; padding-left:5px; padding-top:0px; padding-bottom:0px; padding-left:5px; padding-top:0px; padding-bottom:0px;  " class="form-control" required="required"  name="new_pass" value=""></span>
		</div>
		</div>
		
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Confirm New Password</span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto"><input type="password"  style="height:20px; border: #006633 solid 1px; border-radius:0px; padding-left:5px; padding-top:0px; padding-bottom:0px; padding-left:5px; padding-top:0px; padding-bottom:0px;  " class="form-control" required="required"  name="new_pass2" value=""></span>
		</div>
		</div>
		
		<div class="row" style="margin-top:50px; text-align:center">
		<div class="col-md-4"></div>
		<div class="col-md-4">
		
	  <button type="submit" name="reset" style=" font-family:calibri; background:#006600; border:none; color:#fff; margin-bottom:20px; border-radius:5px; padding:2px; width:100px">Reset  &gt; &gt;</button>
	  </div>
	  <div class="col-md-4"></div>
	</div>
	
	</form>
	<?php } ?>
		</div>
		
		
        </div>
		
		<div class="col-md-2"></div>
      </div>
	  
	  
	  
	  
    </div>
    
    
    <div class="jumbotron" style="background-color: #bfbfbf; padding-top:20px; margin:0px; padding-bottom:10px;">
    <?php include('footer.php'); ?>
	</div>
    <!-- /container -->
    <!-- Bootstrap core JavaScript-->
    <script src="sniiplets/components/jquery/dist/jquery.js"></script>
    <script src="sniiplets/components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=css"></script>
    <script>
      $(function() {
        window.prettyPrint && prettyPrint()
        $(document).on('click', '.yamm .dropdown-menu', function(e) {
          e.stopPropagation()
        })
      })
    </script>
    <!-- tweet and share :)-->
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </body>
</html>
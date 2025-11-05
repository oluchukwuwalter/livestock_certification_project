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
<?php
session_start();
function valid_email ( $str )
	{
		return ( ! preg_match ( "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str ) ) ? FALSE : TRUE;
	}
	function alpha_numeric ( $str )
	{
		return ( ! preg_match ( "/^([-a-z0-9])+$/i", $str ) ) ? FALSE : TRUE;
	}
	
	function random_string ( $type = 'alnum', $len = 8 )
	{					
		switch ( $type )
		{
			case 'alnum'	:
			case 'numeric'	:
			case 'nozero'	:
			
					switch ($type)
					{
						case 'alnum'	:	$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
							break;
						case 'numeric'	:	$pool = '0123456789';
							break;
						case 'nozero'	:	$pool = '123456789';
							break;
					}
	
					$str = '';
					for ( $i=0; $i < $len; $i++ )
					{
						$str .= substr ( $pool, mt_rand ( 0, strlen ( $pool ) -1 ), 1 );
					}
					return $str;
			break;
			case 'unique' : return md5 ( uniqid ( mt_rand () ) );
			break;
		}
	}
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
    <?php include('includes/get_exporter.php');  ?>
	
    <div class="container" style="padding:10px;">
	<div class="row" style="padding-right:0px; margin:auto; margin-right:5px;">
	
	</div>
      <div class="row" style="padding-right:0px; margin-right:0px;">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="background:#E2F0D9; border-radius: 40px 0px 40px 5px;box-shadow: -2px 2px 2px 2px #999; border:#00CC33 1px solid;  margin-bottom:50px; padding-bottom:50px;">
		
		
		<div class="row" style="background:#A9D18E; border-radius: 40px 0px 7px 5px; padding:10px;  font-family:Georgia; font-size:16px; font-weight:bold; color:#006600; height:70px; padding-top:30px; margin-bottom:20px;">My Account Info</h3></div>
		
	
	
	
          
		  
		  <div class="container" style="padding:10px;">
	<div class="row" style="padding-right:0px; margin-right:0px;">
	<div class="col-md-3"></div>
	<div class="col-md-6" style=" padding-right:0px;">
<?php
require_once('includes/db.php');
//include('functions.php');
//session_start();
//$_SESSION['random_number'];
//include ('get_captcha.php');
// Force script errors and warnings to show during production only
error_reporting(E_ALL);
ini_set('display_errors', '1');


if(isset($_POST['update'])){

//get all input variables
$company_name=$_POST['company_name'];
$contact_person=($_POST['contact_person']);
$Username=$_POST['Username'];
$Phone=$_POST['Phone'];
$Email=$_POST['Email'];
$contact_address=($_POST['contact_address']);


// set up session variables for input consistency
$_SESSION['company_name']=$company_name;
$_SESSION['contact_person']=$contact_person;
$_SESSION['Username']=$Username;
$_SESSION['Phone']=$Phone;
$_SESSION['Email']=$Email;
$_SESSION['contact_address']=$contact_address;

if ($_POST['company_name']=='' || strlen($_POST['company_name'])<4)
	{
		$errors[] = 'Company name is required and must contain 4 characters or more';
	}
	
	if ($_POST['contact_person']=='' || strlen($_POST['contact_person'])<4)
	{
		$errors[] = 'Name of contact person is required and must contain 4 characters or more';
	}

	if ($_POST['contact_address']=='' || strlen($_POST['contact_address'])<3)
	{
		$errors[] = 'Contact address is required and must contain 10 characters or more';
	}


	if ($_POST['Username']=='' || strlen($_POST['Username'])<3)
	{
		$errors[] = 'Username is required and must be atleast 3 characters';
	}
	
	



	
	$UniqueUsername="SELECT ID, Username FROM naqs_project_users WHERE (Username = '".($_POST['Username'])."' AND ID !='".$_COOKIE['userID']."')";
	if(!$result = $db->query($UniqueUsername)){
    die('Could not retrieve users info [' . $db->error . ']');
}
	while($row = $result->fetch_assoc()){
			if(mysqli_num_rows($result)==1)
			{//there's user with the same username
			$errors[] = 'Username is already taken,please choose another username and try agian';
	}
	}
	


	
	if ($_POST['Phone']==""|| (is_numeric($_POST['Phone'])==FALSE)||(strlen($_POST['Phone'])<11))
	{
		$errors[] = 'Invalid phone number';
	}
	
	

	if (valid_email($_POST['Email'])==FALSE)
	{
		$errors[] = 'Please supply a valid email address';
	}
	
	
	$checkUniqueEmail="SELECT ID, Email FROM naqs_project_users WHERE (Email = '".($_POST['Email'])."' AND ID !='".$_COOKIE['userID']."')";
	if(!$result2 = $db->query($checkUniqueEmail)){
    die('Could not retrieve email data  [' . $db->error . ']');
}
	while($row2 = $result2->fetch_assoc()){
			if(mysqli_num_rows($result2)==1)
			{//there's user with the same username
			$errors[] = 'A user with this email exist,please choose another email and try agian';
	}
	}
   
   
   
   if ($_POST['contact_address']=='' || strlen($_POST['contact_address'])<10)
	{
		$errors[] = 'Please provide a valid contact address not less than 10 characters';
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
	
	elseif($_POST['Username']!=''  && $_POST['Email']!='' && valid_email($_POST['Email'])==TRUE) 
		{
		
		
		
		$Company_Name=mysqli_real_escape_string($db,$_POST['company_name']);
		$contact_person=mysqli_real_escape_string($db,$_POST['contact_person']);
		$Username=mysqli_real_escape_string($db,$_POST['Username']);
		$contact_address=mysqli_real_escape_string($db,$_POST['contact_address']);
		$Phone=mysqli_real_escape_string($db,$_POST['Phone']);
		$Email=mysqli_real_escape_string($db,$_POST['Email']);
		
		$Random_key=random_string('alnum', 32);
		
		
		$userID = $_COOKIE["userID"];
        $userName = $_COOKIE["username"];

		
			$createAccountQuery = "UPDATE `naqs_project_users` SET `Company_Name`='$Company_Name',`contact_person`='$contact_person', `Username`='$Username', `Phone_no`='$Phone', `Email`='$Email', `contact_address`='$contact_address' WHERE ID='$userID' ";
			 if(!$resultCreate = $db->query($createAccountQuery)){
    die('Could not update user record at this time [' . $db->error . ']');
}
			
			$getUser ="SELECT ID, Username, Email, Random_key FROM naqs_project_users WHERE Username = '$Username'";
			
	     if(!$resultGetUser = $db->query($getUser)){
    die('Could not retrieve email info [' . $db->error . ']');
}
    //$result=mysqli_query($db,$getUser)
	//$row3 = $resultGetUser->fetch_assoc();
			if(mysqli_num_rows($resultGetUser)==1)
		
	
			
			{
			
				$row3 = mysqli_fetch_assoc($resultGetUser);
				$headers = "From: support@naqs.gov.ng ". "\r\n";
			$headers .= "Reply-To: No- Reply". "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				$subject = "Account Information Update From NAQS";
				$message = '<html><body>';
				$message .= '<div style="background-image:url(images/home/real/ash-bkg.jpg); background-repeat:repeat; padding:10px; color:#333; border:#8ac956 solid 5px;"><span style="color:#8ac956; font-weight:bold; font-size:14px">'.($subject).'</span><br /><br /><strong>Dear '.$row3['Username'].',</strong><br /><br /><p style="text-align:justify">Your account information was successfully updated.<br> <br>Thank you for using this platform.</p><p><strong>Best Regards,</strong><br />NAQS Support Team.</p></div>';
				$message .= '</body></html>';
				if(mail($row3['Email'], $subject, $message, $headers)){
			
				//we show the good guy only in one case and the bad one for the rest.
				$msg =	 'Your account was successfully updated. Thank you';	
				}
				
				else {
					$msg = ' Your account was successfully updated but the validation email could not be sent to ' .$row3['Email'].'. Please check your network connection or contact our system administrator with our help desk support hotline(s) provided at the home page.';
				}
			}
			else {
				$msg2 = 'You just made possible the old guy (the impossible). Please inform my boss in order to give you the price for this.';
			}
							
		}
		else {		
			$msg2= 'There was an error in your data. Please make sure you filled in all the required data, you provided a valid email address and that the password fields match';	
		}
	}
?>


	<?php if(isset($msg)) {  ?>
	<p style="text-align:center; border: #00CC00 2px solid; margin-bottom:150px; background:#CCFFCC; color:#333; padding:5px; font-size:11px; font-weight:bold"><span><img src="images/icons/good.png"></span><?php echo $msg;  echo ">>"; ?> </p>
	<?php } ?>
	
	<?php if(isset($msg2)) {  ?>
	<p style="text-align:center; border: #00CC00 2px solid; background:#CCFFCC; color:#333; padding:5px; font-size:11px; font-weight:bold"><span><img src="images/icons/warning.png"></span><?php echo $msg2;  echo ">>"; ?> </p>
	<?php } ?>
	
	</div>
	<div class="col-md-3" style="padding-right:0px; margin-right:0px;">
	
	
	
	
	</div>
	</div>
	<?php if((!isset($msg))){ ?> 
	
		  <div class="container" style="border:#009933 solid 1px; padding:0px;">
		  <div class="row" style="margin:auto; text-align:center; padding-top:20px;">
		  

		  <form action="myAccount" method="post">
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Company Name/Name of Exporter</span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto"><input type="text"  style="height:20px; border: #006633 solid 1px; border-radius:0px; padding-left:5px; padding-top:0px; padding-bottom:0px; padding-left:5px; padding-top:0px; padding-bottom:0px;  " class="form-control" required="required"  name="company_name" value="<?php if(isset($Exporter_Company_Name)) { echo $Exporter_Company_Name; } ?>"  readonly="readonly"></span>
		</div>
		</div>
		
		
		
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Contact Person</span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto"><input type="text"  style="height:20px; border: #006633 solid 1px; border-radius:0px; padding-left:5px; padding-top:0px; padding-bottom:0px; padding-left:5px; padding-top:0px; padding-bottom:0px;  " class="form-control" required="required"  name="contact_person" value="<?php if(isset($Exporter_contact_person)) { echo $Exporter_contact_person; } ?>" ></span>
		</div>
		</div>
		
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Username</span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto"><input type="text"  style="height:20px; border: #006633 solid 1px; border-radius:0px; padding-left:5px; padding-top:0px; padding-bottom:0px; padding-left:5px; padding-top:0px; padding-bottom:0px;  " class="form-control" required="required"  name="Username" value="<?php if(isset($Exporter_Username)) { echo $Exporter_Username; } ?>"></span>
		</div>
		</div>
		
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Email</span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto"><input type="email"  style="height:20px; border: #006633 solid 1px; border-radius:0px; padding-left:5px; padding-top:0px; padding-bottom:0px; padding-left:5px; padding-top:0px; padding-bottom:0px;  " class="form-control" required="required"  name="Email" value="<?php if(isset($Exporter_Email)) { echo $Exporter_Email; } ?>"></span>
		</div>
		</div>
		
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Phone No:</span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto"><input type="text"  style="height:20px; border: #006633 solid 1px; border-radius:0px; padding-left:5px; padding-top:0px; padding-bottom:0px; padding-left:5px; padding-top:0px; padding-bottom:0px;  " class="form-control" required="required"  name="Phone" value="<?php if(isset($Exporter_Phone_no)) { echo $Exporter_Phone_no; } ?>"></span>
		</div>
		</div>
		
		
		<div class="row" style="margin:auto;">
		<div class="col-md-4">
		<span style="text-align:right; padding:5px; float:left; margin:auto; width:150px;font-family:candara; font-size:12px">Contact Address</span>
		</div>
		<div class="col-md-8">
		<span style="text-align:right; padding:5px; float:left; margin:auto"><input type="text"  style="height:20px; border: #006633 solid 1px; border-radius:0px; padding-left:5px; padding-top:0px; padding-bottom:0px; padding-left:5px; padding-top:0px; padding-bottom:0px;  " class="form-control" required="required"  name="contact_address" value="<?php if(isset($exporter_contact_address)) { echo $exporter_contact_address; } ?>" readonly="readonly"></span>
		</div>
		</div>
		<div class="row" style="margin-top:50px; text-align:center">
		<div class="col-md-4"></div>
		<div class="col-md-4">
		
	  <button type="submit" name="update" style=" font-family:calibri; background:#006600; border:none; color:#fff; margin-bottom:20px; border-radius:5px; padding:2px; width:130px">Update Record  &gt; &gt;</button>
	  </div>
	  <div class="col-md-4"></div>
	</div>
	
	</form>
	</div>
	</div>
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